<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CoinPromotionDetailsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        DB::table('coin_promotion_details')->delete();
        
        DB::table('coin_promotion_details')->insert(array (
            0 => 
            array (
                'id' => 1,
                'coin_promotion_id' => 1,
                'price' => 101500,
                'coins' => 980,
                'free_coins' => 30,
                'discount' => 16,
                'promotion_images' => 'https://storage.googleapis.com/snq-website-images/customer/package_1.png',
                'creator_id' => 0,
                'deleted_at' => NULL,
                'updated_at' => '2024-12-09 15:38:17+00',
                'created_at' => '2024-12-09 15:38:14+00',
            ),
            1 => 
            array (
                'id' => 2,
                'coin_promotion_id' => 1,
                'price' => 300000,
                'coins' => 2910,
                'free_coins' => 75,
                'discount' => 20,
                'promotion_images' => 'https://storage.googleapis.com/snq-website-images/customer/package_2.png',
                'creator_id' => 0,
                'deleted_at' => NULL,
                'updated_at' => '2024-12-09 15:38:21+00',
                'created_at' => '2024-12-09 15:38:19+00',
            ),
            2 => 
            array (
                'id' => 3,
                'coin_promotion_id' => 1,
                'price' => 505000,
                'coins' => 4925,
                'free_coins' => 100,
                'discount' => 25,
                'promotion_images' => 'https://storage.googleapis.com/snq-website-images/customer/package_3.png',
                'creator_id' => 0,
                'deleted_at' => NULL,
                'updated_at' => '2024-12-09 15:38:26+00',
                'created_at' => '2024-12-09 15:38:24+00',
            ),
            3 => 
            array (
                'id' => 4,
                'coin_promotion_id' => 1,
                'price' => 1000000,
                'coins' => 9800,
                'free_coins' => 150,
                'discount' => 30,
                'promotion_images' => 'https://storage.googleapis.com/snq-website-images/customer/package_4.png',
                'creator_id' => 0,
                'deleted_at' => NULL,
                'updated_at' => '2024-12-09 15:38:31+00',
                'created_at' => '2024-12-09 15:38:28+00',
            ),
            4 => 
            array (
                'id' => 5,
                'coin_promotion_id' => 1,
                'price' => 2010000,
                'coins' => 19800,
                'free_coins' => 200,
                'discount' => 35,
                'promotion_images' => 'https://storage.googleapis.com/snq-website-images/customer/package_5.png',
                'creator_id' => 0,
                'deleted_at' => NULL,
                'updated_at' => '2024-12-09 15:38:35+00',
                'created_at' => '2024-12-09 15:38:33+00',
            ),
            5 => 
            array (
                'id' => 8,
                'coin_promotion_id' => 1,
                'price' => 5000000,
                'coins' => 49500,
                'free_coins' => 0,
                'discount' => 40,
                'promotion_images' => 'https://storage.googleapis.com/snq-website-images/customer/package_6.png',
                'creator_id' => 0,
                'deleted_at' => NULL,
                'updated_at' => '2024-12-09 15:38:41+00',
                'created_at' => '2024-12-09 15:38:38+00',
            ),
        ));
        
        
    }
}