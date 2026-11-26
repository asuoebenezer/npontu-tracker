
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Npontu Tracker | Admin Dashboard</title>

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

        /* ================= SIDEBAR ================= */

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
            display: flex;
            align-items: center;
            gap: 12px;
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

        /* ================= MAIN CONTENT ================= */

        .main {
            margin-left: 250px;
            padding: 32px;
            min-height: 100vh;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
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

        .date-info {
            color: #64748b;
            font-size: 13px;
            margin-bottom: 25px;
        }

        /* ================= ALERT MESSAGES ================= */

        .alert {
            padding: 13px 16px;
            border-radius: 7px;
            margin-bottom: 20px;
            font-size: 13px;
        }

        .alert-success {
            background: #dcfce7;
            color: #166534;
            border: 1px solid #bbf7d0;
        }

        .alert-error {
            background: #fee2e2;
            color: #991b1b;
            border: 1px solid #fecaca;
        }

        /* ================= STATISTICS CARDS ================= */

        .cards {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 18px;
            margin-bottom: 30px;
        }

        .card {
            background: white;
            padding: 23px;
            border-radius: 10px;
            border: 1px solid #e2e8f0;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.03);
        }

        .card h3 {
            font-size: 13px;
            font-weight: 500;
            color: #64748b;
            margin-bottom: 17px;
        }

        .card p {
            font-size: 29px;
            font-weight: bold;
            color: #0f172a;
        }

        .card-total {
            border-top: 3px solid #2563eb;
        }

        .card-completed {
            border-top: 3px solid #16a34a;
        }

        .card-pending {
            border-top: 3px solid #d97706;
        }

        .card-updates {
            border-top: 3px solid #7c3aed;
        }

        /* ================= QUICK ACTION ================= */

        .quick-actions {
            display: flex;
            justify-content: flex-end;
            margin-bottom: 22px;
        }

        .primary-btn {
            display: inline-block;
            background: #2563eb;
            color: white;
            text-decoration: none;
            padding: 11px 18px;
            border-radius: 7px;
            font-size: 13px;
            font-weight: 600;
            transition: 0.2s;
        }

        .primary-btn:hover {
            background: #1d4ed8;
        }

        /* ================= RECENT UPDATES ================= */

        .content-section {
            background: white;
            border: 1px solid #e2e8f0;
            border-radius: 10px;
            overflow: hidden;
        }

        .section-header {
            padding: 20px 22px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #e2e8f0;
            flex-wrap: wrap;
            gap: 12px;
        }

        .section-header h2 {
            font-size: 17px;
            color: #0f172a;
        }

        .view-link {
            color: #2563eb;
            text-decoration: none;
            font-size: 13px;
            font-weight: 600;
        }

        .view-link:hover {
            text-decoration: underline;
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
            padding: 15px 18px;
            font-weight: 600;
            white-space: nowrap;
        }

        td {
            padding: 16px 18px;
            border-top: 1px solid #f1f5f9;
            font-size: 13px;
            color: #475569;
            vertical-align: top;
        }

        tr:hover td {
            background: #fafcff;
        }

        .activity-name {
            color: #0f172a;
            font-weight: 600;
        }

        .update-description {
            max-width: 240px;
            line-height: 1.5;
            overflow-wrap: anywhere;
        }

        .remark-text {
            max-width: 180px;
            overflow-wrap: anywhere;
        }

        /* ================= STATUS BADGES ================= */

        .status {
            display: inline-block;
            padding: 5px 11px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 600;
        }

        .done {
            background: #dcfce7;
            color: #166534;
        }

        .pending {
            background: #fef3c7;
            color: #92400e;
        }

        /* ================= EMPTY STATE ================= */

        .empty-state {
            text-align: center;
            padding: 45px 20px;
            color: #94a3b8;
            font-size: 14px;
        }

        /* ================= FOOTER ================= */

        .footer {
            text-align: center;
            color: #94a3b8;
            font-size: 12px;
            margin-top: 30px;
            padding-bottom: 15px;
        }

        /* ================= RESPONSIVENESS ================= */

        @media (max-width: 1100px) {
            .cards {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 768px) {
            .sidebar {
                width: 100%;
                height: auto;
                min-height: auto;
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
        }

        @media (max-width: 480px) {
            .cards {
                grid-template-columns: 1fr;
            }

            .admin-info {
                width: 100%;
            }

            .quick-actions {
                justify-content: flex-start;
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

            <!-- Dashboard -->
            <a href="{{ route('admin.dashboard') }}"
               class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                Dashboard
            </a>

            <!-- Manage Activities -->
            <a href="{{ route('admin.activities.index') }}"
               class="{{ request()->routeIs('admin.activities.index') ? 'active' : '' }}">
                Manage Activities
            </a>

            <!-- Create Activity -->
            <a href="{{ route('admin.activities.create') }}"
               class="{{ request()->routeIs('admin.activities.create') ? 'active' : '' }}">
                Create Activity
            </a>

            <!-- Daily History and Reports -->
            <a href="{{ route('admin.activities.history') }}"
               class="{{ request()->routeIs('admin.activities.history') ? 'active' : '' }}">
                Daily History & Reports
            </a>

            <!-- Manage Staff -->
            <a href="{{ route('admin.staff.index') }}"
               class="{{ request()->routeIs('admin.staff.*') ? 'active' : '' }}">
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

        <!-- HEADER -->

        <div class="header">

            <div>
                <h1>Dashboard</h1>

                <p>
                    Overview of Applications Support Team activities.
                </p>
            </div>

            <div class="admin-info">
                Logged in as:
                <strong>{{ auth()->user()->name }}</strong>
            </div>

        </div>


        <!-- CURRENT DATE -->

        <div class="date-info">
            {{ now()->format('l, d F Y') }}
        </div>


        <!-- SUCCESS MESSAGE -->

        @if(session('success'))

            <div class="alert alert-success">
                {{ session('success') }}
            </div>

        @endif


        <!-- ERROR MESSAGE -->

        @if(session('error'))

            <div class="alert alert-error">
                {{ session('error') }}
            </div>

        @endif


        <!-- ================= DASHBOARD STATISTICS ================= -->

        <div class="cards">

            <div class="card card-total">

                <h3>Total Activities</h3>

                <p>{{ $totalActivities ?? 0 }}</p>

            </div>


            <div class="card card-completed">

                <h3>Completed Activities</h3>

                <p>{{ $completedActivities ?? 0 }}</p>

            </div>


            <div class="card card-pending">

                <h3>Pending Activities</h3>

                <p>{{ $pendingActivities ?? 0 }}</p>

            </div>


            <div class="card card-updates">

                <h3>Today's Updates</h3>

                <p>{{ $todayUpdates ?? 0 }}</p>

            </div>

        </div>


        <!-- ================= QUICK ACTION ================= -->

        <div class="quick-actions">

            <a href="{{ route('admin.activities.create') }}"
               class="primary-btn">
                + Create New Activity
            </a>

        </div>


        <!-- ================= RECENT ACTIVITY UPDATES ================= -->

        <section class="content-section">

            <div class="section-header">

                <h2>Recent Activity Updates</h2>

                <a href="{{ route('admin.activities.history') }}"
                   class="view-link">
                    View Full Activity History
                </a>

            </div>


            <div class="table-container">

                <table>

                    <thead>

                        <tr>
                            <th>Activity</th>
                            <th>Personnel</th>
                            <th>Update Description</th>
                            <th>Status</th>
                            <th>Remark</th>
                            <th>Date & Time</th>
                        </tr>

                    </thead>


                    <tbody>

                        @forelse($recentUpdates ?? [] as $update)

                            <tr>

                                <!-- ACTIVITY TITLE -->

                                <td>
                                    <span class="activity-name">
                                        {{ $update->activity?->title ?? 'Activity unavailable' }}
                                    </span>
                                </td>


                                <!-- PERSONNEL NAME -->

                                <td>
                                    {{ $update->user?->name ?? 'Unknown personnel' }}
                                </td>


                                <!-- UPDATE DESCRIPTION -->

                                <td>
                                    <div class="update-description">
                                        {{ $update->update }}
                                    </div>
                                </td>


                                <!-- STATUS -->

                                <td>

                                    @if($update->status === 'done')

                                        <span class="status done">
                                            Done
                                        </span>

                                    @else

                                        <span class="status pending">
                                            Pending
                                        </span>

                                    @endif

                                </td>


                                <!-- REMARK -->

                                <td>
                                    <div class="remark-text">
                                        {{ $update->remark ?: 'No remark provided' }}
                                    </div>
                                </td>


                                <!-- DATE AND TIME -->

                                <td>
                                    {{ $update->created_at
                                        ? $update->created_at->format('d M Y, h:i A')
                                        : 'N/A' }}
                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="6" class="empty-state">

                                    No activity updates available yet.

                                    <br><br>

                                    Staff updates will appear here once submitted.

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </section>


        <!-- FOOTER -->

        <div class="footer">
            Npontu Tracker | Applications Support Team
        </div>

    </main>

</body>
</html>
