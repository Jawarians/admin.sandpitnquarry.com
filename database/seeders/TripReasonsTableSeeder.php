<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TripReasonsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        DB::table('trip_reasons')->delete();
        
        DB::table('trip_reasons')->insert(array (
            0 => 
            array (
                'id' => 1,
                'trip_id' => 21,
                'trip_reasonable_id' => 1,
                'trip_reasonable_type' => 'termination',
                'creator_id' => 3458,
                'created_at' => '2024-05-09 16:15:15',
                'updated_at' => '2024-05-09 16:15:15',
            ),
            1 => 
            array (
                'id' => 2,
                'trip_id' => 43,
                'trip_reasonable_id' => 2,
                'trip_reasonable_type' => 'termination',
                'creator_id' => 3460,
                'created_at' => '2024-05-10 16:01:50',
                'updated_at' => '2024-05-10 16:01:50',
            ),
            2 => 
            array (
                'id' => 3,
                'trip_id' => 39,
                'trip_reasonable_id' => 2,
                'trip_reasonable_type' => 'termination',
                'creator_id' => 3460,
                'created_at' => '2024-05-10 16:02:05',
                'updated_at' => '2024-05-10 16:02:05',
            ),
            3 => 
            array (
                'id' => 4,
                'trip_id' => 54,
                'trip_reasonable_id' => 1,
                'trip_reasonable_type' => 'termination',
                'creator_id' => 3458,
                'created_at' => '2024-05-11 10:40:48',
                'updated_at' => '2024-05-11 10:40:48',
            ),
            4 => 
            array (
                'id' => 5,
                'trip_id' => 58,
                'trip_reasonable_id' => 1,
                'trip_reasonable_type' => 'termination',
                'creator_id' => 3462,
                'created_at' => '2024-05-11 13:07:57',
                'updated_at' => '2024-05-11 13:07:57',
            ),
            5 => 
            array (
                'id' => 6,
                'trip_id' => 57,
                'trip_reasonable_id' => 2,
                'trip_reasonable_type' => 'termination',
                'creator_id' => 3461,
                'created_at' => '2024-05-11 16:13:10',
                'updated_at' => '2024-05-11 16:13:10',
            ),
            6 => 
            array (
                'id' => 7,
                'trip_id' => 37,
                'trip_reasonable_id' => 3,
                'trip_reasonable_type' => 'termination',
                'creator_id' => 3462,
                'created_at' => '2024-05-12 00:29:01',
                'updated_at' => '2024-05-12 00:29:01',
            ),
            7 => 
            array (
                'id' => 8,
                'trip_id' => 55,
                'trip_reasonable_id' => 2,
                'trip_reasonable_type' => 'termination',
                'creator_id' => 3460,
                'created_at' => '2024-05-13 14:24:12',
                'updated_at' => '2024-05-13 14:24:12',
            ),
            8 => 
            array (
                'id' => 9,
                'trip_id' => 64,
                'trip_reasonable_id' => 2,
                'trip_reasonable_type' => 'termination',
                'creator_id' => 3460,
                'created_at' => '2024-05-14 15:25:09',
                'updated_at' => '2024-05-14 15:25:09',
            ),
            9 => 
            array (
                'id' => 10,
                'trip_id' => 75,
                'trip_reasonable_id' => 2,
                'trip_reasonable_type' => 'termination',
                'creator_id' => 3461,
                'created_at' => '2024-05-15 16:45:59',
                'updated_at' => '2024-05-15 16:45:59',
            ),
            10 => 
            array (
                'id' => 11,
                'trip_id' => 82,
                'trip_reasonable_id' => 2,
                'trip_reasonable_type' => 'termination',
                'creator_id' => 3461,
                'created_at' => '2024-05-15 16:46:30',
                'updated_at' => '2024-05-15 16:46:30',
            ),
            11 => 
            array (
                'id' => 12,
                'trip_id' => 50,
                'trip_reasonable_id' => 2,
                'trip_reasonable_type' => 'termination',
                'creator_id' => 3460,
                'created_at' => '2024-05-16 06:37:48',
                'updated_at' => '2024-05-16 06:37:48',
            ),
            12 => 
            array (
                'id' => 13,
                'trip_id' => 84,
                'trip_reasonable_id' => 2,
                'trip_reasonable_type' => 'termination',
                'creator_id' => 3460,
                'created_at' => '2024-05-17 08:18:52',
                'updated_at' => '2024-05-17 08:18:52',
            ),
            13 => 
            array (
                'id' => 14,
                'trip_id' => 81,
                'trip_reasonable_id' => 1,
                'trip_reasonable_type' => 'termination',
                'creator_id' => 3458,
                'created_at' => '2024-05-17 09:11:48',
                'updated_at' => '2024-05-17 09:11:48',
            ),
            14 => 
            array (
                'id' => 15,
                'trip_id' => 97,
                'trip_reasonable_id' => 2,
                'trip_reasonable_type' => 'termination',
                'creator_id' => 3460,
                'created_at' => '2024-05-21 05:07:33',
                'updated_at' => '2024-05-21 05:07:33',
            ),
            15 => 
            array (
                'id' => 16,
                'trip_id' => 92,
                'trip_reasonable_id' => 2,
                'trip_reasonable_type' => 'termination',
                'creator_id' => 3461,
                'created_at' => '2024-05-23 06:05:45',
                'updated_at' => '2024-05-23 06:05:45',
            ),
            16 => 
            array (
                'id' => 17,
                'trip_id' => 120,
                'trip_reasonable_id' => 2,
                'trip_reasonable_type' => 'termination',
                'creator_id' => 3461,
                'created_at' => '2024-05-29 10:49:13',
                'updated_at' => '2024-05-29 10:49:13',
            ),
            17 => 
            array (
                'id' => 18,
                'trip_id' => 126,
                'trip_reasonable_id' => 2,
                'trip_reasonable_type' => 'termination',
                'creator_id' => 3460,
                'created_at' => '2024-05-30 04:29:20',
                'updated_at' => '2024-05-30 04:29:20',
            ),
            18 => 
            array (
                'id' => 19,
                'trip_id' => 138,
                'trip_reasonable_id' => 2,
                'trip_reasonable_type' => 'termination',
                'creator_id' => 3460,
                'created_at' => '2024-06-01 04:43:24',
                'updated_at' => '2024-06-01 04:43:24',
            ),
            19 => 
            array (
                'id' => 20,
                'trip_id' => 164,
                'trip_reasonable_id' => 1,
                'trip_reasonable_type' => 'termination',
                'creator_id' => 3459,
                'created_at' => '2024-06-10 19:44:06',
                'updated_at' => '2024-06-10 19:44:06',
            ),
            20 => 
            array (
                'id' => 21,
                'trip_id' => 165,
                'trip_reasonable_id' => 1,
                'trip_reasonable_type' => 'termination',
                'creator_id' => 3459,
                'created_at' => '2024-06-10 19:48:21',
                'updated_at' => '2024-06-10 19:48:21',
            ),
            21 => 
            array (
                'id' => 22,
                'trip_id' => 166,
                'trip_reasonable_id' => 1,
                'trip_reasonable_type' => 'termination',
                'creator_id' => 3459,
                'created_at' => '2024-06-11 07:54:55',
                'updated_at' => '2024-06-11 07:54:55',
            ),
            22 => 
            array (
                'id' => 23,
                'trip_id' => 167,
                'trip_reasonable_id' => 2,
                'trip_reasonable_type' => 'termination',
                'creator_id' => 3459,
                'created_at' => '2024-06-11 07:58:42',
                'updated_at' => '2024-06-11 07:58:42',
            ),
            23 => 
            array (
                'id' => 24,
                'trip_id' => 163,
                'trip_reasonable_id' => 2,
                'trip_reasonable_type' => 'termination',
                'creator_id' => 3461,
                'created_at' => '2024-06-14 03:58:47',
                'updated_at' => '2024-06-14 03:58:47',
            ),
            24 => 
            array (
                'id' => 25,
                'trip_id' => 121,
                'trip_reasonable_id' => 2,
                'trip_reasonable_type' => 'termination',
                'creator_id' => 3462,
                'created_at' => '2024-06-15 22:41:49',
                'updated_at' => '2024-06-15 22:41:49',
            ),
            25 => 
            array (
                'id' => 26,
                'trip_id' => 179,
                'trip_reasonable_id' => 1,
                'trip_reasonable_type' => 'termination',
                'creator_id' => 3462,
                'created_at' => '2024-06-20 15:33:43',
                'updated_at' => '2024-06-20 15:33:43',
            ),
            26 => 
            array (
                'id' => 27,
                'trip_id' => 186,
                'trip_reasonable_id' => 1,
                'trip_reasonable_type' => 'termination',
                'creator_id' => 3462,
                'created_at' => '2024-06-20 15:44:00',
                'updated_at' => '2024-06-20 15:44:00',
            ),
            27 => 
            array (
                'id' => 28,
                'trip_id' => 191,
                'trip_reasonable_id' => 4,
                'trip_reasonable_type' => 'termination',
                'creator_id' => 3471,
                'created_at' => '2024-06-21 09:42:14',
                'updated_at' => '2024-06-21 09:42:14',
            ),
            28 => 
            array (
                'id' => 29,
                'trip_id' => 192,
                'trip_reasonable_id' => 4,
                'trip_reasonable_type' => 'termination',
                'creator_id' => 3462,
                'created_at' => '2024-06-21 11:58:58',
                'updated_at' => '2024-06-21 11:58:58',
            ),
            29 => 
            array (
                'id' => 30,
                'trip_id' => 195,
                'trip_reasonable_id' => 4,
                'trip_reasonable_type' => 'termination',
                'creator_id' => 3462,
                'created_at' => '2024-06-21 14:00:36',
                'updated_at' => '2024-06-21 14:00:36',
            ),
            30 => 
            array (
                'id' => 31,
                'trip_id' => 198,
                'trip_reasonable_id' => 4,
                'trip_reasonable_type' => 'termination',
                'creator_id' => 3471,
                'created_at' => '2024-06-21 18:35:42',
                'updated_at' => '2024-06-21 18:35:42',
            ),
        ));
        
        
    }
}