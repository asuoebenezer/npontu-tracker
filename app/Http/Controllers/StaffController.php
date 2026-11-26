<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class StaffController extends Controller
{
    /**
     * Display all registered staff members.
     */
    public function index()
    {
        // Only administrators can manage staff.
        abort_unless(Auth::user()?->role === 'admin', 403);

        $staff = User::where('role', 'staff')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('admin.staff.index', compact('staff'));
    }


    /**
     * Register a new staff member.
     */
    public function store(Request $request)
    {
        abort_unless(Auth::user()?->role === 'admin', 403);

        // Validate staff registration details.
        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
            ],

            'email' => [
                'required',
                'email',
                'max:255',
                'unique:users,email',
            ],

            'password' => [
                'required',
                'string',
                'min:8',
            ],
        ]);

        // Create staff account.
        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => 'staff',
            'is_active' => true,
        ]);

        return redirect()
            ->route('admin.staff.index')
            ->with('success', 'Staff member registered successfully.');
    }


    /**
     * Activate or deactivate a staff account.
     */
    public function toggleStatus($id)
    {
        abort_unless(Auth::user()?->role === 'admin', 403);

        $staff = User::where('role', 'staff')
            ->findOrFail($id);

        $staff->is_active = !$staff->is_active;

        $staff->save();

        return redirect()
            ->route('admin.staff.index')
            ->with('success', 'Staff account status updated successfully.');
    }


    /**
     * Delete a staff account.
     */
    public function destroy($id)
    {
        abort_unless(Auth::user()?->role === 'admin', 403);

        $staff = User::where('role', 'staff')
            ->findOrFail($id);

        $staff->delete();

        return redirect()
            ->route('admin.staff.index')
            ->with('success', 'Staff account deleted successfully.');
    }
}
