
<?php

use App\Http\Controllers\ActivityHistoryController;
use App\Http\Controllers\StaffActivityController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\AuthController;

use App\Models\Activity;
use App\Models\ActivityUpdate;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


// ======================================================
// PUBLIC ROUTES
// ======================================================

// Redirect homepage to login
Route::redirect('/', '/login');

// Login page
Route::get('/login', [AuthController::class, 'showLogin'])
    ->name('login');

// Process login
Route::post('/login', [AuthController::class, 'login']);


// ======================================================
// PROTECTED ROUTES
// ======================================================

Route::middleware('auth')->group(function () {


    // ==================================================
    // ADMIN DASHBOARD
    // ==================================================

    Route::get('/admin/dashboard', function () {

        // Only administrators can access this dashboard
        abort_unless(Auth::user()?->role === 'admin', 403);


        // ----------------------------------------------
        // TOTAL ACTIVITIES
        // ----------------------------------------------

        $totalActivities = Activity::count();


        // ----------------------------------------------
        // GET THE LATEST UPDATE FOR EACH ACTIVITY
        // ----------------------------------------------

        $latestUpdateIds = ActivityUpdate::query()
            ->selectRaw('MAX(id)')
            ->groupBy('activity_id');


        // ----------------------------------------------
        // COMPLETED ACTIVITIES
        // ----------------------------------------------

        // An activity is completed when its latest
        // staff update has a status of done.

        $completedActivityIds = ActivityUpdate::query()
            ->select('activity_id')
            ->whereIn('id', $latestUpdateIds)
            ->where('status', 'done');

        $completedActivities = Activity::whereIn(
            'id',
            $completedActivityIds
        )->count();


        // ----------------------------------------------
        // PENDING ACTIVITIES
        // ----------------------------------------------

        // Includes activities without any staff update
        // and activities whose latest update is pending.

        $pendingActivities = $totalActivities - $completedActivities;


        // ----------------------------------------------
        // TODAY'S UPDATES
        // ----------------------------------------------

        $todayUpdates = ActivityUpdate::whereDate(
            'created_at',
            today()
        )->count();


        // ----------------------------------------------
        // RECENT ACTIVITY UPDATES
        // ----------------------------------------------

        // Retrieve the latest 8 updates together with
        // the activity and personnel who submitted them.

        $recentUpdates = ActivityUpdate::with([
            'activity',
            'user'
        ])
            ->latest()
            ->take(8)
            ->get();


        // ----------------------------------------------
        // LOAD DASHBOARD
        // ----------------------------------------------

        return view('admin.dashboard', compact(
            'totalActivities',
            'completedActivities',
            'pendingActivities',
            'todayUpdates',
            'recentUpdates'
        ));

    })->name('admin.dashboard');


    // ==================================================
    // ADMIN ACTIVITY MANAGEMENT
    // ==================================================

    // Display all activities
    Route::get('/admin/activities', [ActivityController::class, 'index'])
        ->name('admin.activities.index');

    // Display activity creation form
    Route::get('/admin/activities/create', [ActivityController::class, 'create'])
        ->name('admin.activities.create');

    // Save new activity
    Route::post('/admin/activities', [ActivityController::class, 'store'])
        ->name('admin.activities.store');

    // Reassign an activity
    Route::patch(
        '/admin/activities/{activity}/reassign',
        [ActivityController::class, 'reassign']
    )->name('admin.activities.reassign');


    // ==================================================
    // ADMIN ACTIVITY HISTORY AND REPORTS
    // ==================================================

    // View activity history
    Route::get(
        '/admin/activity-history',
        [ActivityHistoryController::class, 'index']
    )->name('admin.activities.history');

    // Export activity history
    Route::get(
        '/admin/activity-history/export',
        [ActivityHistoryController::class, 'export']
    )->name('admin.activities.history.export');


    // ==================================================
    // ADMIN STAFF MANAGEMENT
    // ==================================================

    // Display staff members
    Route::get('/admin/staff', [StaffController::class, 'index'])
        ->name('admin.staff.index');

    // Create staff member
    Route::post('/admin/staff', [StaffController::class, 'store'])
        ->name('admin.staff.store');

    // Activate or deactivate staff account
    Route::patch(
        '/admin/staff/{id}/status',
        [StaffController::class, 'toggleStatus']
    )->name('admin.staff.toggleStatus');

    // Delete staff account
    Route::delete(
        '/admin/staff/{id}',
        [StaffController::class, 'destroy']
    )->name('admin.staff.destroy');


    // ==================================================
    // STAFF DASHBOARD
    // ==================================================

    Route::get('/staff/dashboard', function () {

        abort_unless(Auth::user()?->role === 'staff', 403);

        return redirect()->route('staff.activities.index');

    })->name('staff.dashboard');


    // ==================================================
    // STAFF ACTIVITY MANAGEMENT
    // ==================================================

    // Display assigned activities
    Route::get(
        '/staff/activities',
        [StaffActivityController::class, 'index']
    )->name('staff.activities.index');

    // View an assigned activity
    Route::get(
        '/staff/activities/{id}',
        [StaffActivityController::class, 'show']
    )->name('staff.activities.show');

    // Submit activity progress update
    Route::post(
        '/staff/activities/{id}/updates',
        [StaffActivityController::class, 'store']
    )->name('staff.activities.store');


    // ==================================================
    // LOGOUT
    // ==================================================

    Route::post('/logout', [AuthController::class, 'logout'])
        ->name('logout');

});
