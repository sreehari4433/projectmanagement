<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Project Management Tool</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="d-flex flex-column min-vh-100">
    <header class="bg-dark text-white py-3">
        <div class="container text-center">
            <h1>Project Management Tool</h1>
        </div>
    </header>

    <main class="flex-grow-1 d-flex align-items-center justify-content-center">
        <div class="text-center">
            @if (Route::has('login'))
                <div class="mb-3">
                    @auth
                        <a href="{{ route('dashboard') }}" class="btn btn-primary">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-success">Log in</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="btn btn-warning">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
        </div>
    </main>

    <footer class="bg-dark text-white text-center py-3">
        <p>&copy; {{ date('Y') }} Project Management Tool. All rights reserved.</p>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
