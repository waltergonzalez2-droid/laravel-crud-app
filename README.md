# CRUD Laravel 11 - Sistema de Gestión de Productos

## 📋 Descripción
Sistema CRUD completo desarrollado con Laravel 11 para gestión de productos con reportes interactivos y dashboard administrativo.

## ✨ Características

### Backend
- ✅ Laravel 11 Framework
- ✅ Autenticación con Breeze
- ✅ CRUD funcional de Productos, Usuarios y Roles
- ✅ Sistema de reportes con estadísticas
- ✅ Validación de datos
- ✅ Protección contra CSRF

### Frontend
- ✅ Tailwind CSS + CSS personalizado
- ✅ Bootstrap grid system
- ✅ Navegación responsive
- ✅ Gráficos interactivos (Chart.js)
- ✅ Font Awesome 6 Icons
- ✅ Diseño moderno y profesional

### Reportes
- ✅ Dashboard de estadísticas
- ✅ Reporte de productos
- ✅ Reporte de stock bajo
- ✅ Gráficos de distribución

## 🛠️ Requisitos

- PHP 8.2+
- Composer
- Node.js & npm
- MariaDB/MySQL
- Apache

## 📦 Instalación

```bash
# 1. Clonar repositorio
git clone https://github.com/waltergonzalez2-droid/laravel-crud-app.git
cd laravel-crud-app

# 2. Instalar dependencias PHP
composer install

# 3. Instalar dependencias Node
npm install

# 4. Configurar archivo .env
cp .env.example .env
php artisan key:generate

# 5. Configurar base de datos
# Editar .env con credenciales MariaDB
# Luego ejecutar:
php artisan migrate --seed

# 6. Compilar assets
npm run build

# 7. Iniciar servidor
php artisan serve --host=0.0.0.0 --port=8000
```

## 🔐 Credenciales de Prueba

```
Email: admin@example.com
Password: password
```

## 📂 Estructura de Carpetas

```
laravel-crud-app/
├── app/
│   ├── Http/
│   │   └── Controllers/
│   │       ├── ProductController.php
│   │       ├── UserController.php
│   │       ├── RoleController.php
│   │       ├── ReportController.php
│   │       └── DashboardController.php
│   ├── Models/
│   │   ├── Product.php
│   │   ├── User.php
│   │   └── Role.php
├── resources/
│   ├── views/
│   │   ├── layouts/
│   │   │   ├── app.blade.php
│   │   │   └── navigation.blade.php
│   │   ├── products/
│   │   ├── users/
│   │   ├── roles/
│   │   └── reports/
│   ├── css/
│   │   ├── app.css
│   │   └── custom.css
│   └── js/
│       └── app.js
├── routes/
│   ├── web.php
│   └── auth.php
└── database/
    ├── migrations/
    └── seeders/
```

## 🗂️ Rutas Principales

| Ruta | Descripción |
|------|-------------|
| `/dashboard` | Dashboard principal |
| `/products` | CRUD de Productos |
| `/users` | Gestión de Usuarios |
| `/roles` | Gestión de Roles |
| `/reports/dashboard` | Dashboard de Reportes |
| `/reports/products` | Reporte de Productos |
| `/reports/stock` | Reporte de Stock Bajo |

## 🎨 Características de Seguridad

- ✅ CSRF Protection
- ✅ SQL Injection Prevention
- ✅ XSS Protection
- ✅ Autenticación con Sessions
- ✅ Hashing de contraseñas
- ✅ Middleware de autenticación

## 📊 Controladores

### ProductController
- `index()` - Listado de productos
- `create()` - Formulario crear
- `store()` - Guardar producto
- `edit()` - Formulario editar
- `update()` - Actualizar producto
- `destroy()` - Eliminar producto

### ReportController
- `dashboard()` - Dashboard de reportes
- `productReport()` - Reporte de productos
- `stockReport()` - Reporte de stock bajo

## 🚀 Deployment

```bash
# 1. Optimizar para producción
php artisan config:cache
php artisan route:cache
php artisan view:cache

# 2. Ejecutar en servidor
php artisan serve --host=0.0.0.0 --port=8000
```

## 📝 Base de Datos

### Tablas principales:
- `products` - Catálogo de productos
- `users` - Usuarios del sistema
- `roles` - Roles de acceso

## 🤝 Contribuciones

Para cambios, por favor contacta a: waltergonzalez2-droid

## 📄 Licencia

Este proyecto es para fines educativos.

## 👨‍💻 Autor

**Walter González**
- GitHub: [@waltergonzalez2-droid](https://github.com/waltergonzalez2-droid)

---

**Última actualización:** 2025-10-30
