<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WhatsAppPhoneNumbersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        DB::table('whats_app_phone_numbers')->delete();

        DB::table('whats_app_phone_numbers')->insert(array(
            0 =>
            array(
                'phone_number' => '16315551181',
                'admin' => false,
                'created_at' => '2024-05-11 13:04:11',
                'updated_at' => '2024-05-11 13:04:11',
            ),
            1 =>
            array(
                'phone_number' => '16505551111',
                'admin' => false,
                'created_at' => '2024-05-11 13:04:11',
                'updated_at' => '2024-05-11 13:04:11',
            ),
            2 =>
            array(
                'phone_number' => '60102986268',
                'admin' => false,
                'created_at' => '2024-05-11 11:22:39',
                'updated_at' => '2024-05-11 11:22:39',
            ),
            3 =>
            array(
                'phone_number' => '60103231996',
                'admin' => false,
                'created_at' => '2024-05-10 13:32:22',
                'updated_at' => '2024-05-10 13:32:22',
            ),
            4 =>
            array(
                'phone_number' => '601112105466',
                'admin' => false,
                'created_at' => '2024-04-21 19:12:59',
                'updated_at' => '2024-04-21 19:12:59',
            ),
            5 =>
            array(
                'phone_number' => '601123216372',
                'admin' => false,
                'created_at' => '2024-04-18 21:52:35',
                'updated_at' => '2024-04-18 21:52:35',
            ),
            6 =>
            array(
                'phone_number' => '60123230173',
                'admin' => false,
                'created_at' => '2024-05-10 16:43:08',
                'updated_at' => '2024-05-10 16:43:08',
            ),
            7 =>
            array(
                'phone_number' => '60123795785',
                'admin' => false,
                'created_at' => '2024-05-10 17:05:12',
                'updated_at' => '2024-05-10 17:05:12',
            ),
            8 =>
            array(
                'phone_number' => '60123799178',
                'admin' => false,
                'created_at' => '2024-05-10 09:56:14',
                'updated_at' => '2024-05-10 09:56:14',
            ),
            9 =>
            array(
                'phone_number' => '60132465607',
                'admin' => false,
                'created_at' => '2024-04-24 13:49:34',
                'updated_at' => '2024-04-24 13:49:34',
            ),
            10 =>
            array(
                'phone_number' => '60162875842',
                'admin' => false,
                'created_at' => '2024-04-24 11:47:23',
                'updated_at' => '2024-04-24 11:47:23',
            ),
            11 =>
            array(
                'phone_number' => '60163680453',
                'admin' => false,
                'created_at' => '2024-04-29 21:25:15',
                'updated_at' => '2024-04-29 21:25:15',
            ),
            12 =>
            array(
                'phone_number' => '60166188169',
                'admin' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            13 =>
            array(
                'phone_number' => '60166540894',
                'admin' => false,
                'created_at' => '2024-04-30 11:53:40',
                'updated_at' => '2024-04-30 11:53:40',
            ),
            14 =>
            array(
                'phone_number' => '60182853942',
                'admin' => false,
                'created_at' => '2024-05-12 12:23:36',
                'updated_at' => '2024-05-12 12:23:36',
            ),
            15 =>
            array(
                'phone_number' => '60320885400',
                'admin' => false,
                'created_at' => '2024-05-14 11:36:14',
                'updated_at' => '2024-05-14 11:36:14',
            ),
            16 =>
            array(
                'phone_number' => '60163676610',
                'admin' => false,
                'created_at' => '2024-06-20 15:28:35',
                'updated_at' => '2024-06-20 15:28:35',
            ),
        ));
    }
}
