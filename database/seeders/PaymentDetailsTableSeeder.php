<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentDetailsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        DB::table('payment_details')->delete();
        
        DB::table('payment_details')->insert(array (
            0 => 
            array (
                'id' => 1,
                'payment_id' => 1,
                'status' => 'Pending',
                'creator_id' => 13,
                'created_at' => '2024-05-16 16:49:46',
                'updated_at' => '2024-05-16 16:49:46',
            ),
            1 => 
            array (
                'id' => 2,
                'payment_id' => 2,
                'status' => 'Pending',
                'creator_id' => 13,
                'created_at' => '2024-05-16 21:44:15',
                'updated_at' => '2024-05-16 21:44:15',
            ),
            2 => 
            array (
                'id' => 65,
                'payment_id' => 3,
                'status' => 'Pending',
                'creator_id' => 12,
                'created_at' => '2024-05-20 20:18:29',
                'updated_at' => '2024-05-20 20:18:29',
            ),
            3 => 
            array (
                'id' => 66,
                'payment_id' => 3,
                'status' => 'Approve',
                'creator_id' => 8,
                'created_at' => '2024-05-20 20:20:11',
                'updated_at' => '2024-05-20 20:20:11',
            ),
            4 => 
            array (
                'id' => 67,
                'payment_id' => 4,
                'status' => 'Pending',
                'creator_id' => 12,
                'created_at' => '2024-05-23 15:50:48',
                'updated_at' => '2024-05-23 15:50:48',
            ),
            5 => 
            array (
                'id' => 68,
                'payment_id' => 5,
                'status' => 'Pending',
                'creator_id' => 12,
                'created_at' => '2024-05-23 16:00:53',
                'updated_at' => '2024-05-23 16:00:53',
            ),
            6 => 
            array (
                'id' => 69,
                'payment_id' => 5,
                'status' => 'Approve',
                'creator_id' => 8,
                'created_at' => '2024-05-23 16:02:27',
                'updated_at' => '2024-05-23 16:02:27',
            ),
            7 => 
            array (
                'id' => 70,
                'payment_id' => 4,
                'status' => 'Approve',
                'creator_id' => 8,
                'created_at' => '2024-05-23 16:03:17',
                'updated_at' => '2024-05-23 16:03:17',
            ),
            8 => 
            array (
                'id' => 71,
                'payment_id' => 4,
                'status' => 'Approve',
                'creator_id' => 8,
                'created_at' => '2024-05-23 16:03:17',
                'updated_at' => '2024-05-23 16:03:17',
            ),
            9 => 
            array (
                'id' => 72,
                'payment_id' => 2,
                'status' => 'Approve',
                'creator_id' => 16,
                'created_at' => '2024-05-23 16:25:00',
                'updated_at' => '2024-05-23 16:25:00',
            ),
            10 => 
            array (
                'id' => 73,
                'payment_id' => 2,
                'status' => 'Approve',
                'creator_id' => 16,
                'created_at' => '2024-05-23 16:25:02',
                'updated_at' => '2024-05-23 16:25:02',
            ),
            11 => 
            array (
                'id' => 74,
                'payment_id' => 6,
                'status' => 'Pending',
                'creator_id' => 12,
                'created_at' => '2024-05-27 12:37:24',
                'updated_at' => '2024-05-27 12:37:24',
            ),
            12 => 
            array (
                'id' => 75,
                'payment_id' => 6,
                'status' => 'Approve',
                'creator_id' => 8,
                'created_at' => '2024-05-27 12:48:14',
                'updated_at' => '2024-05-27 12:48:14',
            ),
        ));
        
        
    }
}