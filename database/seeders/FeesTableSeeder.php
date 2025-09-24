<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FeesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        DB::table('fees')->delete();
        
        DB::table('fees')->insert(array (
            0 => 
            array (
                'id' => 1,
                'package_id' => 1,
                'fee' => 4500,
                'published_at' => '2023-11-17 12:25:08',
                'creator_id' => 0,
                'created_at' => '2023-11-24 12:25:09',
                'updated_at' => '2023-11-24 12:25:09',
            ),
            1 => 
            array (
                'id' => 2,
                'package_id' => 1,
                'fee' => 4800,
                'published_at' => '2023-11-24 12:25:08',
                'creator_id' => 0,
                'created_at' => '2023-11-24 12:25:09',
                'updated_at' => '2023-11-24 12:25:09',
            ),
            2 => 
            array (
                'id' => 3,
                'package_id' => 1,
                'fee' => 5000,
                'published_at' => '2023-12-01 12:25:08',
                'creator_id' => 0,
                'created_at' => '2023-11-24 12:25:09',
                'updated_at' => '2023-11-24 12:25:09',
            ),
            3 => 
            array (
                'id' => 4,
                'package_id' => 2,
                'fee' => 51000,
                'published_at' => '2023-11-24 12:25:08',
                'creator_id' => 0,
                'created_at' => '2023-11-24 12:25:09',
                'updated_at' => '2023-11-24 12:25:09',
            ),
            4 => 
            array (
                'id' => 5,
                'package_id' => 2,
                'fee' => 55000,
                'published_at' => '2023-12-01 12:25:08',
                'creator_id' => 0,
                'created_at' => '2023-11-24 12:25:09',
                'updated_at' => '2023-11-24 12:25:09',
            ),
            5 => 
            array (
                'id' => 6,
                'package_id' => 2,
                'fee' => 52000,
                'published_at' => '2023-11-17 12:25:08',
                'creator_id' => 0,
                'created_at' => '2023-11-24 12:25:09',
                'updated_at' => '2023-11-24 12:25:09',
            ),
            6 => 
            array (
                'id' => 7,
                'package_id' => 3,
                'fee' => 99900,
                'published_at' => '2023-12-01 12:25:08',
                'creator_id' => 0,
                'created_at' => '2023-11-24 12:25:09',
                'updated_at' => '2023-11-24 12:25:09',
            ),
            7 => 
            array (
                'id' => 8,
                'package_id' => 3,
                'fee' => 97920,
                'published_at' => '2023-11-24 12:25:08',
                'creator_id' => 0,
                'created_at' => '2023-11-24 12:25:09',
                'updated_at' => '2023-11-24 12:25:09',
            ),
            8 => 
            array (
                'id' => 9,
                'package_id' => 3,
                'fee' => 98000,
                'published_at' => '2023-11-17 12:25:08',
                'creator_id' => 0,
                'created_at' => '2023-11-24 12:25:09',
                'updated_at' => '2023-11-24 12:25:09',
            ),
        ));
        
        
    }
}