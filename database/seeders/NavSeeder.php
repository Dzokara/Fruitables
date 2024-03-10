<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NavSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $navItems = [
            ['name' => 'Home', 'href' => '/home'],
            ['name' => 'Shop', 'href' => '/shop'],
            ['name' => 'Contact', 'href' => '/contact'],
            ['name' => 'Gallery', 'href' => '/gallery'],
            ['name' => 'Login', 'href' => '/login'],
        ];

        foreach ($navItems as $item) {
            DB::table('nav')->insert($item);
        }
    }
}
