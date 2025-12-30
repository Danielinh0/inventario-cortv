<?php

namespace Database\Seeders;

use App\Models\Producto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class productoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Producto::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        $csvFile = fopen(database_path('data/producto.csv'), 'r');
        $firstline = true;
        while (($data = fgetcsv($csvFile, 2000, ',')) !== false) {
            if (! $firstline) {
                $id = isset($data[0]) ? trim($data[0]) : null;
                $nombre = isset($data[1]) ? trim($data[1]) : null;
                $descripcion = isset($data[2]) ? trim($data[2]) : null;
                $cantidadRaw = isset($data[3]) ? trim($data[3]) : '0';
                // Remove thousand separators and cast to integer
                $cantidad = (int) str_replace([',', ' '], '', $cantidadRaw);
                $unidad = isset($data[4]) ? trim($data[4]) : null;

                Producto::create([
                    'id_producto' => $id,
                    'nombre_producto' => $nombre,
                    'descripcion_producto' => $descripcion,
                    'cantidad_producto' => $cantidad,
                    'unidad_producto' => $unidad,
                ]);
            }
            $firstline = false;
        }
        fclose($csvFile);
    }
}
