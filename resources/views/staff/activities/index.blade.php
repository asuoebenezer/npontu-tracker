
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>My Activities | Npontu Tracker</title>

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

        /* HEADER */
        .topbar {
            background: #0f172a;
            color: white;
            padding: 20px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            flex-wrap: wrap;
        }

        .brand {
            font-size: 23px;
            font-weight: bold;
        }

        .brand span {
            color: #38bdf8;
        }

        .topbar-right {
            display: flex;
            align-items: center;
            gap: 18px;
            flex-wrap: wrap;
        }

        .welcome {
            font-size: 13px;
            color: #cbd5e1;
        }

        .logout-btn {
            background: #1e293b;
            color: #fca5a5;
            border: none;
            padding: 10px 15px;
            border-radius: 6px;
            cursor: pointer;
            font-size: 13px;
        }

        .logout-btn:hover {
            background: #334155;
        }

        /* MAIN CONTENT */
        .main {
            max-width: 1250px;
            margin: auto;
            padding: 32px;
        }

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 15px;
            margin-bottom: 25px;
        }

        .page-header h1 {
            font-size: 27px;
            color: #0f172a;
            margin-bottom: 7px;
        }

        .page-header p {
            color: #64748b;
            font-size: 14px;
        }

        /* ALERTS */
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

        /* CONTENT CARD */
        .content-card {
            background: white;
            border: 1px solid #e2e8f0;
            border-radius: 10px;
            overflow: hidden;
        }

        .section-header {
            padding: 21px 22px;
            border-bottom: 1px solid #e2e8f0;
        }

        .section-header h2 {
            font-size: 17px;
            color: #0f172a;
            margin-bottom: 6px;
        }

        .section-header p {
            color: #64748b;
            font-size: 13px;
        }

        .table-container {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 800px;
        }

        th {
            background: #f8fafc;
            color: #64748b;
            font-size: 12px;
            text-align: left;
            padding: 15px;
            white-space: nowrap;
        }

        td {
            padding: 16px 15px;
            border-top: 1px solid #f1f5f9;
            font-size: 13px;
            color: #475569;
            vertical-align: top;
        }

        tr:hover td {
            background: #fafcff;
        }

        .activity-title {
            font-weight: 600;
            color: #0f172a;
            margin-bottom: 7px;
        }

        .description {
            max-width: 250px;
            line-height: 1.5;
            overflow-wrap: anywhere;
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

        .low {
            background: #e0f2fe;
            color: #075985;
        }

        .medium {
            background: #fef3c7;
            color: #92400e;
        }

        .high {
            background: #fee2e2;
            color: #991b1b;
        }

        .done {
            background: #dcfce7;
            color: #166534;
        }

        .pending {
            background: #fef3c7;
            color: #92400e;
        }

        .no-update {
            background: #f1f5f9;
            color: #64748b;
        }

        /* BUTTON */
        .view-btn {
            display: inline-block;
            background: #2563eb;
            color: white;
            padding: 10px 14px;
            text-decoration: none;
            border-radius: 6px;
            font-size: 12px;
            font-weight: 600;
            white-space: nowrap;
        }

        .view-btn:hover {
            background: #1d4ed8;
        }

        .empty {
            text-align: center;
            padding: 45px 20px;
            color: #94a3b8;
            font-size: 14px;
        }

        .footer {
            text-align: center;
            color: #94a3b8;
            font-size: 12px;
            margin-top: 30px;
        }

        @media(max-width: 600px) {
            .topbar {
                padding: 18px;
            }

            .main {
                padding: 20px 12px;
            }

            .page-header h1 {
                font-size: 23px;
            }
        }
    </style>
</head>

<body>

    <!-- HEADER -->

    <header class="topbar">

        <div class="brand">
            Npontu <span>Tracker</span>
        </div>

        <div class="topbar-right">

            <div class="welcome">
                Welcome, <strong>{{ auth()->user()->name }}</strong>
            </div>

            <form action="{{ route('logout') }}" method="POST">
                @csrf

                <button type="submit" class="logout-btn">
                    Logout
                </button>
            </form>

        </div>

    </header>


    <!-- MAIN CONTENT -->

    <main class="main">

        <div class="page-header">

            <div>
                <h1>My Assigned Activities</h1>

                <p>
                    View your assigned activities and submit progress updates.
                </p>
            </div>

        </div>


        <!-- SUCCESS MESSAGE -->

        @if(session('success'))

            <div class="alert success">
                {{ session('success') }}
            </div>

        @endif


        <!-- ERROR MESSAGE -->

        @if($errors->any())

            <div class="alert error">
                <strong>Please correct the following errors:</strong>

                <ul style="margin: 8px 0 0 20px;">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>

        @endif


        <!-- ACTIVITIES TABLE -->

        <section class="content-card">

            <div class="section-header">

                <h2>My Activities</h2>

                <p>
                    Activities assigned to your staff account.
                </p>

            </div>


            <div class="table-container">

                <table>

                    <thead>

                        <tr>
                            <th>Activity</th>
                            <th>Priority</th>
                            <th>Due Date</th>
                            <th>Created By</th>
                            <th>My Latest Update</th>
                            <th>Action</th>
                        </tr>

                    </thead>


                    <tbody>

                        @forelse($activities as $activity)

                            @php
                                $myLatestUpdate = $activity->updates
                                    ->where('user_id', auth()->id())
                                    ->sortByDesc('created_at')
                                    ->first();
                            @endphp

                            <tr>

                                <!-- ACTIVITY -->

                                <td>

                                    <div class="activity-title">
                                        {{ $activity->title }}
                                    </div>

                                    <div class="description">
                                        {{ $activity->description ?: 'No description provided.' }}
                                    </div>

                                </td>


                                <!-- PRIORITY -->

                                <td>

                                    <span class="badge {{ $activity->priority }}">
                                        {{ ucfirst($activity->priority) }}
                                    </span>

                                </td>


                                <!-- DUE DATE -->

                                <td>

                                    @if($activity->due_date)
                                        {{ \Carbon\Carbon::parse($activity->due_date)->format('d M Y') }}
                                    @else
                                        Not set
                                    @endif

                                </td>


                                <!-- CREATOR -->

                                <td>
                                    {{ $activity->creator?->name ?? 'Unknown' }}
                                </td>


                                <!-- MY LATEST UPDATE -->

                                <td>

                                    @if($myLatestUpdate)

                                        <span class="badge {{ $myLatestUpdate->status }}">
                                            {{ ucfirst($myLatestUpdate->status) }}
                                        </span>

                                        <br><br>

                                        <small style="color:#64748b;">
                                            {{ $myLatestUpdate->created_at?->format('d M Y, h:i A') ?? 'N/A' }}
                                        </small>

                                    @else

                                        <span class="badge no-update">
                                            Not submitted
                                        </span>

                                    @endif

                                </td>


                                <!-- ACTION -->

                                <td>

                                    <a class="view-btn"
                                       href="{{ route('staff.activities.show', $activity->id) }}">
                                        View Activity
                                    </a>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="6" class="empty">

                                    No activities have been assigned to you yet.

                                    <br><br>

                                    Please contact your administrator for activity assignments.

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </section>


        <div class="footer">
            Npontu Tracker | Applications Support Team
        </div>

    </main>

</body>
</html>
