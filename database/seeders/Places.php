<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class Places extends Seeder
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
            DB::table('places')->insert([
                'nama' => $faker->city(),
                'deskripsi' => $faker->address(),
                'created_at' => $faker->dateTime($max = 'now', $timezone = null),
                'updated_at' => $faker->dateTime($max = 'now', $timezone = null),
            ]);
        }
    }
}
