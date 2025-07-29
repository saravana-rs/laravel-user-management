<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'User-Managementsys')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('css/app.css?v=1.7') }}">
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