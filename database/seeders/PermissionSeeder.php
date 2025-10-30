<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    public function run(): void
    {
        $permissions = [
            ['name' => 'view_products', 'description' => 'Ver productos'],
            ['name' => 'create_product', 'description' => 'Crear productos'],
            ['name' => 'edit_product', 'description' => 'Editar productos'],
            ['name' => 'delete_product', 'description' => 'Eliminar productos'],
            ['name' => 'view_roles', 'description' => 'Ver roles'],
            ['name' => 'create_role', 'description' => 'Crear roles'],
            ['name' => 'edit_role', 'description' => 'Editar roles'],
            ['name' => 'delete_role', 'description' => 'Eliminar roles'],
            ['name' => 'view_users', 'description' => 'Ver usuarios'],
            ['name' => 'create_user', 'description' => 'Crear usuarios'],
            ['name' => 'edit_user', 'description' => 'Editar usuarios'],
            ['name' => 'delete_user', 'description' => 'Eliminar usuarios'],
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(
                ['name' => $permission['name']],
                ['description' => $permission['description']]
            );
        }
    }
}
