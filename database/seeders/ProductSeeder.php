<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
  
    public function run()
    {
       
        DB::table('products')->insert([
            [
                'name'=>'iPhone 11 pro',
                'price'=>'1500000',
                'description'=>'cam with 12MP and RAM 16GB',
                'gallery'=>'img/tech/image2.jpg'

            ],
            [
                'name'=>'iPhone 12',
                'price'=>'3000000',
                'description'=>'cam with 16MP and RAM 32GB',
                'gallery'=>'img/tech/image2.jpg'

            ],
            [
                'name'=>'SamSung Galaxy Edge S6+',
                'price'=>'200000',
                'description'=>'RAM 16GB',
                'gallery'=>'img/tech/image2.jpg'

            ],
            [
                'name'=>'Tecno 11',
                'price'=>'100000',
                'description'=>'RAM 4GB',
                'gallery'=>'img/tech/image2.jpg'

            ],
            [
                'name'=>'Itel 11',
                'price'=>'90000',
                'description'=>'RAM 4GB',
                'gallery'=>'img/tech/image2.jpg'

            ],

            [
                'name'=>'Itel 12',
                'price'=>'100000',
                'description'=>'RAM 4GB',
                'gallery'=>'img/tech/image2.jpg'

            ],

            [
                'name'=>'Iphone 13',
                'price'=>'1000000',
                'description'=>'RAM 4GB',
                'gallery'=>'img/tech/image2.jpg'

            ],

            [
                'name'=>'Itel 14',
                'price'=>'12300000',
                'description'=>'RAM 4GB',
                'gallery'=>'img/tech/image2.jpg'

            ],

            ]);

    }
}
