<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Limpiar tablas de roles y usuarios para evitar duplicados
        Schema::disableForeignKeyConstraints();
        
        // Crear roles solo si no existen
        if (!Role::where('name', 'Admin')->exists()) {
            Role::create(['name' => 'Admin']);
        }
        if (!Role::where('name', 'Basic')->exists()) {
            Role::create(['name' => 'Basic']);
        }
        
        // Crear usuario solo si no existe
        $user = User::firstOrCreate(
            ['email' => 'test@example.com'],
            [
                'name' => 'Test User',
                'password' => bcrypt('password')
            ]
        );
        
        // Asignar rol si no lo tiene
        if (!$user->hasRole('Admin')) {
            $user->assignRole('Admin');
        }
        
        Schema::enableForeignKeyConstraints();
        
        $this->call([
            productoSeeder::class,
            areaSeeder::class,
            claveSeeder::class,
        ]);
    }
}
