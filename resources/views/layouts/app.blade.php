<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'E-Clothes')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background-color: #f9f9f9;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        /* Limit main content width */
        .main-container {
            max-width: 900px;  /* adjust this for smaller/bigger */
            margin: auto;
        }
        /* Navbar */
        .navbar {
            background-color: #082947ff;
        }
        .navbar-brand {
            font-weight: 700;
            font-size: 1.4rem;
            color: #f3f1ecff !important; /* gold accent */
        }
        .nav-link {
            color: #fff !important;
            margin-left: 10px;
        }
        .nav-link:hover {
            color: #f8f7f6ff !important;
        }
        .btn-link {
            color: #fff !important;
        }
        /* Footer */
        footer {
            background: #082947ff;
            color: #f8f2f2ff;
            padding: 20px 0;
            margin-top: 40px;
        }
        footer a {
            color: #f3f1ecff;
            text-decoration: none;
        }
        footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    {{-- Navbar --}}
    <nav class="navbar navbar-expand-lg shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">
                <i class="bi bi-bag-check-fill"></i> E-Clothes
            </a>
            <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    @auth
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('cart.index') }}">
                                <i class="bi bi-cart3"></i> Cart
                            </a>
                        </li>
                        <li class="nav-item">
                            <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                @csrf
                                <button class="btn btn-link nav-link" type="submit">
                                    <i class="bi bi-box-arrow-right"></i> Logout
                                </button>
                            </form>
                        </li>
                    @else
                        <li class="nav-item"><a class="nav-link" href="{{ route('login') }}"><i class="bi bi-person"></i> Login</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('register') }}"><i class="bi bi-pencil-square"></i> Register</a></li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    {{-- Content --}}
    <div class="main-container py-4">
        @yield('content')
    </div>

    {{-- Footer --}}
    <footer>
        <div class="main-container text-center">
            <p class="mb-1">© {{ date('Y') }} E-Clothes. All rights reserved.</p>
            <p class="mb-0">
                <a href="#">Privacy Policy</a> | 
                <a href="#">Terms & Conditions</a>
            </p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
