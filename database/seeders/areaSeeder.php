<?php

namespace Database\Seeders;

use App\Models\Area;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class areaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Area::truncate();
        \DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        $csvFile = fopen(database_path('data/area.csv'), 'r');
        $firstline = true;
        while (($data = fgetcsv($csvFile, 2000, ',')) !== false) {
            if (! $firstline) {
                Area::create([
                    'id_area' => $data[0],
                    'nombre_area' => $data[1],
                ]);
            }
            $firstline = false;
        }
        fclose($csvFile);
    }
}
