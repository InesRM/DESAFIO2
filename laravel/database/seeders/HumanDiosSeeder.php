<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HumanoDiosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //*********************************** */ Hay que cambiar de 10 a 3 para crear los dioses dentro de usuarios
        \App\Models\User::factory(10)->create();
    }
}
