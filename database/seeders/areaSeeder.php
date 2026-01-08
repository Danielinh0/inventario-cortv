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
        Schema::disableForeignKeyConstraints();
        Area::truncate();
        Schema::enableForeignKeyConstraints();
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
