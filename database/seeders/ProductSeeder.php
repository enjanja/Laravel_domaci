<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('products')->insert([
            [
                'name'=>'Dark chockolate',
                'price'=>'150',
                'description'=>'Dark chockolate, 85% cocoa',
                'category'=>'chockolate',
                'gallery'=>'img2'
            ],
            [
                'name'=>'Bubble gum',
                'price'=>'50',
                'description'=>'Stretchy strawbery flavoured bubble gum',
                'category'=>'bubble gum',
                'gallery'=>'img3'
            ],
            [
                'name'=>'Chupa-chups',
                'price'=>'30',
                'description'=>'Rainbow flavoured lollipops',
                'category'=>'lollipop',
                'gallery'=>'img4'
            ],
            [
                'name'=>'Chockolate balls',
                'price'=>'200',
                'description'=>'Chockolate covered peanuts',
                'category'=>'chockolate',
                'gallery'=>'img5'
            ]
        ]);
    }
}
