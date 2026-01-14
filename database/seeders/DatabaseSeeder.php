<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Crear usuario administrador si no existe
        if (!User::where('email', 'pcapacho24@gmail.com')->exists()) {
            User::create([
                'name' => 'Luis Carlos Correa',
                'email' => 'pcapacho24@gmail.com',
                'password' => Hash::make('lcdesign2024'),
            ]);
        }

        // Ejecutar seeders
        $this->call([
            ServiceSeeder::class,
            ProductSeeder::class,
            FixProductImagesSeeder::class,
        ]);
    }
}
