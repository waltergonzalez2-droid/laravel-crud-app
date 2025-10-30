<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Obtener roles
        $adminRole = Role::where('name', 'Admin')->first();
        $managerRole = Role::where('name', 'Manager')->first();
        $userRole = Role::where('name', 'User')->first();

        // Crear usuario Admin
        User::firstOrCreate(
            ['email' => 'admin@laravel.local'],
            [
                'name' => 'Administrador',
                'password' => Hash::make('admin123'),
                'role_id' => $adminRole->id,
                'email_verified_at' => now(),
            ]
        );

        // Crear usuario Manager
        User::firstOrCreate(
            ['email' => 'manager@laravel.local'],
            [
                'name' => 'Gerente',
                'password' => Hash::make('manager123'),
                'role_id' => $managerRole->id,
                'email_verified_at' => now(),
            ]
        );

        // Crear usuario estándar
        User::firstOrCreate(
            ['email' => 'user@laravel.local'],
            [
                'name' => 'Usuario',
                'password' => Hash::make('user123'),
                'role_id' => $userRole->id,
                'email_verified_at' => now(),
            ]
        );
    }
}
