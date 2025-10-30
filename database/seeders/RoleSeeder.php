<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\Permission;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        // Crear rol Admin
        $adminRole = Role::firstOrCreate(
            ['name' => 'Admin'],
            ['description' => 'Administrador del sistema']
        );

        // Asignar todos los permisos al Admin
        $allPermissions = Permission::all();
        $adminRole->permissions()->sync($allPermissions->pluck('id'));

        // Crear rol Manager
        $managerRole = Role::firstOrCreate(
            ['name' => 'Manager'],
            ['description' => 'Gerente de productos']
        );

        // Asignar permisos al Manager
        $managerPermissions = Permission::whereIn('name', [
            'view_products', 'create_product', 'edit_product',
            'view_users', 'view_roles'
        ])->pluck('id');
        $managerRole->permissions()->sync($managerPermissions);

        // Crear rol User
        $userRole = Role::firstOrCreate(
            ['name' => 'User'],
            ['description' => 'Usuario estándar']
        );

        // Asignar permisos al User
        $userPermissions = Permission::whereIn('name', [
            'view_products'
        ])->pluck('id');
        $userRole->permissions()->sync($userPermissions);
    }
}
