<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'User-Managementsys')</title>
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <style>
        :root {
            --primary-color: #4e73df;
            --secondary-color: #f8f9fc;
            --accent-color: #2e59d9;
            --text-color: #5a5c69;
            --light-gray: #eaecf4;
            --danger-color: #e74a3b;
            --success-color: #1cc88a;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            background-color: var(--secondary-color);
            color: var(--text-color);
            font-family: 'Nunito', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 
                        'Helvetica Neue', Arial, sans-serif;
            line-height: 1.6;
        }
        
        /* Header Styles */
        header {
            background-color: white;
            box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.15);
            padding: 1rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: sticky;
            top: 0;
            z-index: 100;
        }
        
        .app-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--primary-color);
        }
        
        .auth-links {
            display: flex;
            gap: 1.5rem;
            align-items: center;
        }
        
        .auth-links a {
            color: var(--text-color);
            text-decoration: none;
            font-weight: 600;
            transition: color 0.3s;
        }
        
        .auth-links a:hover {
            color: var(--primary-color);
        }
        
        .logout-btn {
            background: none;
            border: none;
            color: var(--text-color);
            font-weight: 600;
            cursor: pointer;
            font-family: inherit;
            font-size: inherit;
            padding: 0;
        }
        
        .logout-btn:hover {
            color: var(--danger-color);
        }
        
        /* Main Content Container */
        .container {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 0 1.5rem;
        }
        
        /* Card Styles */
        .card {
            background-color: white;
            border-radius: 0.35rem;
            box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.1);
            margin-bottom: 2rem;
            border: none;
        }
        
        .card-header {
            background-color: var(--primary-color);
            color: white;
            padding: 1rem 1.35rem;
            border-bottom: 1px solid rgba(0, 0, 0, 0.125);
            border-radius: 0.35rem 0.35rem 0 0 !important;
        }
        
        .card-header h4 {
            margin-bottom: 0;
            font-weight: 700;
        }
        
        .card-body {
            padding: 2rem;
        }
        
        /* Form Styles */
        .form-label {
            font-weight: 600;
            margin-bottom: 0.5rem;
            display: block;
        }
        
        .form-control {
            display: block;
            width: 100%;
            padding: 0.75rem 1rem;
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
            color: #6e707e;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid #d1d3e2;
            border-radius: 0.35rem;
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }
        
        .form-control:focus {
            color: #6e707e;
            background-color: #fff;
            border-color: #bac8f3;
            outline: 0;
            box-shadow: 0 0 0 0.2rem rgba(78, 115, 223, 0.25);
        }
        
        .form-select {
            display: block;
            width: 100%;
            padding: 0.75rem 2.5rem 0.75rem 1rem;
            -moz-padding-start: calc(1rem - 3px);
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
            color: #6e707e;
            background-color: #fff;
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'%3e%3cpath fill='none' stroke='%23d1d3e2' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M2 5l6 6 6-6'/%3e%3c/svg%3e");
            background-repeat: no-repeat;
            background-position: right 1rem center;
            background-size: 16px 12px;
            border: 1px solid #d1d3e2;
            border-radius: 0.35rem;
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
        }
        
        /* Button Styles */
        .btn {
            display: inline-block;
            font-weight: 400;
            text-align: center;
            white-space: nowrap;
            vertical-align: middle;
            user-select: none;
            border: 1px solid transparent;
            padding: 0.75rem 1.5rem;
            font-size: 1rem;
            line-height: 1.5;
            border-radius: 0.35rem;
            transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, 
                        border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }
        
        .btn-primary {
            color: #fff;
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }
        
        .btn-primary:hover {
            color: #fff;
            background-color: var(--accent-color);
            border-color: var(--accent-color);
        }
        
        .btn-outline-secondary {
            color: #858796;
            background-color: transparent;
            background-image: none;
            border-color: #d1d3e2;
        }
        
        .btn-outline-secondary:hover {
            color: #fff;
            background-color: #6c757d;
            border-color: #6c757d;
        }
        
        /* Form Sections */
        .section-title {
            border-bottom: 1px solid #e3e6f0;
            padding-bottom: 0.5rem;
            margin-bottom: 1.5rem;
            font-weight: 600;
            color: var(--primary-color);
        }
        
        /* Alert Messages */
        .alert {
            position: relative;
            padding: 1rem 1.25rem;
            margin-bottom: 1rem;
            border: 1px solid transparent;
            border-radius: 0.35rem;
        }
        
        .alert-success {
            color: #1a472a;
            background-color: #d1fae5;
            border-color: #b8f1d1;
        }
        
        /* Form Validation */
        .is-invalid {
            border-color: var(--danger-color) !important;
        }
        
        .invalid-feedback {
            width: 100%;
            margin-top: 0.25rem;
            font-size: 0.875em;
            color: var(--danger-color);
        }
        
        /* Form Switch */
        .form-switch .form-check-input {
            width: 2.5em;
            margin-left: -2.5em;
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='-4 -4 8 8'%3e%3ccircle r='3' fill='%23d1d3e2'/%3e%3c/svg%3e");
            background-position: left center;
            border-radius: 2em;
            transition: background-position 0.15s ease-in-out;
        }
        
        .form-switch .form-check-input:checked {
            background-position: right center;
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='-4 -4 8 8'%3e%3ccircle r='3' fill='%23fff'/%3e%3c/svg%3e");
        }
        
        /* Responsive Adjustments */
        @media (max-width: 768px) {
            header {
                flex-direction: column;
                padding: 1rem;
                gap: 1rem;
            }
            
            .auth-links {
                gap: 1rem;
            }
            
            .card-body {
                padding: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <header>
        <div class="app-title">
            <i class="bi bi-box-seam"></i> My Laravel App
        </div>
        <div class="auth-links">
            @auth
                <a href="{{ route('dashboard') }}"><i class="bi bi-speedometer2"></i> Dashboard</a>
          @if(auth()->user()->role !== 'admin')
    <a href="{{ route('profile.edit') }}">
        <i class="bi bi-person-circle"></i> Profile
    </a>
@endif

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="logout-btn">
                        <i class="bi bi-box-arrow-right"></i> Logout
                    </button>
                </form>
            @else
                <a href="{{ route('login') }}"><i class="bi bi-box-arrow-in-right"></i> Login</a>
                <a href="{{ route('register') }}"><i class="bi bi-person-plus"></i> Register</a>
            @endauth
        </div>
    </header>

    <div class="container">
        @yield('content')
    </div>

    <!-- Success Message Flash -->
    @if(session('success'))
        <div class="container">
            <div class="alert alert-success">
                <i class="bi bi-check-circle-fill"></i> {{ session('success') }}
            </div>
        </div>
    @endif
</body>
</html>