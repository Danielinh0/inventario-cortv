<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        $role = Role::create(['name' => 'Admin']);
        $role = Role::create(['name' => 'Basic']);
        $user = User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => bcrypt('password')
        ]);
        $user->assignRole('Admin');
        $this->call([
            productoSeeder::class,
            areaSeeder::class,
            claveSeeder::class,
            // PersonaSeeder::class,
            RegistroSeeder::class,
        ]);
    }
}
