<?php

namespace Database\Seeders;

use App\Models\Area;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class areaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $csvPath = database_path('data/area.csv');
        
        if (!file_exists($csvPath)) {
            $this->command->warn("Archivo CSV no encontrado: {$csvPath}");
            return;
        }
        
        Schema::disableForeignKeyConstraints();
        Area::truncate();
        Schema::enableForeignKeyConstraints();
        
        $csvFile = fopen($csvPath, 'r');
        if ($csvFile === false) {
            $this->command->error("No se pudo abrir el archivo: {$csvPath}");
            return;
        }
        
        $firstline = true;
        while (($data = fgetcsv($csvFile, 2000, ',')) !== false) {
            if (! $firstline && count($data) >= 3) {
                Area::updateOrCreate(
                    ['id_area' => $data[0]],
                    [
                        'nombre_area' => $data[1],
                        'descripcion_area' => $data[2],
                    ]
                );
            }
            $firstline = false;
        }
        fclose($csvFile);
    }
}
