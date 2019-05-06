<?php

use Illuminate\Database\Seeder;

class DireccionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('directions')->insert([
        'user_id' => 1,
        'calle' => str_random(10),
        'colonia' => str_random(10),
        'delegacion' => str_random(10),
        'numero' => random_int(0,9999)
      ]);
      DB::table('directions')->insert([
        'user_id' => 2,
        'calle' => str_random(10),
        'colonia' => str_random(10),
        'delegacion' => str_random(10),
        'numero' => random_int(0,9999)
      ]);
      DB::table('directions')->insert([
        'user_id' => 3,
        'calle' => str_random(10),
        'colonia' => str_random(10),
        'delegacion' => str_random(10),
        'numero' => random_int(0,9999)
      ]);
      DB::table('directions')->insert([
        'user_id' => 4,
        'calle' => str_random(10),
        'colonia' => str_random(10),
        'delegacion' => str_random(10),
        'numero' => random_int(0,9999)
      ]);

    }
}
