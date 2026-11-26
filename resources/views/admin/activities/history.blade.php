
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Activity History | Npontu Tracker</title>

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

        /* Sidebar */
        .sidebar {
            width: 290px;
            height: 100vh;
            background: #0f172a;
            color: white;
            position: fixed;
            left: 0;
            top: 0;
            padding: 30px 20px;
        }

        .sidebar h2 {
            margin-bottom: 45px;
            font-size: 24px;
        }

        .sidebar h2 span {
            color: #38bdf8;
        }

        .menu-title {
            font-size: 12px;
            color: #94a3b8;
            margin: 25px 12px 15px;
            letter-spacing: 1px;
        }

        .sidebar a {
            display: block;
            color: #cbd5e1;
            text-decoration: none;
            padding: 15px;
            margin-bottom: 8px;
            border-radius: 8px;
            font-size: 15px;
        }

        .sidebar a:hover,
        .sidebar a.active {
            background: #1e3a5f;
            color: white;
            border-left: 4px solid #38bdf8;
        }

        .logout {
            position: absolute;
            bottom: 30px;
            left: 20px;
            right: 20px;
        }

        .logout button {
            width: 100%;
            padding: 14px;
            background: #1e293b;
            color: #fca5a5;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 15px;
        }

        .logout button:hover {
            background: #334155;
        }

        /* Main Content */
        .main {
            margin-left: 290px;
            padding: 35px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            gap: 15px;
        }

        .header h1 {
            font-size: 30px;
            margin-bottom: 8px;
        }

        .header p {
            color: #64748b;
        }

        .user-info {
            background: white;
            border: 1px solid #e2e8f0;
            padding: 14px 18px;
            border-radius: 8px;
            font-size: 14px;
        }

        /* Cards */
        .card {
            background: white;
            border: 1px solid #e2e8f0;
            border-radius: 10px;
            margin-bottom: 25px;
            overflow: hidden;
        }

        .card-header {
            padding: 22px 25px;
            border-bottom: 1px solid #e2e8f0;
        }

        .card-header h3 {
            font-size: 19px;
            margin-bottom: 7px;
        }

        .card-header p {
            color: #64748b;
            font-size: 14px;
        }

        .card-body {
            padding: 25px;
        }

        /* Filter Form */
        .filter-grid {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 18px;
        }

        .filter-group label {
            display: block;
            font-weight: bold;
            font-size: 14px;
            margin-bottom: 9px;
        }

        input,
        select {
            width: 100%;
            padding: 12px;
            border: 1px solid #cbd5e1;
            border-radius: 7px;
            background: white;
            font-size: 14px;
        }

        input:focus,
        select:focus {
            outline: none;
            border-color: #2563eb;
        }

        .error {
            color: #dc2626;
            font-size: 12px;
            margin-top: 7px;
        }

        .filter-actions {
            display: flex;
            gap: 12px;
            margin-top: 22px;
            flex-wrap: wrap;
        }

        .btn {
            display: inline-block;
            padding: 12px 18px;
            border-radius: 7px;
            border: none;
            text-decoration: none;
            font-size: 14px;
            font-weight: bold;
            cursor: pointer;
            text-align: center;
        }

        .btn-primary {
            background: #2563eb;
            color: white;
        }

        .btn-primary:hover {
            background: #1d4ed8;
        }

        .btn-secondary {
            background: #64748b;
            color: white;
        }

        .btn-export {
            background: #0f766e;
            color: white;
        }

        .btn-export:hover {
            background: #115e59;
        }

        /* Report Summary */
        .summary {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            flex-wrap: wrap;
            margin-bottom: 20px;
        }

        .summary p {
            color: #64748b;
            font-size: 14px;
        }

        .summary strong {
            color: #1e293b;
        }

        /* Table */
        .table-wrapper {
            width: 100%;
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 900px;
        }

        th,
        td {
            padding: 16px;
            text-align: left;
            border-bottom: 1px solid #e2e8f0;
            font-size: 14px;
            vertical-align: top;
        }

        th {
            background: #f8fafc;
            color: #64748b;
            font-weight: bold;
            white-space: nowrap;
        }

        td {
            line-height: 1.6;
        }

        tbody tr:hover {
            background: #f8fafc;
        }

        .status {
            display: inline-block;
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: bold;
        }

        .status-done {
            background: #dcfce7;
            color: #166534;
        }

        .status-pending {
            background: #fef3c7;
            color: #92400e;
        }

        .empty {
            text-align: center;
            padding: 35px;
            color: #64748b;
        }

        .success {
            background: #dcfce7;
            color: #166534;
            padding: 14px;
            border-radius: 7px;
            margin-bottom: 20px;
        }

        .report-period {
            color: #475569;
            font-size: 14px;
            margin-bottom: 18px;
        }

        .footer {
            text-align: center;
            color: #94a3b8;
            padding: 20px;
            font-size: 13px;
        }

        /* Responsive */
        @media (max-width: 1100px) {
            .filter-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 700px) {
            .sidebar {
                position: relative;
                width: 100%;
                height: auto;
            }

            .sidebar h2 {
                margin-bottom: 20px;
            }

            .logout {
                position: static;
                margin-top: 20px;
            }

            .main {
                margin-left: 0;
                padding: 20px 12px;
            }

            .header {
                align-items: flex-start;
                flex-direction: column;
            }

            .filter-grid {
                grid-template-columns: 1fr;
            }

            .filter-actions {
                flex-direction: column;
            }

            .btn {
                width: 100%;
            }
        }
    </style>
</head>

<body>

<!-- Sidebar -->
<aside class="sidebar">

    <h2>Npontu <span>Tracker</span></h2>

    <p class="menu-title">MAIN MENU</p>

    <a href="{{ route('admin.dashboard') }}">
        Dashboard
    </a>

    <a href="{{ route('admin.activities.index') }}">
        Manage Activities
    </a>

    <a href="{{ route('admin.activities.create') }}">
        Create Activity
    </a>

    <a href="{{ route('admin.activities.history') }}" class="active">
        Daily History & Reports
    </a>

    <a href="{{ route('admin.staff.index') }}">
        Manage Staff
    </a>

    <form action="{{ route('logout') }}" method="POST" class="logout">
        @csrf
        <button type="submit">Logout</button>
    </form>

</aside>


<!-- Main Content -->
<main class="main">

    <!-- Header -->
    <div class="header">

        <div>
            <h1>Activity History & Reports</h1>
            <p>Monitor staff progress and review submitted activity updates.</p>
        </div>

        <div class="user-info">
            Logged in as:
            <strong>{{ auth()->user()->name }}</strong>
        </div>

    </div>


    <!-- Success Message -->
    @if (session('success'))
        <div class="success">
            {{ session('success') }}
        </div>
    @endif


    <!-- Filters -->
    <div class="card">

        <div class="card-header">
            <h3>Filter Activity Reports</h3>
            <p>Select a date range, staff member or activity status.</p>
        </div>

        <div class="card-body">

            <form
                method="GET"
                action="{{ route('admin.activities.history') }}"
            >

                <div class="filter-grid">

                    <!-- Start Date -->
                    <div class="filter-group">

                        <label for="start_date">Start Date</label>

                        <input
                            type="date"
                            name="start_date"
                            id="start_date"
                            value="{{ $startDate }}"
                            required
                        >

                        @error('start_date')
                            <p class="error">{{ $message }}</p>
                        @enderror

                    </div>


                    <!-- End Date -->
                    <div class="filter-group">

                        <label for="end_date">End Date</label>

                        <input
                            type="date"
                            name="end_date"
                            id="end_date"
                            value="{{ $endDate }}"
                            min="{{ $startDate }}"
                            required
                        >

                        @error('end_date')
                            <p class="error">{{ $message }}</p>
                        @enderror

                    </div>


                    <!-- Staff -->
                    <div class="filter-group">

                        <label for="staff_id">Staff Member</label>

                        <select name="staff_id" id="staff_id">

                            <option value="">All Staff Members</option>

                            @foreach ($staff as $member)

                                <option
                                    value="{{ $member->id }}"
                                    {{ request('staff_id') == $member->id ? 'selected' : '' }}
                                >
                                    {{ $member->name }}
                                </option>

                            @endforeach

                        </select>

                        @error('staff_id')
                            <p class="error">{{ $message }}</p>
                        @enderror

                    </div>


                    <!-- Status -->
                    <div class="filter-group">

                        <label for="status">Activity Status</label>

                        <select name="status" id="status">

                            <option value="">All Statuses</option>

                            <option
                                value="done"
                                {{ request('status') == 'done' ? 'selected' : '' }}
                            >
                                Done
                            </option>

                            <option
                                value="pending"
                                {{ request('status') == 'pending' ? 'selected' : '' }}
                            >
                                Pending
                            </option>

                        </select>

                        @error('status')
                            <p class="error">{{ $message }}</p>
                        @enderror

                    </div>

                </div>


                <!-- Actions -->
                <div class="filter-actions">

                    <button type="submit" class="btn btn-primary">
                        Apply Filters
                    </button>

                    <a
                        href="{{ route('admin.activities.history') }}"
                        class="btn btn-secondary"
                    >
                        Clear Filters
                    </a>

                    <a
                        href="{{ route('admin.activities.history.export', [
                            'start_date' => $startDate,
                            'end_date' => $endDate,
                            'staff_id' => request('staff_id'),
                            'status' => request('status')
                        ]) }}"
                        class="btn btn-export"
                    >
                        ↓ Export to Excel
                    </a>

                </div>

            </form>

        </div>

    </div>


    <!-- Activity Report -->
    <div class="card">

        <div class="card-header">

            <h3>Staff Activity Update History</h3>

            <p>
                Review all progress updates submitted by assigned personnel.
            </p>

        </div>

        <div class="card-body">

            <!-- Report Summary -->
            <div class="summary">

                <div>
                    <p class="report-period">

                        Report Period:

                        <strong>
                            {{ \Carbon\Carbon::parse($startDate)->format('d M Y') }}
                        </strong>

                        to

                        <strong>
                            {{ \Carbon\Carbon::parse($endDate)->format('d M Y') }}
                        </strong>

                    </p>
                </div>

                <p>
                    Total Updates Found:
                    <strong>{{ $updates->count() }}</strong>
                </p>

            </div>


            <!-- History Table -->
            @if ($updates->isEmpty())

                <div class="empty">
                    No activity updates were found for the selected filters.
                </div>

            @else

                <div class="table-wrapper">

                    <table>

                        <thead>

                            <tr>
                                <th>Activity</th>
                                <th>Staff Member</th>
                                <th>Status</th>
                                <th>Update Description</th>
                                <th>Remark</th>
                                <th>Date & Time</th>
                            </tr>

                        </thead>

                        <tbody>

                            @foreach ($updates as $update)

                                <tr>

                                    <td>
                                        <strong>
                                            {{ $update->activity->title ?? 'Activity unavailable' }}
                                        </strong>
                                    </td>

                                    <td>
                                        {{ $update->user->name ?? 'User unavailable' }}
                                    </td>

                                    <td>

                                        @if ($update->status === 'done')

                                            <span class="status status-done">
                                                Done
                                            </span>

                                        @else

                                            <span class="status status-pending">
                                                Pending
                                            </span>

                                        @endif

                                    </td>

                                    <td>
                                        {{ $update->update }}
                                    </td>

                                    <td>
                                        {{ $update->remark ?: 'No remark provided' }}
                                    </td>

                                    <td>
                                        {{ $update->created_at->format('d M Y, h:i A') }}
                                    </td>

                                </tr>

                            @endforeach

                        </tbody>

                    </table>

                </div>

            @endif

        </div>

    </div>


    <div class="footer">
        Npontu Tracker | Applications Support Team
    </div>

</main>

</body>
</html>
