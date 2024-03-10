<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            "Berries","Citrus","Apples and Pears","Tropic","Stone Fruit"
        ];

        foreach ($categories as $item) {
            DB::table('categories')->insert(['name'=>$item]);
        }
    }
}
