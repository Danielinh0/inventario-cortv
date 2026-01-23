<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        
        // Crear roles solo si no existen
        if (!Role::where('name', 'Admin')->exists()) {
            Role::create(['name' => 'Admin']);
        }
        if (!Role::where('name', 'Basic')->exists()) {
            Role::create(['name' => 'Basic']);
        }
        
        // Crear usuario de prueba solo si no existe
        $user = User::firstOrCreate(
            ['email' => 'test@example.com'],
            [
                'name' => 'Test User',
                'password' => Hash::make('password')
            ]
        );
        
        // Asignar rol Admin si no lo tiene
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
