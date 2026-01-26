<?php

namespace Database\Seeders;

use App\Models\Producto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class productoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $csvPath = database_path('data/producto.csv');
        
        if (!file_exists($csvPath)) {
            $this->command->warn("Archivo CSV no encontrado: {$csvPath}");
            return;
        }
        
        Schema::disableForeignKeyConstraints();
        Producto::truncate();
        Schema::enableForeignKeyConstraints();
        
        $csvFile = fopen($csvPath, 'r');
        if ($csvFile === false) {
            $this->command->error("No se pudo abrir el archivo: {$csvPath}");
            return;
        }
        
        $firstline = true;
        while (($data = fgetcsv($csvFile, 2000, ',')) !== false) {
            if (! $firstline && count($data) >= 4) {
                $id = isset($data[0]) ? trim($data[0]) : null;
                $nombre = isset($data[1]) ? trim($data[1]) : null;
                $descripcion = isset($data[2]) ? trim($data[2]) : null;
                $cantidadRaw = isset($data[3]) ? trim($data[3]) : '0';
                $cantidad = (int) str_replace([',', ' '], '', $cantidadRaw);
                $unidad = isset($data[4]) ? trim($data[4]) : null;

                Producto::updateOrCreate(
                    ['id_producto' => $id],
                    [
                        'nombre_producto' => $nombre,
                        'descripcion_producto' => $descripcion,
                        'unidad_producto' => $unidad,
                    ]
                );
            }
            $firstline = false;
        }
        fclose($csvFile);
    }
}
