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
        // // \App\Models\User::factory(10)->create();
        // DB::table('users')->insert([
        //     [
        //         'name'=>"Administrador",
        //         'email' => "administrador@administrador.com",
        //         'password' => Hash::make('12345678'),
        //     ],
        //     [
        //         'name' => "Paciente 1",
        //         'email' => "paciente1@paciente.com",
        //         'password' => Hash::make('12345678'),
        //     ],
        //     [
        //         'name' => "Paciente 2",
        //         'email' => "paciente2@paciente.com",
        //         'password' => Hash::make('12345678'),
        //     ],
        // ])

        $this->call([
            UserSeeder::class, PacienteSeeder::class
        ]);

    }
}
