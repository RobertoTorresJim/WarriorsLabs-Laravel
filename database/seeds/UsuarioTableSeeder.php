<?php

use Illuminate\Database\Seeder;

class UsuarioTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
          'nombre' => str_random(10),
          'ape_paterno' => str_random(10),
          'ape_materno' => str_random(10),
          'edad' => 13
        ]);
        DB::table('users')->insert([
          'nombre' => str_random(10),
          'ape_paterno' => str_random(10),
          'ape_materno' => str_random(10),
          'edad' => 13
        ]);
        DB::table('users')->insert([
          'nombre' => str_random(10),
          'ape_paterno' => str_random(10),
          'ape_materno' => str_random(10),
          'edad' => 13
        ]);
        DB::table('users')->insert([
          'nombre' => str_random(10),
          'ape_paterno' => str_random(10),
          'ape_materno' => str_random(10),
          'edad' => 13
        ]);
    }
}
