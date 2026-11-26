<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\User;
use App\Models\ActivityReassignment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ActivityController extends Controller
{
    // Display all activities (Admin only)
    public function index()
    {
        abort_unless(Auth::user()?->role === 'admin', 403);

        // Retrieve activities with their relationships
        $activities = Activity::with([
            'creator',
            'assignedUsers',
            'reassignments.administrator'
        ])
            ->latest()
            ->get();

        // Retrieve active staff for the reassignment dropdown
        $staff = User::where('role', 'staff')
            ->where('is_active', true)
            ->orderBy('name')
            ->get();

        // Retrieve all staff names, including inactive staff,
        // to display historical reassignment records
        $staffDirectory = User::where('role', 'staff')
            ->pluck('name', 'id');

        return view('admin.activities.index', compact(
            'activities',
            'staff',
            'staffDirectory'
        ));
    }

    // Display the activity creation form (Admin only)
    public function create()
    {
        abort_unless(Auth::user()?->role === 'admin', 403);

        $staff = User::where('role', 'staff')
            ->where('is_active', true)
            ->orderBy('name')
            ->get();

        return view('admin.activities.create', compact('staff'));
    }

    // Save a new activity (Admin only)
    public function store(Request $request)
    {
        abort_unless(Auth::user()?->role === 'admin', 403);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'start_date' => 'nullable|date',
            'due_date' => 'nullable|date|after_or_equal:start_date',
            'priority' => 'required|in:low,medium,high',
            'assigned_users' => 'nullable|array',
            'assigned_users.*' => 'integer|distinct',
        ]);

        $staffIds = $validated['assigned_users'] ?? [];

        // Confirm that all selected staff accounts are active
        $validStaffIds = User::where('role', 'staff')
            ->where('is_active', true)
            ->whereIn('id', $staffIds)
            ->pluck('id')
            ->all();

        if (count($staffIds) !== count($validStaffIds)) {
            return back()
                ->withErrors([
                    'assigned_users' => 'One or more selected staff accounts are invalid or inactive.'
                ])
                ->withInput();
        }

        DB::transaction(function () use ($validated, $validStaffIds) {

            $activity = Activity::create([
                'title' => $validated['title'],
                'description' => $validated['description'] ?? null,
                'start_date' => $validated['start_date'] ?? null,
                'due_date' => $validated['due_date'] ?? null,
                'priority' => $validated['priority'],
                'created_by' => Auth::id(),
            ]);

            // Assign activity to selected staff members
            $activity->assignedUsers()->sync($validStaffIds);
        });

        return redirect()
            ->route('admin.activities.index')
            ->with('success', 'Activity created and assigned successfully.');
    }

    // Reassign an existing activity (Admin only)
    public function reassign(Request $request, Activity $activity)
    {
        abort_unless(Auth::user()?->role === 'admin', 403);

        $validated = $request->validate([
            'assigned_users' => 'required|array|min:1',
            'assigned_users.*' => 'required|integer|distinct',
        ]);

        $staffIds = $validated['assigned_users'];

        // Confirm that selected staff accounts are active
        $validStaffIds = User::where('role', 'staff')
            ->where('is_active', true)
            ->whereIn('id', $staffIds)
            ->pluck('id')
            ->all();

        if (count($staffIds) !== count($validStaffIds)) {
            return back()
                ->withErrors([
                    'assigned_users' => 'One or more selected staff accounts are invalid or inactive.'
                ])
                ->withInput();
        }

        DB::transaction(function () use ($activity, $validStaffIds) {

            // Get the staff members currently assigned
            $previousAssignees = $activity->assignedUsers()
                ->pluck('users.id')
                ->toArray();

            // Replace current assignments
            $activity->assignedUsers()->sync($validStaffIds);

            // Record the reassignment history
            ActivityReassignment::create([
                'activity_id' => $activity->id,
                'admin_id' => Auth::id(),
                'previous_assignees' => $previousAssignees,
                'new_assignees' => $validStaffIds,
            ]);
        });

        return redirect()
            ->route('admin.activities.index')
            ->with('success', 'Activity reassigned successfully.');
    }
}
