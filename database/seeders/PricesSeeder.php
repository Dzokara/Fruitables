<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class PricesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

       for ($i=15;$i<23;$i++) {
            DB::table('prices')->insert([
                'price' => $faker->numberBetween(1, 100),
                'id_fruits' => $i,
                'date_from' => now(),
                'date_to' => null,
            ]);
        }
    }
}
