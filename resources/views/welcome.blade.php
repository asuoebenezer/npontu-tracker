
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ config('app.name', 'Npontu Tracker') }}</title>

    <meta name="description" content="Npontu Tracker helps organizations manage, monitor and track activities efficiently.">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --primary: #2563eb;
            --primary-dark: #1d4ed8;
            --dark: #0f172a;
            --text: #334155;
            --muted: #64748b;
            --light: #f8fafc;
            --border: #e2e8f0;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: #ffffff;
            color: var(--dark);
            line-height: 1.6;
        }

        a {
            text-decoration: none;
        }

        .container {
            width: 90%;
            max-width: 1200px;
            margin: auto;
        }

        /* NAVIGATION */

        .navbar {
            width: 100%;
            background: #ffffff;
            border-bottom: 1px solid var(--border);
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .nav-content {
            min-height: 76px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 11px;
            color: var(--dark);
            font-size: 21px;
            font-weight: 800;
            letter-spacing: -0.7px;
        }

        .brand-icon {
            width: 42px;
            height: 42px;
            background: var(--primary);
            color: white;
            border-radius: 12px;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 22px;
            font-weight: 800;
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 30px;
        }

        .nav-links a {
            color: var(--text);
            font-size: 14px;
            font-weight: 600;
            transition: 0.2s;
        }

        .nav-links a:hover {
            color: var(--primary);
        }

        .nav-actions {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 11px 20px;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 600;
            transition: 0.2s;
            cursor: pointer;
        }

        .btn-outline {
            color: var(--primary);
            border: 1px solid var(--primary);
            background: white;
        }

        .btn-outline:hover {
            background: #eff6ff;
        }

        .btn-primary {
            background: var(--primary);
            color: white;
            border: 1px solid var(--primary);
        }

        .btn-primary:hover {
            background: var(--primary-dark);
            border-color: var(--primary-dark);
        }

        /* HERO */

        .hero {
            background: linear-gradient(135deg, #eff6ff 0%, #ffffff 55%, #f0f9ff 100%);
            padding: 105px 0 95px;
            overflow: hidden;
        }

        .hero-content {
            display: grid;
            grid-template-columns: 1.1fr 0.9fr;
            align-items: center;
            gap: 65px;
        }

        .hero-label {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 7px 13px;
            background: #dbeafe;
            color: #1d4ed8;
            border-radius: 30px;
            font-size: 12px;
            font-weight: 700;
            margin-bottom: 23px;
        }

        .hero-label span {
            width: 7px;
            height: 7px;
            background: #2563eb;
            border-radius: 50%;
        }

        .hero h1 {
            font-size: clamp(38px, 5vw, 58px);
            line-height: 1.13;
            letter-spacing: -2.5px;
            font-weight: 800;
            margin-bottom: 22px;
            color: var(--dark);
        }

        .hero h1 span {
            color: var(--primary);
        }

        .hero-description {
            color: var(--muted);
            font-size: 16px;
            max-width: 560px;
            line-height: 1.9;
            margin-bottom: 30px;
        }

        .hero-buttons {
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            gap: 13px;
        }

        .hero-buttons .btn {
            padding: 14px 23px;
        }

        .hero-note {
            margin-top: 24px;
            color: var(--muted);
            font-size: 12px;
        }

        /* DASHBOARD PREVIEW */

        .dashboard-preview {
            background: white;
            border: 1px solid var(--border);
            border-radius: 18px;
            padding: 25px;
            box-shadow: 0 25px 60px rgba(15, 23, 42, 0.10);
            transform: rotate(1deg);
        }

        .preview-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        .preview-title {
            font-size: 15px;
            font-weight: 800;
        }

        .preview-status {
            background: #dcfce7;
            color: #15803d;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 10px;
            font-weight: 700;
        }

        .preview-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 13px;
            margin-bottom: 22px;
        }

        .preview-card {
            padding: 17px;
            border: 1px solid var(--border);
            border-radius: 11px;
        }

        .preview-card small {
            display: block;
            color: var(--muted);
            font-size: 11px;
            margin-bottom: 8px;
        }

        .preview-card strong {
            display: block;
            font-size: 25px;
            color: var(--dark);
        }

        .preview-card .blue {
            color: var(--primary);
        }

        .preview-card .green {
            color: #16a34a;
        }

        .preview-card .orange {
            color: #ea580c;
        }

        .activity-heading {
            font-size: 13px;
            font-weight: 700;
            margin-bottom: 13px;
        }

        .activity-item {
            display: flex;
            align-items: center;
            gap: 11px;
            padding: 12px 0;
            border-top: 1px solid #f1f5f9;
        }

        .activity-dot {
            width: 9px;
            height: 9px;
            border-radius: 50%;
            background: var(--primary);
        }

        .activity-dot.green {
            background: #16a34a;
        }

        .activity-dot.orange {
            background: #ea580c;
        }

        .activity-text {
            flex: 1;
        }

        .activity-text strong {
            display: block;
            font-size: 11px;
        }

        .activity-text small {
            display: block;
            color: var(--muted);
            font-size: 10px;
        }

        /* FEATURES */

        .features {
            padding: 90px 0;
            background: white;
        }

        .section-heading {
            text-align: center;
            max-width: 650px;
            margin: 0 auto 50px;
        }

        .section-label {
            color: var(--primary);
            text-transform: uppercase;
            font-size: 12px;
            font-weight: 800;
            letter-spacing: 1.5px;
            margin-bottom: 12px;
        }

        .section-heading h2 {
            font-size: 34px;
            letter-spacing: -1px;
            margin-bottom: 13px;
        }

        .section-heading p {
            color: var(--muted);
            font-size: 14px;
        }

        .feature-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 22px;
        }

        .feature-card {
            padding: 30px;
            border: 1px solid var(--border);
            border-radius: 13px;
            transition: 0.25s;
            background: white;
        }

        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(15, 23, 42, 0.07);
            border-color: #bfdbfe;
        }

        .feature-icon {
            width: 50px;
            height: 50px;
            border-radius: 12px;
            background: #eff6ff;
            color: var(--primary);
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 23px;
            margin-bottom: 20px;
        }

        .feature-card h3 {
            font-size: 17px;
            margin-bottom: 10px;
        }

        .feature-card p {
            color: var(--muted);
            font-size: 13px;
            line-height: 1.8;
        }

        /* CTA */

        .cta {
            padding: 75px 0;
            background: var(--dark);
            color: white;
            text-align: center;
        }

        .cta h2 {
            font-size: 34px;
            margin-bottom: 15px;
        }

        .cta p {
            color: #cbd5e1;
            font-size: 14px;
            margin-bottom: 28px;
        }

        .cta .btn {
            background: var(--primary);
            color: white;
            padding: 14px 26px;
        }

        .cta .btn:hover {
            background: var(--primary-dark);
        }

        /* FOOTER */

        footer {
            padding: 25px 0;
            background: #ffffff;
            border-top: 1px solid var(--border);
        }

        .footer-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            flex-wrap: wrap;
        }

        .footer-content p {
            color: var(--muted);
            font-size: 12px;
        }

        .footer-brand {
            color: var(--dark);
            font-size: 14px;
            font-weight: 800;
        }

        /* RESPONSIVE */

        @media (max-width: 900px) {
            .hero-content {
                grid-template-columns: 1fr;
                gap: 50px;
            }

            .hero {
                padding: 75px 0;
            }

            .dashboard-preview {
                max-width: 600px;
                width: 100%;
                margin: auto;
                transform: none;
            }

            .feature-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .nav-links {
                display: none;
            }
        }

        @media (max-width: 600px) {
            .container {
                width: 92%;
            }

            .nav-content {
                min-height: 68px;
            }

            .brand {
                font-size: 17px;
            }

            .brand-icon {
                width: 36px;
                height: 36px;
                font-size: 18px;
            }

            .nav-actions {
                gap: 7px;
            }

            .nav-actions .btn {
                padding: 9px 11px;
                font-size: 12px;
            }

            .hero {
                padding: 65px 0;
            }

            .hero h1 {
                font-size: 39px;
                letter-spacing: -1.5px;
            }

            .hero-description {
                font-size: 14px;
            }

            .hero-buttons {
                align-items: stretch;
                flex-direction: column;
            }

            .hero-buttons .btn {
                width: 100%;
            }

            .dashboard-preview {
                padding: 17px;
            }

            .preview-card {
                padding: 12px;
            }

            .preview-card strong {
                font-size: 21px;
            }

            .features {
                padding: 65px 0;
            }

            .section-heading h2,
            .cta h2 {
                font-size: 27px;
            }

            .feature-grid {
                grid-template-columns: 1fr;
            }

            .feature-card {
                padding: 24px;
            }

            .footer-content {
                flex-direction: column;
                text-align: center;
            }
        }
    </style>
</head>

<body>

    <!-- NAVIGATION -->
    <header class="navbar">
        <div class="container nav-content">

            <a href="{{ url('/') }}" class="brand">
                <span class="brand-icon">N</span>
                <span>Npontu Tracker</span>
            </a>

            <nav class="nav-links">
                <a href="#home">Home</a>
                <a href="#features">Features</a>
                <a href="#about">About</a>
            </nav>

            <div class="nav-actions">
                @auth
                    <a href="{{ url('/dashboard') }}" class="btn btn-primary">
                        Go to Dashboard
                    </a>
                @else
                    @if (Route::has('login'))
                        <a href="{{ route('login') }}" class="btn btn-outline">
                            Login
                        </a>
                    @endif

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="btn btn-primary">
                            Get Started
                        </a>
                    @endif
                @endauth
            </div>

        </div>
    </header>

    <!-- HERO SECTION -->
    <section class="hero" id="home">
        <div class="container hero-content">

            <div class="hero-text">

                <div class="hero-label">
                    <span></span>
                    Activity Management Platform
                </div>

                <h1>
                    Manage Your Activities.
                    <span>Track Your Progress.</span>
                </h1>

                <p class="hero-description">
                    Npontu Tracker provides a centralized platform for
                    recording, monitoring and managing organizational
                    activities. Keep track of updates, improve visibility
                    and make informed decisions with ease.
                </p>

                <div class="hero-buttons">

                    @auth
                        <a href="{{ url('/dashboard') }}" class="btn btn-primary">
                            Open Dashboard &rarr;
                        </a>
                    @else
                        @if (Route::has('login'))
                            <a href="{{ route('login') }}" class="btn btn-primary">
                                Access Your Account &rarr;
                            </a>
                        @endif

                        <a href="#features" class="btn btn-outline">
                            Explore Features
                        </a>
                    @endauth

                </div>

                <p class="hero-note">
                    A smarter way to organize activities and monitor progress.
                </p>

            </div>

            <!-- DASHBOARD PREVIEW -->
            <div class="dashboard-preview">

                <div class="preview-header">
                    <div class="preview-title">
                        Activity Overview
                    </div>

                    <span class="preview-status">
                        Tracking Active
                    </span>
                </div>

                <div class="preview-grid">

                    <div class="preview-card">
                        <small>Total Activities</small>
                        <strong class="blue">128</strong>
                    </div>

                    <div class="preview-card">
                        <small>Completed</small>
                        <strong class="green">86</strong>
                    </div>

                    <div class="preview-card">
                        <small>In Progress</small>
                        <strong class="orange">32</strong>
                    </div>

                    <div class="preview-card">
                        <small>Pending</small>
                        <strong>10</strong>
                    </div>

                </div>

                <div class="activity-heading">
                    Recent Activity Updates
                </div>

                <div class="activity-item">
                    <span class="activity-dot green"></span>

                    <div class="activity-text">
                        <strong>Activity completed</strong>
                        <small>Progress successfully recorded</small>
                    </div>
                </div>

                <div class="activity-item">
                    <span class="activity-dot"></span>

                    <div class="activity-text">
                        <strong>New activity update</strong>
                        <small>Activity information updated</small>
                    </div>
                </div>

                <div class="activity-item">
                    <span class="activity-dot orange"></span>

                    <div class="activity-text">
                        <strong>Pending activity</strong>
                        <small>Awaiting further updates</small>
                    </div>
                </div>

            </div>

        </div>
    </section>

    <!-- FEATURES SECTION -->
    <section class="features" id="features">

        <div class="container">

            <div class="section-heading">

                <div class="section-label">
                    Platform Features
                </div>

                <h2>Everything You Need to Track Activities</h2>

                <p>
                    Npontu Tracker helps simplify activity management
                    through organized records, progress monitoring
                    and accessible activity information.
                </p>

            </div>

            <div class="feature-grid">

                <div class="feature-card">

                    <div class="feature-icon">📋</div>

                    <h3>Activity Management</h3>

                    <p>
                        Record and manage organizational activities
                        from one centralized platform.
                    </p>

                </div>

                <div class="feature-card">

                    <div class="feature-icon">📊</div>

                    <h3>Progress Monitoring</h3>

                    <p>
                        Monitor activity progress and maintain
                        visibility into ongoing work.
                    </p>

                </div>

                <div class="feature-card">

                    <div class="feature-icon">🔄</div>

                    <h3>Activity Updates</h3>

                    <p>
                        Record updates and maintain a history of
                        changes made to activities.
                    </p>

                </div>

                <div class="feature-card">

                    <div class="feature-icon">🔐</div>

                    <h3>Secure Access</h3>

                    <p>
                        Access the platform through its authentication
                        system and authorized user accounts.
                    </p>

                </div>

                <div class="feature-card">

                    <div class="feature-icon">📁</div>

                    <h3>Organized Records</h3>

                    <p>
                        Keep activity information structured and
                        accessible when it is needed.
                    </p>

                </div>

                <div class="feature-card">

                    <div class="feature-icon">📈</div>

                    <h3>Better Visibility</h3>

                    <p>
                        Make it easier to understand activity status
                        and identify work requiring attention.
                    </p>

                </div>

            </div>

        </div>

    </section>

    <!-- ABOUT / CTA -->
    <section class="cta" id="about">

        <div class="container">

            <h2>Take Control of Your Activities</h2>

            <p>
                Stay organized, monitor progress and manage your
                activities more efficiently with Npontu Tracker.
            </p>

            @auth
                <a href="{{ url('/dashboard') }}" class="btn">
                    Go to Dashboard &rarr;
                </a>
            @else
                @if (Route::has('login'))
                    <a href="{{ route('login') }}" class="btn">
                        Login to Continue &rarr;
                    </a>
                @endif
            @endauth

        </div>

    </section>

    <!-- FOOTER -->
    <footer>
        <div class="container footer-content">

            <div class="footer-brand">
                Npontu Tracker
            </div>

            <p>
                &copy; {{ date('Y') }} Npontu Tracker.
                All rights reserved.
            </p>

            <p>
                Activity Management Platform
            </p>

        </div>
    </footer>

</body>
</html>
