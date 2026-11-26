
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Activity Details | Npontu Tracker</title>

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

        /* MAIN */

        .main {
            max-width: 1000px;
            margin: auto;
            padding: 32px;
        }

        .back {
            display: inline-block;
            color: #2563eb;
            text-decoration: none;
            font-size: 13px;
            font-weight: 600;
            margin-bottom: 22px;
        }

        .back:hover {
            text-decoration: underline;
        }

        .page-header {
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

        /* CARDS */

        .card {
            background: white;
            border: 1px solid #e2e8f0;
            border-radius: 10px;
            margin-bottom: 22px;
            overflow: hidden;
        }

        .card-header {
            padding: 20px 23px;
            border-bottom: 1px solid #e2e8f0;
        }

        .card-header h2 {
            font-size: 17px;
            color: #0f172a;
        }

        .card-header p {
            color: #64748b;
            font-size: 13px;
            margin-top: 6px;
        }

        .card-body {
            padding: 23px;
        }

        /* ACTIVITY DETAILS */

        .activity-title {
            font-size: 22px;
            color: #0f172a;
            margin-bottom: 14px;
        }

        .description {
            color: #475569;
            line-height: 1.7;
            margin-bottom: 22px;
            white-space: pre-line;
        }

        .details-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 16px;
        }

        .detail-item {
            background: #f8fafc;
            padding: 14px;
            border-radius: 7px;
        }

        .detail-label {
            font-size: 11px;
            color: #64748b;
            margin-bottom: 7px;
            text-transform: uppercase;
        }

        .detail-value {
            font-size: 14px;
            font-weight: 600;
            color: #1e293b;
        }

        /* BADGES */

        .badge {
            display: inline-block;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 600;
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

        /* FORM */

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-size: 13px;
            font-weight: 600;
            color: #334155;
            margin-bottom: 8px;
        }

        input,
        textarea,
        select {
            width: 100%;
            padding: 12px 13px;
            border: 1px solid #cbd5e1;
            border-radius: 6px;
            font-size: 14px;
            color: #1e293b;
            background: white;
            outline: none;
        }

        input:focus,
        textarea:focus,
        select:focus {
            border-color: #2563eb;
            box-shadow: 0 0 0 3px #2563eb18;
        }

        textarea {
            min-height: 110px;
            resize: vertical;
        }

        .hint {
            color: #64748b;
            font-size: 12px;
            margin-top: 7px;
        }

        .submit-btn {
            background: #2563eb;
            color: white;
            border: none;
            padding: 12px 20px;
            border-radius: 6px;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
        }

        .submit-btn:hover {
            background: #1d4ed8;
        }

        /* HISTORY */

        .history-item {
            padding: 18px 0;
            border-bottom: 1px solid #e2e8f0;
        }

        .history-item:first-child {
            padding-top: 0;
        }

        .history-item:last-child {
            border-bottom: none;
            padding-bottom: 0;
        }

        .history-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 12px;
            flex-wrap: wrap;
            margin-bottom: 12px;
        }

        .staff-name {
            font-size: 14px;
            font-weight: 600;
            color: #0f172a;
        }

        .history-description {
            color: #475569;
            font-size: 13px;
            line-height: 1.6;
            margin-bottom: 12px;
            white-space: pre-line;
            overflow-wrap: anywhere;
        }

        .remark {
            background: #f8fafc;
            padding: 12px;
            border-radius: 6px;
            color: #475569;
            font-size: 13px;
            margin-bottom: 12px;
            overflow-wrap: anywhere;
        }

        .timestamp {
            color: #94a3b8;
            font-size: 11px;
        }

        .empty {
            color: #94a3b8;
            text-align: center;
            padding: 30px 15px;
            font-size: 13px;
        }

        .footer {
            text-align: center;
            color: #94a3b8;
            font-size: 12px;
            margin-top: 30px;
        }

        /* RESPONSIVE */

        @media(max-width: 600px) {

            .topbar {
                padding: 18px;
            }

            .main {
                padding: 20px 12px;
            }

            .details-grid {
                grid-template-columns: 1fr;
            }

            .page-header h1 {
                font-size: 23px;
            }

            .card-body {
                padding: 17px;
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

        <a class="back" href="{{ route('staff.activities.index') }}">
            &larr; Back to My Activities
        </a>


        <div class="page-header">

            <h1>Activity Details</h1>

            <p>
                Review the assigned activity and submit your progress.
            </p>

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

                <strong>Please correct the following errors:</strong>

                <ul style="margin: 8px 0 0 20px;">

                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach

                </ul>

            </div>

        @endif


        <!-- ACTIVITY DETAILS -->

        <section class="card">

            <div class="card-header">

                <h2>Assigned Activity Information</h2>

                <p>
                    Details and deadlines for this activity.
                </p>

            </div>


            <div class="card-body">

                <h2 class="activity-title">
                    {{ $activity->title }}
                </h2>

                <div class="description">
                    {{ $activity->description ?: 'No description provided.' }}
                </div>


                <div class="details-grid">

                    <div class="detail-item">

                        <div class="detail-label">
                            Priority
                        </div>

                        <div class="detail-value">

                            <span class="badge {{ $activity->priority }}">
                                {{ ucfirst($activity->priority) }}
                            </span>

                        </div>

                    </div>


                    <div class="detail-item">

                        <div class="detail-label">
                            Due Date
                        </div>

                        <div class="detail-value">

                            @if($activity->due_date)
                                {{ \Carbon\Carbon::parse($activity->due_date)->format('d M Y') }}
                            @else
                                Not set
                            @endif

                        </div>

                    </div>


                    <div class="detail-item">

                        <div class="detail-label">
                            Start Date
                        </div>

                        <div class="detail-value">

                            @if($activity->start_date)
                                {{ \Carbon\Carbon::parse($activity->start_date)->format('d M Y') }}
                            @else
                                Not set
                            @endif

                        </div>

                    </div>


                    <div class="detail-item">

                        <div class="detail-label">
                            Created By
                        </div>

                        <div class="detail-value">
                            {{ $activity->creator?->name ?? 'Unknown' }}
                        </div>

                    </div>

                </div>

            </div>

        </section>


        <!-- SUBMIT UPDATE -->

        <section class="card">

            <div class="card-header">

                <h2>Submit Activity Update</h2>

                <p>
                    Record your progress and update the activity status.
                </p>

            </div>


            <div class="card-body">

                <form
                    action="{{ route('staff.activities.store', $activity->id) }}"
                    method="POST"
                >

                    @csrf


                    <!-- UPDATE DESCRIPTION -->

                    <div class="form-group">

                        <label for="update">
                            Progress Description *
                        </label>

                        <textarea
                            name="update"
                            id="update"
                            maxlength="5000"
                            required
                            placeholder="Describe the work completed or the progress made..."
                        >{{ old('update') }}</textarea>

                        <p class="hint">
                            Maximum 5,000 characters.
                        </p>

                        @error('update')
                            <p style="color:#dc2626;font-size:12px;margin-top:6px;">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>


                    <!-- STATUS -->

                    <div class="form-group">

                        <label for="status">
                            Activity Status *
                        </label>

                        <select name="status" id="status" required>

                            <option value="">
                                Select activity status
                            </option>

                            <option
                                value="done"
                                {{ old('status') === 'done' ? 'selected' : '' }}
                            >
                                Done
                            </option>

                            <option
                                value="pending"
                                {{ old('status') === 'pending' ? 'selected' : '' }}
                            >
                                Pending
                            </option>

                        </select>

                        @error('status')
                            <p style="color:#dc2626;font-size:12px;margin-top:6px;">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>


                    <!-- REMARK -->

                    <div class="form-group">

                        <label for="remark">
                            Remarks (Optional)
                        </label>

                        <textarea
                            name="remark"
                            id="remark"
                            maxlength="2000"
                            placeholder="Add additional comments, challenges or observations..."
                        >{{ old('remark') }}</textarea>

                        <p class="hint">
                            Maximum 2,000 characters.
                        </p>

                        @error('remark')
                            <p style="color:#dc2626;font-size:12px;margin-top:6px;">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>


                    <button type="submit" class="submit-btn">
                        Submit Activity Update
                    </button>

                </form>

            </div>

        </section>


        <!-- ACTIVITY UPDATE HISTORY -->

        <section class="card">

            <div class="card-header">

                <h2>Activity Update History</h2>

                <p>
                    Review progress updates submitted by assigned personnel.
                </p>

            </div>


            <div class="card-body">

                @forelse($activity->updates->sortByDesc('created_at') as $update)

                    <div class="history-item">

                        <div class="history-top">

                            <div class="staff-name">
                                {{ $update->user?->name ?? 'Unknown Staff' }}
                            </div>

                            <span class="badge {{ $update->status }}">
                                {{ ucfirst($update->status) }}
                            </span>

                        </div>


                        <div class="history-description">
                            {{ $update->update }}
                        </div>


                        <div class="remark">

                            <strong>Remark:</strong>

                            {{ $update->remark ?: 'No remark provided.' }}

                        </div>


                        <div class="timestamp">

                            Submitted:

                            {{ $update->created_at?->format('d M Y, h:i A') ?? 'Date unavailable' }}

                        </div>

                    </div>

                @empty

                    <div class="empty">

                        No progress updates have been submitted for this activity yet.

                    </div>

                @endforelse

            </div>

        </section>


        <div class="footer">
            Npontu Tracker | Applications Support Team
        </div>

    </main>

</body>
</html>
