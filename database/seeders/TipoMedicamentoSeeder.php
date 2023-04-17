<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoMedicamentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipo_medicamento')->insert([
            [
                'nombre' => "Analgésico",
            ],
            [
                'nombre' => "Antibiótico",
            ],
            [
                'nombre' => "Antidepresivo",
            ],
            [
                'nombre' => "Anticonceptivo",
            ],
            [
                'nombre' => "AINE",
            ],
            [
                'nombre' => "Antihistamínico",
            ],
        ]);
    }
}
