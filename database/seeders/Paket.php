<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class Paket extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = Faker::create('id_ID');
        for ($i=0; $i < 10; $i++) { 
            DB::table('pakets')->insert([
                'nama' => $faker->city(),
                'harga' => $faker->randomNumber(6),
                'created_at' => $faker->dateTime($max = 'now', $timezone = null),
                'updated_at' => $faker->dateTime($max = 'now', $timezone = null),
            ]);
        }
    }
}
