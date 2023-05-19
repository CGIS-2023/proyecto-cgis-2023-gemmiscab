<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class, PacienteSeeder::class, FarmaceuticoSeeder::class, RecetaSeeder::class, TipoMedicamentoSeeder::class, MedicamentoSeeder::class
        ]);
    }
}
