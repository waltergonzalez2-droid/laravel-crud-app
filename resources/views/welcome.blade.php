<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio - Sistema Contable</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #667eea;
            --secondary-color: #764ba2;
        }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .navbar {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        .hero {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            color: white;
            padding: 100px 0;
            text-align: center;
        }
        .hero h1 {
            font-size: 3.5em;
            font-weight: bold;
            margin-bottom: 20px;
        }
        .hero p {
            font-size: 1.3em;
            margin-bottom: 30px;
        }
        .btn-custom {
            padding: 12px 40px;
            font-size: 1.1em;
            border-radius: 5px;
            font-weight: bold;
            margin: 10px;
        }
        .btn-light-custom {
            background: white;
            color: var(--primary-color);
            border: none;
        }
        .btn-light-custom:hover {
            background: #f0f0f0;
            color: var(--secondary-color);
        }
        .features {
            padding: 80px 0;
            background-color: #f8f9fa;
        }
        .feature-card {
            text-align: center;
            padding: 30px;
            border-radius: 10px;
            background: white;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            margin: 20px 0;
            transition: transform 0.3s;
        }
        .feature-card:hover {
            transform: translateY(-10px);
        }
        .feature-card i {
            font-size: 3em;
            color: var(--primary-color);
            margin-bottom: 20px;
        }
        .feature-card h5 {
            font-weight: bold;
            margin: 20px 0;
        }
        .footer {
            background: #2c3e50;
            color: white;
            padding: 30px 0;
            text-align: center;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="/">
                <i class="fas fa-chart-line"></i> <strong>Sistema Contable</strong>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    @if (Route::has('login'))
                        @auth
                            <li class="nav-item">
                                <a class="nav-link" href="/dashboard">Dashboard</a>
                            </li>
                            <li class="nav-item">
                                <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                                    @csrf
                                    <button class="nav-link btn btn-link" type="submit">Logout</button>
                                </form>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">Iniciar Sesión</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">Registrarse</a>
                                </li>
                            @endif
                        @endauth
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="hero">
        <div class="container">
            <h1>🏢 Sistema Contable Profesional</h1>
            <p>Gestión integral de contabilidad, productos y usuarios</p>
            <div>
                @if (Route::has('login'))
                    @auth
                        <a href="/dashboard" class="btn btn-light-custom btn-custom">
                            <i class="fas fa-tachometer-alt"></i> Ir al Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-light-custom btn-custom">
                            <i class="fas fa-sign-in-alt"></i> Iniciar Sesión
                        </a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="btn btn-light-custom btn-custom">
                                <i class="fas fa-user-plus"></i> Registrarse
                            </a>
                        @endif
                    @endauth
                @endif
            </div>
        </div>
    </div>

    <!-- Features Section -->
    <div class="features">
        <div class="container">
            <h2 class="text-center mb-5">✨ Características Principales</h2>
            <div class="row">
                <div class="col-md-4">
                    <div class="feature-card">
                        <i class="fas fa-box"></i>
                        <h5>Gestión de Productos</h5>
                        <p>Administra tu catálogo de productos de forma eficiente y sencilla.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-card">
                        <i class="fas fa-user-tie"></i>
                        <h5>Control de Roles</h5>
                        <p>Asigna permisos y controla el acceso de cada usuario.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-card">
                        <i class="fas fa-users"></i>
                        <h5>Gestión de Usuarios</h5>
                        <p>Administra usuarios con diferentes niveles de acceso.</p>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-md-4">
                    <div class="feature-card">
                        <i class="fas fa-lock"></i>
                        <h5>Seguridad</h5>
                        <p>Sistema robusto con autenticación y autorización segura.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-card">
                        <i class="fas fa-chart-bar"></i>
                        <h5>Reportes</h5>
                        <p>Genera reportes detallados de tu negocio.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-card">
                        <i class="fas fa-mobile-alt"></i>
                        <h5>Responsive</h5>
                        <p>Acceso desde cualquier dispositivo y navegador.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <div class="footer">
        <div class="container">
            <p>&copy; 2025 Sistema Contable. Todos los derechos reservados.</p>
            <p>Desarrollado con ❤️ usando Laravel 12</p>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
