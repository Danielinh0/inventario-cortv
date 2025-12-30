<?php

namespace Database\Seeders;

use App\Models\Clave;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class claveSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Clave::truncate();
        $csvFile = fopen(database_path('data/clave.csv'), 'r');
        $firstline = true;
        while (($data = fgetcsv($csvFile, 2000, ',')) !== false) {
            if (! $firstline) {
                Clave::create([
                    'id_producto' => $data[0],
                    'id_area' => $data[1],
                    'contador_clave' => $data[2],
                    'valor_clave' => $data[3],
                ]);
            }
            $firstline = false;
        }
        fclose($csvFile);
    }
}
