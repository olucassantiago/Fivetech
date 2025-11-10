<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Executa todos os seeders
     */
    public function run()
    {
        // Chama o UserSeeder para criar os usuários
        $this->call([
            UserSeeder::class,
        ]);
    }
}