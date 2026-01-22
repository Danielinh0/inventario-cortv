<?php

namespace Database\Seeders;

use App\Models\Clave;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class claveSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $csvPath = database_path('data/clave.csv');
        
        if (!file_exists($csvPath)) {
            $this->command->warn("Archivo CSV no encontrado: {$csvPath}");
            return;
        }
        
        Schema::disableForeignKeyConstraints();
        Clave::truncate();
        Schema::enableForeignKeyConstraints();
        
        $csvFile = fopen($csvPath, 'r');
        if ($csvFile === false) {
            $this->command->error("No se pudo abrir el archivo: {$csvPath}");
            return;
        }
        
        $firstline = true;
        while (($data = fgetcsv($csvFile, 2000, ',')) !== false) {
            if (! $firstline && count($data) >= 4) {
                Clave::updateOrCreate(
                    [
                        'id_producto' => $data[0],
                        'id_area' => $data[1],
                    ],
                    [
                        'contador_clave' => $data[2],
                        'valor_clave' => $data[3],
                    ]
                );
            }
            $firstline = false;
        }
        fclose($csvFile);
    }
}
