<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Core-Se - Glassy UI</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    <style>
        /* Background Gradasi Lembut agar efek kaca terlihat */
        body {
            min-height: 100vh;
            background: linear-gradient(135deg, #0f172a 0%, #1e1b4b 50%, #0f766e 100%);
            color: #f8fafc;
            font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
            position: relative;
            overflow-x: hidden;
        }

        /* Dekorasi Cahaya di Belakang Kaca */
        .glow-circle-1 {
            position: fixed;
            top: -80px;
            left: 10%;
            width: 350px;
            height: 350px;
            background: rgba(99, 102, 241, 0.35);
            filter: blur(110px);
            border-radius: 50%;
            z-index: -1;
        }
        .glow-circle-2 {
            position: fixed;
            bottom: -100px;
            right: 5%;
            width: 400px;
            height: 400px;
            background: rgba(20, 184, 166, 0.3);
            filter: blur(120px);
            border-radius: 50%;
            z-index: -1;
        }

        /* Panel Kaca (Navbar & Card Tabel) */
        .glass-panel {
            background: rgba(255, 255, 255, 0.09);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 16px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.25);
        }

        /* Navigasi & Hover Zoom */
        .nav-link-glass {
            color: rgba(255, 255, 255, 0.8) !important;
            transition: transform 0.2s ease, color 0.2s ease;
            border-radius: 8px;
            padding: 6px 12px !important;
        }
        .nav-link-glass:hover, .nav-link-glass.active {
            color: #ffffff !important;
            background: rgba(255, 255, 255, 0.15);
            transform: scale(1.05);
        }

        /* Tabel Transparan Bootstrap 5 */
        .table-glass {
            --bs-table-bg: transparent;
            --bs-table-color: #f8fafc;
            --bs-table-border-color: rgba(255, 255, 255, 0.15);
            --bs-table-hover-bg: rgba(255, 255, 255, 0.06);
            --bs-table-hover-color: #ffffff;
        }

        /* Pagination Glassy */
        .pagination .page-link {
            background: rgba(255, 255, 255, 0.1);
            border-color: rgba(255, 255, 255, 0.2);
            color: #ffffff;
        }
        .pagination .page-item.active .page-link {
            background: #0d6efd;
            border-color: #0d6efd;
        }
    </style>
</head>
<body>
    <div class="glow-circle-1"></div>
    <div class="glow-circle-2"></div>

    <div class="container py-4">
        <!-- Logo Atas -->
        <div class="mb-3">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" width="60" height="60" class="rounded-circle shadow">
        </div>

        <!-- Navbar Glassy -->
        <nav class="navbar navbar-expand-lg glass-panel px-4 py-3 mb-4">
            <a class="navbar-brand fw-bold text-white fs-4 me-4" href="{{ url('/dashboard') }}">Core-Se</a>
            
            <button class="navbar-toggler border-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav gap-2">
                    <li class="nav-item">
                        <a class="nav-link nav-link-glass {{ request()->routeIs('about*') ? 'active' : '' }}" href="#">
                            <i class="fa-solid fa-house me-1"></i> About
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link-glass {{ request()->routeIs('customers*') ? 'active' : '' }}" href="{{ route('customers.index') }}">
                            <i class="fa-solid fa-users me-1"></i> Customer
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link-glass {{ request()->routeIs('dashboard*') ? 'active' : '' }}" href="{{ url('/dashboard') }}">
                            <i class="fa-solid fa-gauge me-1"></i> Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link-glass {{ request()->routeIs('services*') ? 'active' : '' }}" href="#">
                            <i class="fa-solid fa-briefcase me-1"></i> Services
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link-glass {{ request()->routeIs('orders*') ? 'active' : '' }}" href="#">
                            <i class="fa-solid fa-cart-shopping me-1"></i> Order
                        </a>
                    </li>
                </ul>

                <!-- Tombol Logout di Kanan -->
                <div class="ms-auto">
                    <form action="{{ route('logout') }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-outline-danger text-white border-danger bg-danger bg-opacity-25">
                            <i class="fa-solid fa-right-from-bracket me-1"></i> Logout
                        </button>
                    </form>
                </div>
            </div>
        </nav>

        <!-- Konten Dinamis -->
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>