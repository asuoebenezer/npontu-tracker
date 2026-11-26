<?php

namespace App\Http\Controllers;

use App\Models\ActivityUpdate;
use App\Models\User;
use App\Exports\ActivityHistoryExport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class ActivityHistoryController extends Controller
{
    // Display activity history with filters
    public function index(Request $request)
    {
        // Only administrators can access activity reports
        abort_unless(Auth::user()?->role === 'admin', 403);

        // Validate filter inputs
        $validated = $request->validate([
            'start_date' => ['nullable', 'date'],
            'end_date' => ['nullable', 'date', 'after_or_equal:start_date'],
            'staff_id' => ['nullable', 'integer', 'exists:users,id'],
            'status' => ['nullable', 'in:done,pending'],
        ]);

        // Default to today's date
        $startDate = $validated['start_date'] ?? now()->toDateString();
        $endDate = $validated['end_date'] ?? now()->toDateString();

        // Retrieve staff members
        $staff = User::where('role', 'staff')
            ->orderBy('name')
            ->get();

        // Build activity history query
        $query = ActivityUpdate::with(['activity', 'user'])
            ->whereDate('created_at', '>=', $startDate)
            ->whereDate('created_at', '<=', $endDate);

        // Filter by staff member
        if (!empty($validated['staff_id'])) {
            $query->where('user_id', $validated['staff_id']);
        }

        // Filter by activity status
        if (!empty($validated['status'])) {
            $query->where('status', $validated['status']);
        }

        // Retrieve matching records
        $updates = $query->latest()->get();

        return view('admin.activities.history', compact(
            'updates',
            'startDate',
            'endDate',
            'staff'
        ));
    }

    // Export filtered activity history to Excel
    public function export(Request $request)
    {
        // Only administrators can export reports
        abort_unless(Auth::user()?->role === 'admin', 403);

        // Validate export filters
        $validated = $request->validate([
            'start_date' => ['nullable', 'date'],
            'end_date' => ['nullable', 'date', 'after_or_equal:start_date'],
            'staff_id' => ['nullable', 'integer', 'exists:users,id'],
            'status' => ['nullable', 'in:done,pending'],
        ]);

        // Default to today's date
        $startDate = $validated['start_date'] ?? now()->toDateString();
        $endDate = $validated['end_date'] ?? now()->toDateString();

        // Prepare Excel export
        $export = new ActivityHistoryExport(
            $startDate,
            $endDate,
            $validated['staff_id'] ?? null,
            $validated['status'] ?? null
        );

        // Generate filename
        $filename = 'Activity_History_' .
            $startDate . '_to_' . $endDate . '.xlsx';

        // Download Excel file
        return Excel::download($export, $filename);
    }
}
