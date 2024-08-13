<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
<header class="bg-primary text-white p-3">
        <div class="container d-flex justify-content-between align-items-center">
            <a href="dashboard"><img src="LOGO" alt="Logo" style="height: 50px;"></a>
            <form class="form-inline">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button>
            </form>
            <nav>
                <a href="{{asset('dashboard')}}" class="text-white mx-2">Dashboard</a>
                <a href="{{ route('users.create.form') }}" class="text-white mx-2">Create User</a>
                <a href="{{ route('aboutus') }}" class="text-white mx-2">About Us</a>
                <a href="{{ route('events') }}" class="text-white mx-2">Events</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
                <a href="{{ route('logout') }}" class="text-white mx-2"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Logout
                </a>
            </nav>
        </div>
    </header>

        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <footer class="bg-dark text-white text-center p-3">
        &copy; 2024 Desined by Luis Filipe Gomes ©. All rights reserved.
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
