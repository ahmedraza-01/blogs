<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/43.0.0/ckeditor5.css" />

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color:#c4c4c4 !important">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('dashboard') }}">
                <x-application-logo class="d-inline-block align-text-top" />
            </a>
            <div class="mx-auto">
                <span class="navbar-brand"><b>Blog App</b></span>
            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('posts.home') ? 'active' : '' }}" href="{{ route('posts.home') }}">Home</a>
                    </li>
                   @if(Auth::user())
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('posts.index') ? 'active' : '' }}" href="{{ route('posts.index') }}">
                            @if (auth()->user()->hasRole('admin'))
                            Manage Posts 
                        @else
                            My Posts
                            @endif
                        </a>
                    </li>
                    @if (auth()->user()->hasRole('admin'))
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('users.index') ? 'active' : '' }}" href="{{ route('users.index') }}">Manage Users</a>
                    </li>
                    @endif
                    @endif
                </ul>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown">
                        @auth
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Profile</a></li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button class="dropdown-item" type="submit">Log Out</button>
                                </form>
                            </li>
                       
                        @endauth
                        <a
                        href="{{ route('login') }}"
                        class="btn btn-outline-dark-custom rounded-pill px-3 py-2"
                    >
                        Log in
                    </a>
                    
                    @if (Route::has('register'))
                        <a
                            href="{{ route('register') }}"
                            class="btn btn-outline-dark-custom rounded-pill px-3 py-2 ms-2"
                        >
                            Register
                        </a>
                    @endif
                      
                    </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <style>
        .btn-outline-dark-custom {
            color: #000;
            border-color: #000;
        }
        .btn-outline-dark-custom:hover {
            color: #000;
            background-color: rgba(0, 0, 0, 0.1); /* Change background on hover */
            border-color: #000;
        }
        .btn-outline-dark-custom:focus {
            box-shadow: 0 0 0 0.25rem rgba(255, 45, 32, 0.5); /* Custom focus ring */
        }
    </style>
    <!-- Page Content -->
    <main>
        @yield('main')
    </main>

    <!-- Footer -->
    <footer class=" text-center text-lg-start mt-auto py-4" style="background-color:#c4c4c4 !important" >
        <div class="container">
            <div class="row">
                <!-- Logo Section -->
                <div class="mx-auto mb-4 ">
                    <span class="navbar-brand"><b style="font-size: 20px">Blog App</b></span>
                </div>
                
                <!-- Links Section -->
                <div class="col-12 mb-3">
                    <ul class="list-unstyled" style="margin-left:20px;">
                        <li><a href="#" class="text-dark text-decoration-none">Home</a></li>
                        <li><a href="#" class="text-dark text-decoration-none">About Us</a></li>
                        <li><a href="#" class="text-dark text-decoration-none">Services</a></li>
                        <li><a href="#" class="text-dark text-decoration-none">Contact</a></li>
                    </ul>
                </div>
    
                <!-- Copyright Section -->
                <div class="col-12">
                    <span class="text-muted">© {{ date('Y') }} Blog App. All rights reserved.</span>
                </div>
            </div>
        </div>
    </footer>
    
</body>
</html>
