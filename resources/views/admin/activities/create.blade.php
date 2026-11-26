
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Create Activity | Npontu Tracker</title>

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
            padding: 28px 20px;
            display: flex;
            flex-direction: column;
        }

        .brand {
            font-size: 23px;
            font-weight: bold;
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
        }

        .logout-btn {
            width: 100%;
            background: #1e293b;
            color: #fca5a5;
            border: none;
            padding: 13px;
            border-radius: 7px;
            cursor: pointer;
            text-align: left;
            font-size: 14px;
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
            flex-wrap: wrap;
            gap: 15px;
            margin-bottom: 30px;
        }

        .header h1 {
            font-size: 27px;
            margin-bottom: 7px;
            color: #0f172a;
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
        }

        .content-section {
            background: white;
            border: 1px solid #e2e8f0;
            border-radius: 11px;
            overflow: hidden;
            max-width: 950px;
        }

        .section-header {
            padding: 22px 25px;
            border-bottom: 1px solid #e2e8f0;
        }

        .section-header h2 {
            font-size: 18px;
            margin-bottom: 7px;
            color: #0f172a;
        }

        .section-header p {
            color: #64748b;
            font-size: 13px;
        }

        .form-content {
            padding: 25px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            font-weight: 600;
            font-size: 13px;
            margin-bottom: 8px;
            color: #334155;
        }

        .form-group input,
        .form-group textarea,
        .form-group select {
            width: 100%;
            padding: 11px 13px;
            border: 1px solid #cbd5e1;
            border-radius: 6px;
            font-size: 14px;
            color: #1e293b;
            background: white;
            outline: none;
        }

        .form-group input:focus,
        .form-group textarea:focus,
        .form-group select:focus {
            border-color: #2563eb;
            box-shadow: 0 0 0 3px #2563eb18;
        }

        .form-group textarea {
            min-height: 110px;
            resize: vertical;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .form-group select[multiple] {
            min-height: 130px;
        }

        .hint {
            font-size: 12px;
            color: #64748b;
            margin-top: 7px;
        }

        .required {
            color: #dc2626;
        }

        .error-message {
            color: #dc2626;
            font-size: 12px;
            margin-top: 6px;
        }

        .alert-success {
            background: #dcfce7;
            color: #166534;
            padding: 13px;
            border-radius: 6px;
            margin: 20px 25px 0;
            font-size: 13px;
        }

        .alert-error {
            background: #fee2e2;
            color: #991b1b;
            padding: 13px;
            border-radius: 6px;
            margin-bottom: 20px;
            font-size: 13px;
        }

        .form-actions {
            display: flex;
            gap: 12px;
            align-items: center;
            margin-top: 25px;
            flex-wrap: wrap;
        }

        .btn {
            display: inline-block;
            padding: 12px 20px;
            border-radius: 6px;
            text-decoration: none;
            border: none;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
        }

        .btn-primary {
            background: #2563eb;
            color: white;
        }

        .btn-primary:hover {
            background: #1d4ed8;
        }

        .btn-secondary {
            background: #e2e8f0;
            color: #334155;
        }

        .btn-secondary:hover {
            background: #cbd5e1;
        }

        /* RESPONSIVE */
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
            }

            .main {
                margin-left: 0;
                padding: 20px 15px;
            }

            .form-row {
                grid-template-columns: 1fr;
                gap: 0;
            }

            .header h1 {
                font-size: 23px;
            }
        }
    </style>
</head>

<body>

    <!-- SIDEBAR -->
    <aside class="sidebar">

        <div class="brand">
            Npontu <span>Tracker</span>
        </div>

        <div class="nav-label">Main Menu</div>

        <nav>

            <a href="{{ route('admin.dashboard') }}"
               class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                Dashboard
            </a>

            <a href="{{ route('admin.activities.index') }}"
               class="{{ request()->routeIs('admin.activities.index') ? 'active' : '' }}">
                Manage Activities
            </a>

            <a href="{{ route('admin.activities.create') }}"
               class="{{ request()->routeIs('admin.activities.create') ? 'active' : '' }}">
                Create Activity
            </a>

            <a href="{{ route('admin.activities.history') }}"
               class="{{ request()->routeIs('admin.activities.history*') ? 'active' : '' }}">
                Daily History & Reports
            </a>

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


    <!-- MAIN CONTENT -->
    <main class="main">

        <div class="header">

            <div>
                <h1>Create New Activity</h1>
                <p>Create an activity and assign it to applications support personnel.</p>
            </div>

            <div class="admin-info">
                Logged in as:
                <strong>{{ auth()->user()->name }}</strong>
            </div>

        </div>


        <!-- FORM SECTION -->
        <section class="content-section">

            <div class="section-header">

                <h2>Activity Information</h2>

                <p>
                    Complete the details below to create and assign a new activity.
                </p>

            </div>

            @if (session('success'))
                <div class="alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="form-content">

                @if ($errors->any())
                    <div class="alert-error">
                        <strong>Please correct the following errors:</strong>

                        <ul style="margin: 8px 0 0 18px;">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif


                <form action="{{ route('admin.activities.store') }}"
                      method="POST">

                    @csrf

                    <!-- ACTIVITY TITLE -->
                    <div class="form-group">

                        <label for="title">
                            Activity Title <span class="required">*</span>
                        </label>

                        <input
                            type="text"
                            id="title"
                            name="title"
                            value="{{ old('title') }}"
                            placeholder="Enter activity title"
                            maxlength="255"
                            required
                        >

                        @error('title')
                            <div class="error-message">{{ $message }}</div>
                        @enderror

                    </div>


                    <!-- DESCRIPTION -->
                    <div class="form-group">

                        <label for="description">
                            Activity Description
                        </label>

                        <textarea
                            id="description"
                            name="description"
                            placeholder="Describe the activity and expected outcome..."
                        >{{ old('description') }}</textarea>

                        @error('description')
                            <div class="error-message">{{ $message }}</div>
                        @enderror

                    </div>


                    <!-- DATES -->
                    <div class="form-row">

                        <div class="form-group">

                            <label for="start_date">
                                Start Date
                            </label>

                            <input
                                type="date"
                                id="start_date"
                                name="start_date"
                                value="{{ old('start_date') }}"
                            >

                            @error('start_date')
                                <div class="error-message">{{ $message }}</div>
                            @enderror

                        </div>


                        <div class="form-group">

                            <label for="due_date">
                                Due Date
                            </label>

                            <input
                                type="date"
                                id="due_date"
                                name="due_date"
                                value="{{ old('due_date') }}"
                            >

                            @error('due_date')
                                <div class="error-message">{{ $message }}</div>
                            @enderror

                        </div>

                    </div>


                    <!-- PRIORITY -->
                    <div class="form-group">

                        <label for="priority">
                            Activity Priority <span class="required">*</span>
                        </label>

                        <select id="priority" name="priority" required>

                            <option value="low"
                                {{ old('priority', 'medium') == 'low' ? 'selected' : '' }}>
                                Low
                            </option>

                            <option value="medium"
                                {{ old('priority', 'medium') == 'medium' ? 'selected' : '' }}>
                                Medium
                            </option>

                            <option value="high"
                                {{ old('priority', 'medium') == 'high' ? 'selected' : '' }}>
                                High
                            </option>

                        </select>

                        @error('priority')
                            <div class="error-message">{{ $message }}</div>
                        @enderror

                    </div>


                    <!-- STAFF ASSIGNMENT -->
                    <div class="form-group">

                        <label for="assigned_users">
                            Assign Staff Members
                        </label>

                        <select
                            id="assigned_users"
                            name="assigned_users[]"
                            multiple
                            size="5"
                        >

                            @forelse ($staff as $member)

                                <option
                                    value="{{ $member->id }}"
                                    {{ in_array($member->id, old('assigned_users', [])) ? 'selected' : '' }}
                                >
                                    {{ $member->name }} ({{ $member->email }})
                                </option>

                            @empty

                                <option disabled>
                                    No active staff members available
                                </option>

                            @endforelse

                        </select>

                        <p class="hint">
                            Hold Ctrl (Windows) or Command (Mac) to select multiple staff members.
                        </p>

                        @error('assigned_users')
                            <div class="error-message">{{ $message }}</div>
                        @enderror

                        @error('assigned_users.*')
                            <div class="error-message">{{ $message }}</div>
                        @enderror

                    </div>


                    <!-- ACTION BUTTONS -->
                    <div class="form-actions">

                        <button type="submit" class="btn btn-primary">
                            Create Activity
                        </button>

                        <a href="{{ route('admin.activities.index') }}"
                           class="btn btn-secondary">
                            Cancel
                        </a>

                    </div>

                </form>

            </div>

        </section>

    </main>

</body>
</html>
