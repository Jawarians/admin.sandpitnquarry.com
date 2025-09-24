<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CoinPromotionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        DB::table('coin_promotions')->delete();
        
        DB::table('coin_promotions')->insert(array (
            0 => 
            array (
                'id' => 1,
                'start_at' => '2024-08-01 17:56:02',
                'creator_id' => 0,
                'updated_at' => '2024-11-20 15:22:34+00',
                'created_at' => '2024-11-20 15:22:31+00',
            ),
        ));
        
        
    }
}