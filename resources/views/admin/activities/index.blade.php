
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Manage Activities | Npontu Tracker</title>

    <link rel="icon"
      type="image/svg+xml"
      href="{{ asset('favicon.svg') }}?v=2">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background: #f1f5f9;
            color: #1e293b;
        }

        /* SIDEBAR */

        .sidebar {
            width: 250px;
            height: 100vh;
            background: #0f172a;
            color: white;
            position: fixed;
            top: 0;
            left: 0;
            padding: 28px 18px;
            display: flex;
            flex-direction: column;
            overflow-y: auto;
        }

        .brand {
            font-size: 23px;
            font-weight: bold;
            padding: 0 8px;
            margin-bottom: 45px;
        }

        .brand span {
            color: #38bdf8;
        }

        .nav-label {
            color: #94a3b8;
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: 1px;
            padding: 0 10px;
            margin-bottom: 12px;
        }

        .sidebar nav a {
            display: block;
            color: #cbd5e1;
            text-decoration: none;
            padding: 13px 12px;
            margin-bottom: 7px;
            border-radius: 7px;
            font-size: 14px;
            transition: 0.2s;
        }

        .sidebar nav a:hover,
        .sidebar nav a.active {
            background: #1e3a5f;
            color: white;
        }

        .sidebar nav a.active {
            border-left: 3px solid #38bdf8;
        }

        .sidebar-bottom {
            margin-top: auto;
            padding-top: 25px;
        }

        .logout-btn {
            width: 100%;
            background: #1e293b;
            color: #fca5a5;
            border: none;
            padding: 13px;
            border-radius: 7px;
            cursor: pointer;
            font-size: 14px;
            text-align: left;
        }

        .logout-btn:hover {
            background: #334155;
        }

        /* MAIN CONTENT */

        .main {
            margin-left: 250px;
            padding: 32px;
            min-height: 100vh;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
            flex-wrap: wrap;
            gap: 15px;
        }

        .header h1 {
            font-size: 27px;
            color: #0f172a;
            margin-bottom: 7px;
        }

        .header p {
            color: #64748b;
            font-size: 14px;
        }

        .admin-info {
            background: white;
            padding: 11px 16px;
            border-radius: 8px;
            border: 1px solid #e2e8f0;
            font-size: 13px;
            color: #475569;
        }

        /* MESSAGES */

        .alert {
            padding: 13px 16px;
            border-radius: 7px;
            margin-bottom: 20px;
            font-size: 13px;
        }

        .success {
            background: #dcfce7;
            color: #166534;
            border: 1px solid #bbf7d0;
        }

        .error {
            background: #fee2e2;
            color: #991b1b;
            border: 1px solid #fecaca;
        }

        .error ul {
            margin: 8px 0 0 20px;
        }

        /* ACTION BAR */

        .action-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 22px;
            flex-wrap: wrap;
            gap: 15px;
        }

        .activity-count {
            color: #64748b;
            font-size: 13px;
        }

        .primary-btn {
            display: inline-block;
            background: #2563eb;
            color: white;
            text-decoration: none;
            padding: 11px 17px;
            border-radius: 7px;
            font-size: 13px;
            font-weight: 600;
        }

        .primary-btn:hover {
            background: #1d4ed8;
        }

        /* TABLE SECTION */

        .content-section {
            background: white;
            border: 1px solid #e2e8f0;
            border-radius: 10px;
            overflow: hidden;
            margin-bottom: 30px;
        }

        .section-header {
            padding: 20px 22px;
            border-bottom: 1px solid #e2e8f0;
        }

        .section-header h2 {
            font-size: 17px;
            color: #0f172a;
            margin-bottom: 5px;
        }

        .section-header p {
            font-size: 13px;
            color: #64748b;
        }

        .table-container {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 850px;
        }

        th {
            background: #f8fafc;
            color: #64748b;
            font-size: 12px;
            text-align: left;
            padding: 15px 16px;
            font-weight: 600;
            white-space: nowrap;
        }

        td {
            padding: 16px;
            border-top: 1px solid #f1f5f9;
            font-size: 13px;
            color: #475569;
            vertical-align: top;
        }

        tr:hover td {
            background: #fafcff;
        }

        .activity-title {
            color: #0f172a;
            font-weight: 600;
            margin-bottom: 7px;
        }

        .activity-description {
            color: #64748b;
            line-height: 1.5;
            max-width: 230px;
            overflow-wrap: anywhere;
        }

        .staff-name {
            display: block;
            margin-bottom: 7px;
            color: #334155;
        }

        .date-time {
            white-space: nowrap;
        }

        /* BADGES */

        .badge {
            display: inline-block;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 600;
            white-space: nowrap;
        }

        .priority-low {
            background: #e0f2fe;
            color: #075985;
        }

        .priority-medium {
            background: #fef3c7;
            color: #92400e;
        }

        .priority-high {
            background: #fee2e2;
            color: #991b1b;
        }

        .status-pending {
            background: #fef3c7;
            color: #92400e;
        }

        .status-in_progress {
            background: #dbeafe;
            color: #1e40af;
        }

        .status-completed {
            background: #dcfce7;
            color: #166534;
        }

        .status-cancelled {
            background: #f1f5f9;
            color: #475569;
        }

        /* REASSIGNMENT FORM */

        .reassign-form {
            min-width: 190px;
        }

        .reassign-form select {
            width: 100%;
            min-height: 85px;
            padding: 9px;
            border: 1px solid #cbd5e1;
            border-radius: 6px;
            background: white;
            color: #334155;
            font-size: 12px;
            margin-bottom: 9px;
        }

        .reassign-form select:focus {
            outline: none;
            border-color: #2563eb;
        }

        .hint {
            font-size: 11px;
            color: #64748b;
            margin-bottom: 8px;
            line-height: 1.5;
        }

        .reassign-button {
            background: #0f766e;
            color: white;
            border: none;
            padding: 9px 13px;
            border-radius: 6px;
            cursor: pointer;
            font-size: 12px;
            font-weight: 600;
        }

        .reassign-button:hover {
            background: #115e59;
        }

        /* EMPTY STATES */

        .empty {
            text-align: center;
            padding: 40px 20px;
            color: #94a3b8;
            font-size: 14px;
        }

        .history-description {
            color: #64748b;
            font-size: 13px;
            margin-top: 6px;
        }

        /* FOOTER */

        .footer {
            text-align: center;
            color: #94a3b8;
            font-size: 12px;
            padding: 20px 0;
        }

        /* RESPONSIVENESS */

        @media (max-width: 768px) {

            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
                padding: 18px;
            }

            .brand {
                margin-bottom: 20px;
            }

            .sidebar nav {
                display: flex;
                flex-wrap: wrap;
                gap: 5px;
            }

            .sidebar nav a {
                margin: 0;
                padding: 10px;
            }

            .sidebar-bottom {
                margin-top: 15px;
                padding-top: 10px;
            }

            .main {
                margin-left: 0;
                padding: 20px 15px;
            }

            .header h1 {
                font-size: 23px;
            }

            .action-bar {
                align-items: flex-start;
            }
        }
    </style>
</head>

<body>

    <!-- ================= SIDEBAR ================= -->

    <aside class="sidebar">

        <div class="brand">
            Npontu <span>Tracker</span>
        </div>

        <div class="nav-label">Main Menu</div>

        <nav>

            <a href="{{ route('admin.dashboard') }}">
                Dashboard
            </a>

            <a href="{{ route('admin.activities.index') }}"
               class="active">
                Manage Activities
            </a>

            <a href="{{ route('admin.activities.create') }}">
                Create Activity
            </a>

            <a href="{{ route('admin.activities.history') }}">
                Daily History & Reports
            </a>

            <a href="{{ route('admin.staff.index') }}">
                Manage Staff
            </a>

        </nav>

        <div class="sidebar-bottom">

            <form action="{{ route('logout') }}" method="POST">
                @csrf

                <button type="submit" class="logout-btn">
                    Logout
                </button>
            </form>

        </div>

    </aside>


    <!-- ================= MAIN CONTENT ================= -->

    <main class="main">

        <!-- PAGE HEADER -->

        <div class="header">

            <div>
                <h1>Manage Activities</h1>

                <p>
                    View, manage and assign activities to support personnel.
                </p>
            </div>

            <div class="admin-info">
                Logged in as:
                <strong>{{ auth()->user()->name }}</strong>
            </div>

        </div>


        <!-- SUCCESS MESSAGE -->

        @if(session('success'))

            <div class="alert success">
                {{ session('success') }}
            </div>

        @endif


        <!-- VALIDATION ERRORS -->

        @if($errors->any())

            <div class="alert error">

                <strong>Please correct the following:</strong>

                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>

            </div>

        @endif


        <!-- ACTION BAR -->

        <div class="action-bar">

            <div class="activity-count">
                Total activities: <strong>{{ $activities->count() }}</strong>
            </div>

            <a href="{{ route('admin.activities.create') }}"
               class="primary-btn">
                + Create New Activity
            </a>

        </div>


        <!-- ================= ALL ACTIVITIES ================= -->

        <section class="content-section">

            <div class="section-header">

                <h2>All Activities</h2>

                <p>
                    Review activities, their current status and assigned personnel.
                </p>

            </div>


            <div class="table-container">

                <table>

                    <thead>

                        <tr>
                            <th>Activity Details</th>
                            <th>Priority</th>
                            <th>Status</th>
                            <th>Assigned Personnel</th>
                            <th>Created By</th>
                            <th>Due Date</th>
                            <th>Reassign</th>
                        </tr>

                    </thead>


                    <tbody>

                        @forelse($activities as $activity)

                            <tr>

                                <!-- ACTIVITY DETAILS -->

                                <td>

                                    <div class="activity-title">
                                        {{ $activity->title }}
                                    </div>

                                    <div class="activity-description">
                                        {{ $activity->description ?: 'No description provided.' }}
                                    </div>

                                </td>


                                <!-- PRIORITY -->

                                <td>

                                    <span class="badge priority-{{ $activity->priority }}">
                                        {{ ucfirst($activity->priority) }}
                                    </span>

                                </td>


                                <!-- ACTIVITY STATUS -->

                                <td>

                                    @php
                                        $activityStatus = strtolower($activity->status ?? 'pending');
                                    @endphp

                                    <span class="badge status-{{ $activityStatus }}">
                                        {{ ucfirst(str_replace('_', ' ', $activityStatus)) }}
                                    </span>

                                </td>


                                <!-- ASSIGNED PERSONNEL -->

                                <td>

                                    @forelse($activity->assignedUsers as $member)

                                        <span class="staff-name">
                                            {{ $member->name }}
                                        </span>

                                    @empty

                                        <span style="color:#94a3b8;">
                                            Not assigned
                                        </span>

                                    @endforelse

                                </td>


                                <!-- CREATOR -->

                                <td>
                                    {{ $activity->creator?->name ?? 'Unknown' }}
                                </td>


                                <!-- DUE DATE -->

                                <td class="date-time">

                                    @if($activity->due_date)
                                        {{ \Carbon\Carbon::parse($activity->due_date)->format('d M Y') }}
                                    @else
                                        Not set
                                    @endif

                                </td>


                                <!-- REASSIGNMENT FORM -->

                                <td>

                                    <form
                                        class="reassign-form"
                                        action="{{ route('admin.activities.reassign', $activity->id) }}"
                                        method="POST"
                                        onsubmit="return confirm('Are you sure you want to change the staff assigned to this activity?');"
                                    >

                                        @csrf
                                        @method('PATCH')

                                        <p class="hint">
                                            Hold Ctrl (or Cmd on Mac) to select multiple personnel.
                                        </p>

                                        <select
                                            name="assigned_users[]"
                                            multiple
                                            required
                                        >

                                            @foreach($staff as $member)

                                                <option
                                                    value="{{ $member->id }}"
                                                    {{ $activity->assignedUsers->contains('id', $member->id) ? 'selected' : '' }}
                                                >
                                                    {{ $member->name }}
                                                </option>

                                            @endforeach

                                        </select>

                                        <button type="submit" class="reassign-button">
                                            Reassign
                                        </button>

                                    </form>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="7" class="empty">
                                    No activities have been created yet.
                                    <br><br>

                                    <a href="{{ route('admin.activities.create') }}"
                                       class="primary-btn">
                                        Create First Activity
                                    </a>
                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </section>


        <!-- ================= REASSIGNMENT HISTORY ================= -->

        <section class="content-section">

            <div class="section-header">

                <h2>Activity Reassignment History</h2>

                <p class="history-description">
                    Review previous assignments, new assignments and the administrators
                    responsible for each reassignment.
                </p>

            </div>


            @php

                $hasReassignments = $activities->contains(
                    fn ($activity) => $activity->reassignments->isNotEmpty()
                );

            @endphp


            @if($hasReassignments)

                <div class="table-container">

                    <table>

                        <thead>

                            <tr>
                                <th>Activity</th>
                                <th>Previous Personnel</th>
                                <th>New Personnel</th>
                                <th>Reassigned By</th>
                                <th>Date & Time</th>
                            </tr>

                        </thead>


                        <tbody>

                            @foreach($activities as $activity)

                                @foreach($activity->reassignments as $history)

                                    <tr>

                                        <!-- ACTIVITY -->

                                        <td>
                                            <strong style="color:#0f172a;">
                                                {{ $activity->title }}
                                            </strong>
                                        </td>


                                        <!-- PREVIOUS STAFF -->

                                        <td>

                                            @forelse($history->previous_assignees ?? [] as $staffId)

                                                <span class="staff-name">
                                                    {{ $staffDirectory->get(
                                                        $staffId,
                                                        'Former staff (ID: '.$staffId.')'
                                                    ) }}
                                                </span>

                                            @empty

                                                No previous assignment

                                            @endforelse

                                        </td>


                                        <!-- NEW STAFF -->

                                        <td>

                                            @forelse($history->new_assignees ?? [] as $staffId)

                                                <span class="staff-name">
                                                    {{ $staffDirectory->get(
                                                        $staffId,
                                                        'Former staff (ID: '.$staffId.')'
                                                    ) }}
                                                </span>

                                            @empty

                                                No new assignment

                                            @endforelse

                                        </td>


                                        <!-- ADMINISTRATOR -->

                                        <td>
                                            {{ $history->administrator?->name ?? 'Administrator unavailable' }}
                                        </td>


                                        <!-- DATE AND TIME -->

                                        <td class="date-time">

                                            {{ $history->created_at
                                                ? $history->created_at->format('d M Y, h:i A')
                                                : 'N/A' }}

                                        </td>

                                    </tr>

                                @endforeach

                            @endforeach

                        </tbody>

                    </table>

                </div>

            @else

                <div class="empty">
                    No reassignment history is available yet.
                </div>

            @endif

        </section>


        <!-- FOOTER -->

        <div class="footer">
            Npontu Tracker | Applications Support Team
        </div>

    </main>

</body>
</html>
