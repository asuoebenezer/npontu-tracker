
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login | Npontu Tracker</title>

    <link rel="icon"
          type="image/svg+xml"
          href="{{ asset('favicon.svg') }}?v=1">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            min-height: 100vh;
            background: #f1f5f9;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 25px;
            color: #1e293b;
        }

        .login-wrapper {
            width: 100%;
            max-width: 1000px;
            min-height: 570px;
            display: grid;
            grid-template-columns: 1fr 1fr;
            background: white;
            border-radius: 14px;
            overflow: hidden;
            box-shadow: 0 10px 35px rgba(15, 23, 42, 0.10);
        }

        /* Left branding section */

        .branding {
            background: #0f172a;
            color: white;
            padding: 55px 45px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .logo {
            font-size: 25px;
            font-weight: bold;
        }

        .logo span {
            color: #38bdf8;
        }

        .branding-content {
            margin-top: 50px;
            margin-bottom: 50px;
        }

        .branding-content h1 {
            font-size: 36px;
            line-height: 1.3;
            margin-bottom: 18px;
        }

        .branding-content p {
            color: #cbd5e1;
            line-height: 1.8;
            font-size: 15px;
        }

        .branding-footer {
            color: #94a3b8;
            font-size: 13px;
        }

        .brand-line {
            width: 55px;
            height: 4px;
            background: #38bdf8;
            border-radius: 5px;
            margin-bottom: 25px;
        }

        /* Login section */

        .login-section {
            padding: 55px 45px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .login-header {
            margin-bottom: 32px;
        }

        .login-header h2 {
            font-size: 27px;
            margin-bottom: 10px;
            color: #0f172a;
        }

        .login-header p {
            color: #64748b;
            font-size: 14px;
            line-height: 1.6;
        }

        .form-group {
            margin-bottom: 22px;
        }

        label {
            display: block;
            font-size: 14px;
            font-weight: bold;
            margin-bottom: 9px;
            color: #334155;
        }

        .input-wrapper {
            position: relative;
        }

        input {
            width: 100%;
            padding: 14px 15px;
            border: 1px solid #cbd5e1;
            border-radius: 7px;
            outline: none;
            font-size: 14px;
            color: #1e293b;
            background: #fff;
            transition: 0.2s;
        }

        input:focus {
            border-color: #2563eb;
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.10);
        }

        input::placeholder {
            color: #94a3b8;
        }

        .password-input {
            padding-right: 50px;
        }

        .toggle-password {
            position: absolute;
            right: 14px;
            top: 50%;
            transform: translateY(-50%);
            border: none;
            background: transparent;
            color: #64748b;
            cursor: pointer;
            font-size: 13px;
        }

        .error-box {
            background: #fee2e2;
            color: #991b1b;
            padding: 13px 15px;
            border-radius: 7px;
            margin-bottom: 22px;
            font-size: 13px;
            line-height: 1.6;
        }

        .error-box ul {
            padding-left: 18px;
        }

        .login-button {
            width: 100%;
            padding: 15px;
            background: #2563eb;
            color: white;
            border: none;
            border-radius: 7px;
            font-size: 15px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.2s;
        }

        .login-button:hover {
            background: #1d4ed8;
        }

        .login-footer {
            margin-top: 30px;
            text-align: center;
            font-size: 12px;
            color: #94a3b8;
            line-height: 1.6;
        }

        .security-note {
            margin-top: 20px;
            padding: 13px;
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 7px;
            color: #64748b;
            font-size: 12px;
            text-align: center;
        }

        /* Responsive design */

        @media (max-width: 750px) {
            .login-wrapper {
                grid-template-columns: 1fr;
                max-width: 480px;
            }

            .branding {
                padding: 30px;
            }

            .branding-content {
                margin: 35px 0;
            }

            .branding-content h1 {
                font-size: 27px;
            }

            .branding-footer {
                display: none;
            }

            .login-section {
                padding: 35px 28px;
            }
        }

        @media (max-width: 400px) {
            body {
                padding: 12px;
            }

            .login-section {
                padding: 30px 20px;
            }
        }
    </style>
</head>

<body>

<div class="login-wrapper">

    <!-- Branding Section -->

    <div class="branding">

        <div class="logo">
            Npontu <span>Tracker</span>
        </div>

        <div class="branding-content">

            <div class="brand-line"></div>

            <h1>
                Manage your team's activities with confidence.
            </h1>

            <p>
                A centralized platform for managing support
                activities, assigning responsibilities, monitoring
                staff progress and generating reports.
            </p>

        </div>

        <div class="branding-footer">
            © {{ date('Y') }} Npontu Tracker.
            Applications Support Team.
        </div>

    </div>


    <!-- Login Form Section -->

    <div class="login-section">

        <div class="login-header">

            <h2>Welcome Back</h2>

            <p>
                Sign in to your account to continue to your workspace.
            </p>

        </div>


        <!-- Validation Errors -->

        @if ($errors->any())

            <div class="error-box">

                <strong>Login unsuccessful.</strong>

                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>

            </div>

        @endif


        <!-- Login Form -->

        <form action="{{ route('login') }}" method="POST">

            @csrf

            <div class="form-group">

                <label for="email">Email Address</label>

                <input
                    type="email"
                    name="email"
                    id="email"
                    placeholder="Enter your email address"
                    value="{{ old('email') }}"
                    autocomplete="username"
                    required
                    autofocus
                >

            </div>


            <div class="form-group">

                <label for="password">Password</label>

                <div class="input-wrapper">

                    <input
                        type="password"
                        name="password"
                        id="password"
                        class="password-input"
                        placeholder="Enter your password"
                        autocomplete="current-password"
                        required
                    >

                    <button
                        type="button"
                        class="toggle-password"
                        onclick="togglePassword()"
                        id="toggleButton"
                    >
                        Show
                    </button>

                </div>

            </div>


            <button type="submit" class="login-button">
                Sign In to Dashboard
            </button>

        </form>


        <div class="security-note">
            <strong>Secure Access</strong><br>
            Your account permissions determine the workspace
            you can access.
        </div>


        <div class="login-footer">
            Npontu Tracker | Applications Support Team
        </div>

    </div>

</div>


<script>

    function togglePassword() {

        const password = document.getElementById('password');
        const button = document.getElementById('toggleButton');

        if (password.type === 'password') {

            password.type = 'text';
            button.textContent = 'Hide';

        } else {

            password.type = 'password';
            button.textContent = 'Show';

        }

    }

</script>

</body>
</html>
