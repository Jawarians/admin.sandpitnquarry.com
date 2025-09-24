<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AccountsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        DB::table('accounts')->delete();
        
        DB::table('accounts')->insert(array (
            0 => 
            array (
                'id' => 1,
                'user_id' => 21,
                'creator_id' => 1,
                'updated_at' => '2024-11-20 11:43:34+00',
                'created_at' => '2024-11-20 11:43:37+00',
            ),
            1 => 
            array (
                'id' => 2,
                'user_id' => 22,
                'creator_id' => 1,
                'updated_at' => '2024-11-20 11:43:48+00',
                'created_at' => '2024-11-20 11:43:50+00',
            ),
            2 => 
            array (
                'id' => 3,
                'user_id' => 23,
                'creator_id' => 3,
                'updated_at' => '2024-11-20 11:44:10+00',
                'created_at' => '2024-11-20 11:44:12+00',
            ),
            3 => 
            array (
                'id' => 4,
                'user_id' => 24,
                'creator_id' => 3,
                'updated_at' => '2024-11-20 11:44:28+00',
                'created_at' => '2024-11-20 11:44:31+00',
            ),
            4 => 
            array (
                'id' => 5,
                'user_id' => 25,
                'creator_id' => 2,
                'updated_at' => '2024-11-20 11:44:45+00',
                'created_at' => '2024-11-20 11:44:47+00',
            ),
            5 => 
            array (
                'id' => 6,
                'user_id' => 26,
                'creator_id' => 2,
                'updated_at' => '2024-11-20 11:45:03+00',
                'created_at' => '2024-11-20 11:45:05+00',
            ),
        ));
        
        
    }
}