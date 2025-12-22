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
                Producto::create([
                    'id_producto' => $data[0],
                    'nombre_producto' => $data[1],
                    'descripcion_producto' => $data[2],
                    'cantidad_producto' => $data[3],
                    'unidad_producto' => $data[4],
                ]);
            }
            $firstline = false;
        }
        fclose($csvFile);
    }
}
