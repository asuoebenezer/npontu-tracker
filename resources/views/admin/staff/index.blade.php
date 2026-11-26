
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Manage Staff | Npontu Tracker</title>

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
            gap: 15px;
            margin-bottom: 30px;
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

        /* Summary Cards */
        .summary-cards {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            margin-bottom: 25px;
        }

        .summary-card {
            background: white;
            padding: 22px;
            border-radius: 10px;
            border: 1px solid #e2e8f0;
            border-top: 4px solid #2563eb;
        }

        .summary-card:nth-child(2) {
            border-top-color: #16a34a;
        }

        .summary-card:nth-child(3) {
            border-top-color: #d97706;
        }

        .summary-card p {
            color: #64748b;
            margin-bottom: 12px;
            font-size: 14px;
        }

        .summary-card h2 {
            font-size: 28px;
        }

        /* General Cards */
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

        /* Form */
        .form-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
        }

        .form-group label {
            display: block;
            font-size: 14px;
            font-weight: bold;
            margin-bottom: 9px;
        }

        .form-group input {
            width: 100%;
            padding: 13px;
            border: 1px solid #cbd5e1;
            border-radius: 7px;
            font-size: 14px;
        }

        .form-group input:focus {
            outline: none;
            border-color: #2563eb;
        }

        .form-note {
            font-size: 12px;
            color: #64748b;
            margin-top: 7px;
        }

        /* Buttons */
        .btn {
            display: inline-block;
            padding: 11px 17px;
            border: none;
            border-radius: 7px;
            font-size: 14px;
            font-weight: bold;
            cursor: pointer;
            text-decoration: none;
            text-align: center;
        }

        .btn-primary {
            background: #2563eb;
            color: white;
        }

        .btn-primary:hover {
            background: #1d4ed8;
        }

        .btn-green {
            background: #16a34a;
            color: white;
        }

        .btn-orange {
            background: #d97706;
            color: white;
        }

        .btn-red {
            background: #dc2626;
            color: white;
        }

        .btn-green:hover,
        .btn-orange:hover,
        .btn-red:hover {
            opacity: 0.88;
        }

        .form-submit {
            margin-top: 22px;
        }

        /* Messages */
        .success {
            background: #dcfce7;
            color: #166534;
            padding: 14px;
            border-radius: 7px;
            margin-bottom: 20px;
        }

        .error-box {
            background: #fee2e2;
            color: #991b1b;
            padding: 14px 18px;
            border-radius: 7px;
            margin-bottom: 20px;
        }

        .error-box ul {
            padding-left: 20px;
            margin-top: 8px;
        }

        /* Table */
        .table-wrapper {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 750px;
        }

        th, td {
            padding: 16px;
            text-align: left;
            border-bottom: 1px solid #e2e8f0;
            font-size: 14px;
        }

        th {
            background: #f8fafc;
            color: #64748b;
            white-space: nowrap;
        }

        tbody tr:hover {
            background: #f8fafc;
        }

        .status {
            display: inline-block;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: bold;
        }

        .active-status {
            background: #dcfce7;
            color: #166534;
        }

        .inactive-status {
            background: #fee2e2;
            color: #991b1b;
        }

        .actions {
            display: flex;
            gap: 8px;
            flex-wrap: wrap;
        }

        .actions form {
            margin: 0;
        }

        .empty {
            text-align: center;
            color: #64748b;
            padding: 30px;
        }

        .footer {
            text-align: center;
            color: #94a3b8;
            padding: 20px;
            font-size: 13px;
        }

        /* Responsive */
        @media (max-width: 1000px) {
            .summary-cards {
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
                flex-direction: column;
                align-items: flex-start;
            }

            .summary-cards,
            .form-grid {
                grid-template-columns: 1fr;
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

    <a href="{{ route('admin.activities.history') }}">
        Daily History & Reports
    </a>

    <a href="{{ route('admin.staff.index') }}" class="active">
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
            <h1>Staff Management</h1>
            <p>Register and manage Npontu Tracker support personnel.</p>
        </div>

        <div class="user-info">
            Logged in as:
            <strong>{{ auth()->user()->name }}</strong>
        </div>

    </div>


    <!-- Success Message -->
    @if(session('success'))
        <div class="success">
            {{ session('success') }}
        </div>
    @endif


    <!-- Validation Errors -->
    @if($errors->any())
        <div class="error-box">
            <strong>Please correct the following errors:</strong>

            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <!-- Summary Cards -->
    <div class="summary-cards">

        <div class="summary-card">
            <p>Total Staff Members</p>
            <h2>{{ $staff->count() }}</h2>
        </div>

        <div class="summary-card">
            <p>Active Staff</p>
            <h2>{{ $staff->where('is_active', true)->count() }}</h2>
        </div>

        <div class="summary-card">
            <p>Inactive Staff</p>
            <h2>{{ $staff->where('is_active', false)->count() }}</h2>
        </div>

    </div>


    <!-- Register Staff -->
    <div class="card">

        <div class="card-header">
            <h3>Register New Staff</h3>
            <p>Create an account for a new support team member.</p>
        </div>

        <div class="card-body">

            <form
                action="{{ route('admin.staff.store') }}"
                method="POST"
            >

                @csrf

                <div class="form-grid">

                    <div class="form-group">

                        <label for="name">Staff Full Name *</label>

                        <input
                            type="text"
                            id="name"
                            name="name"
                            value="{{ old('name') }}"
                            placeholder="Enter staff full name"
                            maxlength="255"
                            required
                        >

                    </div>


                    <div class="form-group">

                        <label for="email">Email Address *</label>

                        <input
                            type="email"
                            id="email"
                            name="email"
                            value="{{ old('email') }}"
                            placeholder="Enter staff email address"
                            required
                        >

                    </div>


                    <div class="form-group">

                        <label for="password">Temporary Password *</label>

                        <input
                            type="password"
                            id="password"
                            name="password"
                            placeholder="Enter temporary password"
                            minlength="8"
                            required
                        >

                        <p class="form-note">
                            Minimum 8 characters.
                        </p>

                    </div>

                </div>


                <div class="form-submit">

                    <button type="submit" class="btn btn-primary">
                        + Register Staff
                    </button>

                </div>

            </form>

        </div>

    </div>


    <!-- Registered Staff -->
    <div class="card">

        <div class="card-header">

            <h3>Registered Staff Members</h3>

            <p>
                View staff accounts and manage their access to the system.
            </p>

        </div>

        <div class="card-body">

            <div class="table-wrapper">

                <table>

                    <thead>

                        <tr>
                            <th>#</th>
                            <th>Staff Name</th>
                            <th>Email Address</th>
                            <th>Role</th>
                            <th>Account Status</th>
                            <th>Actions</th>
                        </tr>

                    </thead>

                    <tbody>

                        @forelse($staff as $member)

                            <tr>

                                <td>{{ $loop->iteration }}</td>

                                <td>
                                    <strong>{{ $member->name }}</strong>
                                </td>

                                <td>{{ $member->email }}</td>

                                <td>
                                    {{ ucfirst($member->role) }}
                                </td>

                                <td>

                                    @if($member->is_active)

                                        <span class="status active-status">
                                            Active
                                        </span>

                                    @else

                                        <span class="status inactive-status">
                                            Inactive
                                        </span>

                                    @endif

                                </td>

                                <td>

                                    <div class="actions">

                                        <!-- Activate / Deactivate -->
                                        <form
                                            action="{{ route('admin.staff.toggleStatus', $member->id) }}"
                                            method="POST"
                                        >

                                            @csrf
                                            @method('PATCH')

                                            @if($member->is_active)

                                                <button
                                                    type="submit"
                                                    class="btn btn-orange"
                                                    onclick="return confirm('Deactivate this staff account?')"
                                                >
                                                    Deactivate
                                                </button>

                                            @else

                                                <button
                                                    type="submit"
                                                    class="btn btn-green"
                                                    onclick="return confirm('Activate this staff account?')"
                                                >
                                                    Activate
                                                </button>

                                            @endif

                                        </form>


                                        <!-- Delete Staff -->
                                        <form
                                            action="{{ route('admin.staff.destroy', $member->id) }}"
                                            method="POST"
                                            onsubmit="return confirm('Permanently delete this staff account? This may also delete the staff member’s submitted activity history. Consider deactivating the account instead.')"
                                        >

                                            @csrf
                                            @method('DELETE')

                                            <button
                                                type="submit"
                                                class="btn btn-red"
                                            >
                                                Delete
                                            </button>

                                        </form>

                                    </div>

                                </td>

                            </tr>

                        @empty

                            <tr>
                                <td colspan="6" class="empty">
                                    No staff members registered yet.
                                </td>
                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>


    <div class="footer">
        Npontu Tracker | Applications Support Team
    </div>

</main>

</body>
</html>
