<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FarmaceuticoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('farmaceuticos')->insert([
            [
                'numero_colegiado' => "NC1234567890",
                'user_id' => 4,
            ],
            [
                'numero_colegiado' => "NC1234567891",
                'user_id' => 5,
            ],
        ]);
    }
}
