<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class FruitsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        foreach (range(1, 7) as $index) {
            DB::table('fruits')->insert([
                'name' => $faker->word,
                'id_category' => 6,
                'id_img' => 1,
            ]);
        }
    }
}
