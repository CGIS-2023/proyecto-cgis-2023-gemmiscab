<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MedicamentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('medicamentos')->insert([
            [
                'nombre' => "Paracetamol",
                'dosis' => 750,
            ],
            [
                'nombre' => "Ibuprofeno",
                'dosis' => 600,
            ],
            [
                'nombre' => "Rubifen",
                'dosis' => 5,
            ],
            [
                'nombre' => "Amoxicilina",
                'dosis' => 500,
            ],
        ]);
    }
}
