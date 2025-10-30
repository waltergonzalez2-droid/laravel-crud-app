<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Sistema Contable</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #667eea;
            --secondary-color: #764ba2;
        }
        body {
            background-color: #f8f9fa;
        }
        .navbar {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
        }
        .sidebar {
            background-color: #2c3e50;
            min-height: 100vh;
            padding-top: 20px;
        }
        .sidebar a {
            color: #ecf0f1;
            text-decoration: none;
            padding: 15px 20px;
            display: block;
            border-left: 3px solid transparent;
            transition: all 0.3s;
        }
        .sidebar a:hover {
            background-color: #34495e;
            border-left-color: var(--primary-color);
        }
        .sidebar a.active {
            background-color: #34495e;
            border-left-color: var(--primary-color);
            color: var(--primary-color);
        }
        .card {
            border: none;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            margin-bottom: 20px;
        }
        .card-header {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            color: white;
            border: none;
        }
        .stat-card {
            text-align: center;
            padding: 30px;
        }
        .stat-card h3 {
            color: var(--primary-color);
            font-weight: bold;
            font-size: 2em;
        }
        .stat-card p {
            color: #7f8c8d;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="/dashboard">
                <i class="fas fa-chart-line"></i> Sistema Contable
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown">
                            <i class="fas fa-user-circle"></i> {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                            <li><a class="dropdown-item" href="/profile"><i class="fas fa-edit"></i> Perfil</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                                    @csrf
                                    <button class="dropdown-item" type="submit">
                                        <i class="fas fa-sign-out-alt"></i> Cerrar Sesión
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <nav class="col-md-2 sidebar">
                <div class="sidebar-sticky">
                    <h6 class="sidebar-heading px-3 mt-4 mb-3 text-muted">
                        <i class="fas fa-th"></i> MENÚ
                    </h6>
                    <a href="/dashboard" class="active">
                        <i class="fas fa-home"></i> Dashboard
                    </a>
                    <a href="/products">
                        <i class="fas fa-box"></i> Productos
                    </a>
                    <a href="/roles">
                        <i class="fas fa-user-tie"></i> Roles
                    </a>
                    <a href="/users">
                        <i class="fas fa-users"></i> Usuarios
                    </a>
                </div>
            </nav>

            <!-- Main Content -->
            <main class="col-md-10 ms-sm-auto px-md-4 py-4">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h1><i class="fas fa-tachometer-alt"></i> Dashboard</h1>
                </div>

                <!-- Welcome Card -->
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">
                            <i class="fas fa-wave-square"></i> Bienvenido, {{ Auth::user()->name }}!
                        </h5>
                    </div>
                    <div class="card-body">
                        <p>Rol: <strong>{{ Auth::user()->role->name ?? 'Sin asignar' }}</strong></p>
                        <p>Email: <strong>{{ Auth::user()->email }}</strong></p>
                    </div>
                </div>

                <!-- Stats Row -->
                <div class="row">
                    <div class="col-md-3">
                        <div class="card stat-card">
                            <h3>12</h3>
                            <p>Productos</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card stat-card">
                            <h3>3</h3>
                            <p>Roles</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card stat-card">
                            <h3>5</h3>
                            <p>Usuarios</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card stat-card">
                            <h3>8</h3>
                            <p>Permisos</p>
                        </div>
                    </div>
                </div>

                <!-- Info Card -->
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0"><i class="fas fa-info-circle"></i> Información del Sistema</h5>
                    </div>
                    <div class="card-body">
                        <p><strong>Laravel:</strong> {{ App::version() }}</p>
                        <p><strong>PHP:</strong> {{ phpversion() }}</p>
                        <p><strong>Ambiente:</strong> {{ config('app.env') }}</p>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
