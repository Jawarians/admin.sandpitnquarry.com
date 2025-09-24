<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomerReferrersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        DB::table('customer_referrers')->delete();
        
        DB::table('customer_referrers')->insert(array (
            0 => 
            array (
                'id' => 1,
                'user_id' => 893,
                'customer_referrer_percent_id' => 1,
                'percent' => 5,
                'creator_id' => 3462,
                'created_at' => '2024-05-11 12:53:31',
                'updated_at' => '2024-05-11 12:53:31',
            ),
            1 => 
            array (
                'id' => 2,
                'user_id' => 893,
                'customer_referrer_percent_id' => 1,
                'percent' => 5,
                'creator_id' => 3462,
                'created_at' => '2024-05-13 13:29:51',
                'updated_at' => '2024-05-13 13:29:51',
            ),
            2 => 
            array (
                'id' => 3,
                'user_id' => 1506,
                'customer_referrer_percent_id' => 1,
                'percent' => 5,
                'creator_id' => 3460,
                'created_at' => '2024-05-13 16:08:49',
                'updated_at' => '2024-05-13 16:08:49',
            ),
            3 => 
            array (
                'id' => 4,
                'user_id' => 1506,
                'customer_referrer_percent_id' => 1,
                'percent' => 5,
                'creator_id' => 3461,
                'created_at' => '2024-05-13 16:24:21',
                'updated_at' => '2024-05-13 16:24:21',
            ),
            4 => 
            array (
                'id' => 5,
                'user_id' => 893,
                'customer_referrer_percent_id' => 1,
                'percent' => 5,
                'creator_id' => 3462,
                'created_at' => '2024-05-13 16:51:56',
                'updated_at' => '2024-05-13 16:51:56',
            ),
            5 => 
            array (
                'id' => 6,
                'user_id' => 3463,
                'customer_referrer_percent_id' => 1,
                'percent' => 5,
                'creator_id' => 3461,
                'created_at' => '2024-05-14 08:33:40',
                'updated_at' => '2024-05-14 08:33:40',
            ),
            6 => 
            array (
                'id' => 7,
                'user_id' => 3391,
                'customer_referrer_percent_id' => 1,
                'percent' => 5,
                'creator_id' => 3460,
                'created_at' => '2024-05-14 10:17:43',
                'updated_at' => '2024-05-14 10:17:43',
            ),
            7 => 
            array (
                'id' => 8,
                'user_id' => 2484,
                'customer_referrer_percent_id' => 1,
                'percent' => 5,
                'creator_id' => 3458,
                'created_at' => '2024-05-14 14:35:07',
                'updated_at' => '2024-05-14 14:35:07',
            ),
            8 => 
            array (
                'id' => 9,
                'user_id' => 893,
                'customer_referrer_percent_id' => 1,
                'percent' => 5,
                'creator_id' => 3462,
                'created_at' => '2024-05-14 16:54:22',
                'updated_at' => '2024-05-14 16:54:22',
            ),
            9 => 
            array (
                'id' => 10,
                'user_id' => 1506,
                'customer_referrer_percent_id' => 1,
                'percent' => 5,
                'creator_id' => 3460,
                'created_at' => '2024-05-14 17:26:39',
                'updated_at' => '2024-05-14 17:26:39',
            ),
            10 => 
            array (
                'id' => 11,
                'user_id' => 1506,
                'customer_referrer_percent_id' => 1,
                'percent' => 5,
                'creator_id' => 3458,
                'created_at' => '2024-05-14 17:44:35',
                'updated_at' => '2024-05-14 17:44:35',
            ),
            11 => 
            array (
                'id' => 12,
                'user_id' => 2484,
                'customer_referrer_percent_id' => 1,
                'percent' => 5,
                'creator_id' => 3461,
                'created_at' => '2024-05-15 14:01:03',
                'updated_at' => '2024-05-15 14:01:03',
            ),
            12 => 
            array (
                'id' => 13,
                'user_id' => 893,
                'customer_referrer_percent_id' => 1,
                'percent' => 5,
                'creator_id' => 3460,
                'created_at' => '2024-05-16 06:39:10',
                'updated_at' => '2024-05-16 06:39:10',
            ),
            13 => 
            array (
                'id' => 14,
                'user_id' => 2484,
                'customer_referrer_percent_id' => 1,
                'percent' => 5,
                'creator_id' => 3461,
                'created_at' => '2024-05-16 09:04:16',
                'updated_at' => '2024-05-16 09:04:16',
            ),
            14 => 
            array (
                'id' => 15,
                'user_id' => 893,
                'customer_referrer_percent_id' => 1,
                'percent' => 5,
                'creator_id' => 3462,
                'created_at' => '2024-05-16 13:25:01',
                'updated_at' => '2024-05-16 13:25:01',
            ),
            15 => 
            array (
                'id' => 16,
                'user_id' => 3465,
                'customer_referrer_percent_id' => 1,
                'percent' => 5,
                'creator_id' => 3458,
                'created_at' => '2024-05-17 10:30:49',
                'updated_at' => '2024-05-17 10:30:49',
            ),
            16 => 
            array (
                'id' => 17,
                'user_id' => 2473,
                'customer_referrer_percent_id' => 1,
                'percent' => 5,
                'creator_id' => 3460,
                'created_at' => '2024-05-17 10:53:15',
                'updated_at' => '2024-05-17 10:53:15',
            ),
            17 => 
            array (
                'id' => 18,
                'user_id' => 2484,
                'customer_referrer_percent_id' => 1,
                'percent' => 5,
                'creator_id' => 3460,
                'created_at' => '2024-05-18 06:11:57',
                'updated_at' => '2024-05-18 06:11:57',
            ),
            18 => 
            array (
                'id' => 19,
                'user_id' => 1085,
                'customer_referrer_percent_id' => 1,
                'percent' => 5,
                'creator_id' => 3461,
                'created_at' => '2024-05-23 07:30:40',
                'updated_at' => '2024-05-23 07:30:40',
            ),
            19 => 
            array (
                'id' => 20,
                'user_id' => 1085,
                'customer_referrer_percent_id' => 1,
                'percent' => 5,
                'creator_id' => 3461,
                'created_at' => '2024-05-23 17:09:08',
                'updated_at' => '2024-05-23 17:09:08',
            ),
            20 => 
            array (
                'id' => 21,
                'user_id' => 2484,
                'customer_referrer_percent_id' => 1,
                'percent' => 5,
                'creator_id' => 3461,
                'created_at' => '2024-05-24 14:40:37',
                'updated_at' => '2024-05-24 14:40:37',
            ),
            21 => 
            array (
                'id' => 22,
                'user_id' => 1085,
                'customer_referrer_percent_id' => 1,
                'percent' => 5,
                'creator_id' => 3461,
                'created_at' => '2024-05-24 17:49:21',
                'updated_at' => '2024-05-24 17:49:21',
            ),
            22 => 
            array (
                'id' => 23,
                'user_id' => 2484,
                'customer_referrer_percent_id' => 1,
                'percent' => 5,
                'creator_id' => 3460,
                'created_at' => '2024-05-25 08:11:07',
                'updated_at' => '2024-05-25 08:11:07',
            ),
            23 => 
            array (
                'id' => 24,
                'user_id' => 1530,
                'customer_referrer_percent_id' => 1,
                'percent' => 5,
                'creator_id' => 3461,
                'created_at' => '2024-05-25 12:54:46',
                'updated_at' => '2024-05-25 12:54:46',
            ),
            24 => 
            array (
                'id' => 25,
                'user_id' => 1085,
                'customer_referrer_percent_id' => 1,
                'percent' => 5,
                'creator_id' => 3460,
                'created_at' => '2024-05-27 18:28:09',
                'updated_at' => '2024-05-27 18:28:09',
            ),
            25 => 
            array (
                'id' => 26,
                'user_id' => 2484,
                'customer_referrer_percent_id' => 1,
                'percent' => 5,
                'creator_id' => 3460,
                'created_at' => '2024-05-28 08:05:26',
                'updated_at' => '2024-05-28 08:05:26',
            ),
            26 => 
            array (
                'id' => 27,
                'user_id' => 893,
                'customer_referrer_percent_id' => 1,
                'percent' => 5,
                'creator_id' => 3460,
                'created_at' => '2024-05-28 12:21:13',
                'updated_at' => '2024-05-28 12:21:13',
            ),
            27 => 
            array (
                'id' => 28,
                'user_id' => 2484,
                'customer_referrer_percent_id' => 1,
                'percent' => 5,
                'creator_id' => 3461,
                'created_at' => '2024-05-29 10:58:39',
                'updated_at' => '2024-05-29 10:58:39',
            ),
            28 => 
            array (
                'id' => 29,
                'user_id' => 893,
                'customer_referrer_percent_id' => 1,
                'percent' => 5,
                'creator_id' => 3461,
                'created_at' => '2024-05-29 14:22:17',
                'updated_at' => '2024-05-29 14:22:17',
            ),
            29 => 
            array (
                'id' => 30,
                'user_id' => 1085,
                'customer_referrer_percent_id' => 1,
                'percent' => 5,
                'creator_id' => 3461,
                'created_at' => '2024-05-29 16:58:15',
                'updated_at' => '2024-05-29 16:58:15',
            ),
            30 => 
            array (
                'id' => 31,
                'user_id' => 2484,
                'customer_referrer_percent_id' => 1,
                'percent' => 5,
                'creator_id' => 3460,
                'created_at' => '2024-05-30 06:04:18',
                'updated_at' => '2024-05-30 06:04:18',
            ),
            31 => 
            array (
                'id' => 32,
                'user_id' => 1085,
                'customer_referrer_percent_id' => 1,
                'percent' => 5,
                'creator_id' => 3461,
                'created_at' => '2024-05-30 16:11:25',
                'updated_at' => '2024-05-30 16:11:25',
            ),
            32 => 
            array (
                'id' => 33,
                'user_id' => 2484,
                'customer_referrer_percent_id' => 1,
                'percent' => 5,
                'creator_id' => 3460,
                'created_at' => '2024-06-01 05:49:06',
                'updated_at' => '2024-06-01 05:49:06',
            ),
            33 => 
            array (
                'id' => 34,
                'user_id' => 1085,
                'customer_referrer_percent_id' => 1,
                'percent' => 5,
                'creator_id' => 3460,
                'created_at' => '2024-06-04 10:21:16',
                'updated_at' => '2024-06-04 10:21:16',
            ),
            34 => 
            array (
                'id' => 35,
                'user_id' => 2491,
                'customer_referrer_percent_id' => 1,
                'percent' => 5,
                'creator_id' => 3461,
                'created_at' => '2024-06-04 10:33:31',
                'updated_at' => '2024-06-04 10:33:31',
            ),
            35 => 
            array (
                'id' => 36,
                'user_id' => 2491,
                'customer_referrer_percent_id' => 1,
                'percent' => 5,
                'creator_id' => 3460,
                'created_at' => '2024-06-04 10:53:39',
                'updated_at' => '2024-06-04 10:53:39',
            ),
            36 => 
            array (
                'id' => 37,
                'user_id' => 2484,
                'customer_referrer_percent_id' => 1,
                'percent' => 5,
                'creator_id' => 3460,
                'created_at' => '2024-06-05 05:46:16',
                'updated_at' => '2024-06-05 05:46:16',
            ),
            37 => 
            array (
                'id' => 38,
                'user_id' => 1085,
                'customer_referrer_percent_id' => 1,
                'percent' => 5,
                'creator_id' => 3461,
                'created_at' => '2024-06-06 07:18:37',
                'updated_at' => '2024-06-06 07:18:37',
            ),
            38 => 
            array (
                'id' => 39,
                'user_id' => 2491,
                'customer_referrer_percent_id' => 1,
                'percent' => 5,
                'creator_id' => 3461,
                'created_at' => '2024-06-10 12:09:59',
                'updated_at' => '2024-06-10 12:09:59',
            ),
            39 => 
            array (
                'id' => 40,
                'user_id' => 2491,
                'customer_referrer_percent_id' => 1,
                'percent' => 5,
                'creator_id' => 3461,
                'created_at' => '2024-06-14 08:24:08',
                'updated_at' => '2024-06-14 08:24:08',
            ),
            40 => 
            array (
                'id' => 41,
                'user_id' => 1387,
                'customer_referrer_percent_id' => 1,
                'percent' => 5,
                'creator_id' => 3461,
                'created_at' => '2024-06-14 15:32:56',
                'updated_at' => '2024-06-14 15:32:56',
            ),
            41 => 
            array (
                'id' => 42,
                'user_id' => 2491,
                'customer_referrer_percent_id' => 1,
                'percent' => 5,
                'creator_id' => 3471,
                'created_at' => '2024-06-20 08:28:26',
                'updated_at' => '2024-06-20 08:28:26',
            ),
            42 => 
            array (
                'id' => 43,
                'user_id' => 2491,
                'customer_referrer_percent_id' => 1,
                'percent' => 5,
                'creator_id' => 3471,
                'created_at' => '2024-06-20 13:36:15',
                'updated_at' => '2024-06-20 13:36:15',
            ),
            43 => 
            array (
                'id' => 44,
                'user_id' => 2491,
                'customer_referrer_percent_id' => 1,
                'percent' => 5,
                'creator_id' => 3470,
                'created_at' => '2024-06-20 13:59:01',
                'updated_at' => '2024-06-20 13:59:01',
            ),
            44 => 
            array (
                'id' => 45,
                'user_id' => 2491,
                'customer_referrer_percent_id' => 1,
                'percent' => 5,
                'creator_id' => 3470,
                'created_at' => '2024-06-20 14:16:14',
                'updated_at' => '2024-06-20 14:16:14',
            ),
            45 => 
            array (
                'id' => 46,
                'user_id' => 1085,
                'customer_referrer_percent_id' => 1,
                'percent' => 5,
                'creator_id' => 3470,
                'created_at' => '2024-06-20 16:29:57',
                'updated_at' => '2024-06-20 16:29:57',
            ),
            46 => 
            array (
                'id' => 47,
                'user_id' => 893,
                'customer_referrer_percent_id' => 1,
                'percent' => 5,
                'creator_id' => 3471,
                'created_at' => '2024-06-21 11:50:51',
                'updated_at' => '2024-06-21 11:50:51',
            ),
            47 => 
            array (
                'id' => 48,
                'user_id' => 2491,
                'customer_referrer_percent_id' => 1,
                'percent' => 5,
                'creator_id' => 3470,
                'created_at' => '2024-06-22 07:29:55',
                'updated_at' => '2024-06-22 07:29:55',
            ),
            48 => 
            array (
                'id' => 49,
                'user_id' => 2491,
                'customer_referrer_percent_id' => 1,
                'percent' => 5,
                'creator_id' => 3471,
                'created_at' => '2024-06-22 10:13:05',
                'updated_at' => '2024-06-22 10:13:05',
            ),
            49 => 
            array (
                'id' => 50,
                'user_id' => 3194,
                'customer_referrer_percent_id' => 1,
                'percent' => 5,
                'creator_id' => 3470,
                'created_at' => '2024-06-22 10:18:51',
                'updated_at' => '2024-06-22 10:18:51',
            ),
            50 => 
            array (
                'id' => 51,
                'user_id' => 3194,
                'customer_referrer_percent_id' => 1,
                'percent' => 5,
                'creator_id' => 3471,
                'created_at' => '2024-06-22 12:19:39',
                'updated_at' => '2024-06-22 12:19:39',
            ),
        ));
        
        
    }
}