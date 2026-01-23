<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schema;
use App\Models\User;
use Spatie\Permission\Models\Role;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Solo ejecutar seeding en entorno NativePHP (cuando NATIVEPHP_RUNNING está presente)
        if (env('NATIVEPHP_RUNNING')) {
            $this->seedDatabaseIfNeeded();
        }
    }

    /**
     * Verifica si la base de datos necesita ser seeded y lo ejecuta.
     */
    protected function seedDatabaseIfNeeded(): void
    {
        try {
            // Verificar si las tablas existen
            if (!Schema::hasTable('users') || !Schema::hasTable('roles')) {
                return; // Las migraciones aún no se han ejecutado
            }

            // Verificar si ya existe al menos un rol (indica que ya se hizo seed)
            if (Role::count() === 0) {
                // No hay roles, ejecutar seeder
                Artisan::call('db:seed', ['--force' => true]);
                \Log::info('Database seeded successfully on first run.');
            }
        } catch (\Exception $e) {
            // Log del error pero no detener la aplicación
            \Log::error('Error during database seeding: ' . $e->getMessage());
        }
    }
}
