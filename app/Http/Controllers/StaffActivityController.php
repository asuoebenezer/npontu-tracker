<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\ActivityUpdate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class StaffActivityController extends Controller
{
    // Display activities assigned to the logged-in staff member
    public function index()
    {
        abort_unless(Auth::user()?->role === 'staff', 403);

        $activities = Auth::user()
            ->assignedActivities()
            ->with(['creator', 'updates.user'])
            ->latest()
            ->get();

        return view('staff.activities.index', compact('activities'));
    }

    // Display one activity assigned to the logged-in staff member
    public function show($id)
    {
        abort_unless(Auth::user()?->role === 'staff', 403);

        $activity = Auth::user()
            ->assignedActivities()
            ->with([
                'creator',
                'updates.user'
            ])
            ->findOrFail($id);

        return view('staff.activities.show', compact('activity'));
    }

    // Submit a progress update for an assigned activity
    public function store(Request $request, $id)
    {
        abort_unless(Auth::user()?->role === 'staff', 403);

        // Confirm that the activity is assigned to this staff member
        $activity = Auth::user()
            ->assignedActivities()
            ->findOrFail($id);

        // Validate submitted information
        $validated = $request->validate([
            'update' => 'required|string|max:5000',
            'status' => 'required|in:done,pending',
            'remark' => 'nullable|string|max:2000',
        ]);

        // Save the update and its staff details
        DB::transaction(function () use ($activity, $validated) {

            ActivityUpdate::create([
                'activity_id' => $activity->id,
                'user_id' => Auth::id(),
                'update' => $validated['update'],
                'status' => $validated['status'],
                'remark' => $validated['remark'] ?? null,
            ]);

        });

        return redirect()
            ->route('staff.activities.show', $activity->id)
            ->with('success', 'Activity update submitted successfully.');
    }
}
