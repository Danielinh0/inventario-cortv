<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Registro;

class registroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Registro::factory()->count(10000)->create();
    }
}
