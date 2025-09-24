<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DriverDetailsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        DB::table('driver_details')->delete();
        
        DB::table('driver_details')->insert(array (
            0 => 
            array (
                'id' => 1,
                'driver_id' => 1,
                'status' => 'Pending',
                'creator_id' => 27,
                'updated_at' => '2024-11-21 02:33:14+00',
                'created_at' => '2024-11-21 02:33:16+00',
            ),
            1 => 
            array (
                'id' => 2,
                'driver_id' => 1,
                'status' => 'Active',
                'creator_id' => 4,
                'updated_at' => '2024-11-21 02:33:33+00',
                'created_at' => '2024-11-21 02:33:36+00',
            ),
            2 => 
            array (
                'id' => 3,
                'driver_id' => 2,
                'status' => 'Pending',
                'creator_id' => 27,
                'updated_at' => '2024-11-21 02:33:53+00',
                'created_at' => '2024-11-21 02:33:55+00',
            ),
            3 => 
            array (
                'id' => 4,
                'driver_id' => 2,
                'status' => 'Active',
                'creator_id' => 4,
                'updated_at' => '2024-11-21 02:34:11+00',
                'created_at' => '2024-11-21 02:34:13+00',
            ),
            4 => 
            array (
                'id' => 5,
                'driver_id' => 3,
                'status' => 'Pending',
                'creator_id' => 30,
                'updated_at' => '2024-11-21 02:34:33+00',
                'created_at' => '2024-11-21 02:34:35+00',
            ),
            5 => 
            array (
                'id' => 6,
                'driver_id' => 3,
                'status' => 'Active',
                'creator_id' => 10,
                'updated_at' => '2024-11-21 02:34:57+00',
                'created_at' => '2024-11-21 02:34:54+00',
            ),
            6 => 
            array (
                'id' => 7,
                'driver_id' => 4,
                'status' => 'Pending',
                'creator_id' => 30,
                'updated_at' => '2024-11-21 02:35:11+00',
                'created_at' => '2024-11-21 02:35:15+00',
            ),
            7 => 
            array (
                'id' => 8,
                'driver_id' => 4,
                'status' => 'Active',
                'creator_id' => 10,
                'updated_at' => '2024-11-21 02:41:40+00',
                'created_at' => '2024-11-21 02:35:43+00',
            ),
        ));
        
        
    }
}