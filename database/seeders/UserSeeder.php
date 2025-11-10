<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Cria usuários iniciais para teste do sistema
     */
    public function run()
    {
        // Cria um usuário administrador
        User::create([
            'name' => 'Administrador',
            'email' => 'admin@sistema.com',
            'password' => Hash::make('123456'),
            'role' => 'admin',
            'active' => true,
        ]);

        // Cria um usuário gerente
        User::create([
            'name' => 'Gerente',
            'email' => 'gerente@sistema.com',
            'password' => Hash::make('123456'),
            'role' => 'gerente',
            'active' => true,
        ]);

        // Cria um usuário vendedor
        User::create([
            'name' => 'Vendedor',
            'email' => 'vendedor@sistema.com',
            'password' => Hash::make('123456'),
            'role' => 'vendedor',
            'active' => true,
        ]);
    }
}