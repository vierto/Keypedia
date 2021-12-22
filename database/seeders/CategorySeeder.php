<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'category_name' => 'TKL Mechanical Keyboard',
            'category_image' => 'public/categoryImages/EPOMAKER_AKKO_ACR87.jpg'
        ]);

        DB::table('categories')->insert([
            'category_name' => '60% Mechanical Keyboard',
            'category_image' => 'public/categoryImages/CORN_Anne_Pro_2.jpg'
        ]);

        DB::table('categories')->insert([
            'category_name' => 'Full Size Mechanical Keyboard',
            'category_image' => 'public/categoryImages/SteelSeries_Apex_Pro.jpg'
        ]);

        DB::table('categories')->insert([
            'category_name' => 'Full Size Membrane Keyboard',
            'category_image' => 'public/categoryImages/Redragon_K512_Shiva.jpg'
        ]);
    }
}
