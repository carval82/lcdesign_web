<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Crear usuario administrador
        User::factory()->create([
            'name' => 'Luis Carlos Correa',
            'email' => 'pcapacho24@gmail.com',
        ]);

        // Ejecutar seeders
        $this->call([
            ServiceSeeder::class,
            ProductSeeder::class,
        ]);
    }
}
