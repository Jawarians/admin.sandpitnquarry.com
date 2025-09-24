<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DriversTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        DB::table('drivers')->insert(array(
            0 =>
            array(
                'id' => 1,
                'user_id' => 28,
                'transporter_id' => 3,
                'sound_notification' => true,
                'creator_id' => 27,
                'updated_at' => '2024-11-20 12:15:01+00',
                'created_at' => '2024-11-20 12:15:04+00',
            ),
            1 =>
            array(
                'id' => 2,
                'user_id' => 29,
                'transporter_id' => 3,
                'sound_notification' => true,
                'creator_id' => 27,
                'updated_at' => '2024-11-20 12:15:21+00',
                'created_at' => '2024-11-20 12:15:23+00',
            ),
            2 =>
            array(
                'id' => 3,
                'user_id' => 31,
                'transporter_id' => 5,
                'sound_notification' => true,
                'creator_id' => 30,
                'updated_at' => '2024-11-20 12:15:41+00',
                'created_at' => '2024-11-20 12:15:43+00',
            ),
            3 =>
            array(
                'id' => 4,
                'user_id' => 32,
                'transporter_id' => 5,
                'sound_notification' => true,
                'creator_id' => 30,
                'updated_at' => '2024-11-20 12:16:02+00',
                'created_at' => '2024-11-20 12:16:03+00',
            ),
        ));
    }
}
