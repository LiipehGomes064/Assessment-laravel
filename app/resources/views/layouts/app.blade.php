<!doctype html>
<html lang="EN">
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
<body class="d-flex flex-column min-vh-100">
    <header class="bg-primary text-white p-3">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light d-flex justify-content-between">
                <a class="navbar-brand" href="{{ route('dashboard') }}">
                    <img src="{{ asset('logo.png') }}" alt="Logo" style="height: 50px;">
                </a>
                <form class="form-inline mx-auto d-none d-lg-flex">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button>
                </form>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ asset('dashboard') }}">Dashboard</a>
                        </li>
                        @if (Auth::check() && Auth::user()->usertype == 1)
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('users.create.form') }}">Create User</a>
                        </li>
                        @endif
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('aboutus') }}">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('events') }}">Events</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('logout') }}" 
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>

    <main class="flex-fill py-4">
        @yield('content')
    </main>

    <footer class="bg-primary text-center py-4 mt-auto text-white">
        <div class="container footer-container">
            <div class="row">
                <div class="col-md-4 mb-3 mb-md-0">
                    <h5>Business Hours</h5>
                    <p>Monday to Friday: 08:00 AM - 06:00 PM</p>
                    <p>Saturday: 08:00 AM - 12:00 PM</p>
                    <p>Sunday: Closed</p>
                </div>
                <div class="col-md-4 mb-3 mb-md-0">
                    <h5>Contact</h5>
                    <p><i class="fas fa-phone"></i> Phone: +61 (555) 123-4567</p>
                    <p><i class="fas fa-envelope"></i> Email: contact@careertrainingcollege.edu</p>
                </div>
                <div class="col-md-4">
                    <h5>Location</h5>
                    <p><i class="fas fa-map-marker-alt"></i> 1234 Education Lane, Learning City, ST 56789</p>
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3165.347948583623!2d-122.08424968469058!3d37.42206597982592!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x808fb24c2d0f57ff%3A0x21c4c98d6b6f7ab!2sGoogle!5e0!3m2!1sen!2sus!4v1632875743247!5m2!1sen!2sus" 
                                width="100%" height="150" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                </div>
            </div>
        </div>
        <div class="copy mt-3">
            <p>&copy; {{ date('Y') }} Designed by Luis Filipe Gomes. All rights reserved.</p>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
