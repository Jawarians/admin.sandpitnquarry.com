<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReferrersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        DB::table('referrers')->delete();
        
        DB::table('referrers')->insert(array (
            0 => 
            array (
                'id' => 22,
                'affiliate_id' => 1,
                'creator_id' => 1,
                'updated_at' => '2024-11-20 11:25:56+00',
                'created_at' => '2024-11-20 11:25:58+00',
                'user_id' => 22,
                'referrer_id' => 0,
            ),
            1 => 
            array (
                'id' => 21,
                'affiliate_id' => 1,
                'creator_id' => 1,
                'updated_at' => '2024-11-20 11:24:54+00',
                'created_at' => '2024-11-20 11:24:57+00',
                'user_id' => 21,
                'referrer_id' => 0,
            ),
            2 => 
            array (
                'id' => 23,
                'affiliate_id' => 3,
                'creator_id' => 3,
                'updated_at' => '2024-11-20 11:26:29+00',
                'created_at' => '2024-11-20 11:26:31+00',
                'user_id' => 23,
                'referrer_id' => 0,
            ),
            3 => 
            array (
                'id' => 24,
                'affiliate_id' => 3,
                'creator_id' => 3,
                'updated_at' => '2024-11-20 11:26:49+00',
                'created_at' => '2024-11-20 11:26:51+00',
                'user_id' => 24,
                'referrer_id' => 0,
            ),
            4 => 
            array (
                'id' => 25,
                'affiliate_id' => 2,
                'creator_id' => 2,
                'updated_at' => '2024-11-20 11:27:15+00',
                'created_at' => '2024-11-20 11:27:18+00',
                'user_id' => 25,
                'referrer_id' => 0,
            ),
            5 => 
            array (
                'id' => 26,
                'affiliate_id' => 2,
                'creator_id' => 2,
                'updated_at' => '2024-11-20 11:27:31+00',
                'created_at' => '2024-11-20 11:27:34+00',
                'user_id' => 26,
                'referrer_id' => 0,
            ),
        ));
        
        
    }
}