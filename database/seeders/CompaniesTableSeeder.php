<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompaniesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        DB::table('companies')->delete();
        
        DB::table('companies')->insert(array (
            0 => 
            array (
                'id' => 21,
                'creator_id' => 21,
                'updated_at' => '2024-11-20 11:29:47+00',
                'created_at' => '2024-11-20 11:29:58+00',
            ),
            1 => 
            array (
                'id' => 22,
                'creator_id' => 22,
                'updated_at' => '2024-11-20 11:30:05+00',
                'created_at' => '2024-11-20 11:30:08+00',
            ),
            2 => 
            array (
                'id' => 23,
                'creator_id' => 23,
                'updated_at' => '2024-11-20 11:30:16+00',
                'created_at' => '2024-11-20 11:30:18+00',
            ),
            3 => 
            array (
                'id' => 24,
                'creator_id' => 24,
                'updated_at' => '2024-11-20 11:30:34+00',
                'created_at' => '2024-11-20 11:30:37+00',
            ),
            4 => 
            array (
                'id' => 20,
                'creator_id' => 20,
                'updated_at' => '2024-11-20 11:31:02+00',
                'created_at' => '2024-11-20 11:31:04+00',
            ),
            5 => 
            array (
                'id' => 25,
                'creator_id' => 25,
                'updated_at' => '2024-11-20 11:31:16+00',
                'created_at' => '2024-11-20 11:31:17+00',
            ),
            6 => 
            array (
                'id' => 26,
                'creator_id' => 26,
                'updated_at' => '2024-11-20 11:31:26+00',
                'created_at' => '2024-11-20 11:31:28+00',
            ),
        ));
        
        
    }
}