<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class RatingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        foreach (range(1, 50) as $index) {
            $value = $faker->numberBetween(1, 10) / 2;
            DB::table('rating')->insert([
                'value' => $value,
                'id_user' => 1,
                'id_fruits' => $faker->numberBetween(2, 16),
            ]);
        }
    }
}
