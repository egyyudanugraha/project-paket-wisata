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
        for ($i=0; $i < 20; $i++) { 
            DB::table('pakets')->insert([
                'nama' => $faker->lexify('Paket ???'),
                'harga' => $faker->randomNumber(6),
                'deskripsi' => $faker->sentence($nbWords = 50, $variableNbWords = true),
                'created_at' => $faker->dateTime($max = 'now', $timezone = null),
                'updated_at' => $faker->dateTime($max = 'now', $timezone = null),
            ]);
        }
    }
}
