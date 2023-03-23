<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PacientesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pacientes')->insert([
            [
                'nuhsa' => "AN1234567890",
                'user_id' => 2,
            ],
            [
                'nuhsa' => "AN1234567891",
                'user_id' => 3,
            ],
        ]);
    }
}
