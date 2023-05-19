<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class RecetaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('recetas')->insert([
            [
                'farmaceutico_id' => 1,
                'paciente_id' => 1,
                'fecha' => '2021-05-30',
            ],
            [
                'farmaceutico_id' => 1,
                'paciente_id' => 2,
                'fecha' => '2021-06-30',
            ],
            [
                'farmaceutico_id' => 2,
                'paciente_id' => 2,
                'fecha' => '2021-07-20',
            ],
        ]);


        DB::table('medicamento_receta')->insert([
            [
                'receta_id' => 1,
                'medicamento_id' => 1,
                'inicio' => '2021-05-31',
                'fin' => '2021-06-07',
                'tomas_dia' => 3,
                'comentarios' => 'Tomar después de las comidas',
            ],
            [
                'receta_id' => 2,
                'medicamento_id' => 2,
                'inicio' => '2021-06-30',
                'fin' => '2021-07-15',
                'tomas_dia' => 2,
                'comentarios' => 'El paciente presenta reacciones alérgicas',
            ],
            [
                'receta_id' => 2,
                'medicamento_id' => 1,
                'inicio' => '2021-06-30',
                'fin' => '2021-07-10',
                'tomas_dia' => 1,
                'comentarios' => 'Se especifica la toma',
            ],
        ]);
    }
}
