<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TrucksTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        DB::table('trucks')->insert(array(
            0 =>
            array(
                'id' => 1,
                'registration_plate_number' => 'ABC1234',
                'transporter_id' => 3,
                'creator_id' => 27,
                'updated_at' => '2024-11-21 01:24:07+00',
                'created_at' => '2024-11-21 01:24:11+00',
            ),
            1 =>
            array(
                'id' => 2,
                'registration_plate_number' => 'ABC5678',
                'transporter_id' => 3,
                'creator_id' => 27,
                'updated_at' => '2024-11-21 01:24:35+00',
                'created_at' => '2024-11-21 01:24:41+00',
            ),
            2 =>
            array(
                'id' => 3,
                'registration_plate_number' => 'DEF1234',
                'transporter_id' => 5,
                'creator_id' => 30,
                'updated_at' => '2024-11-21 01:25:03+00',
                'created_at' => '2024-11-21 01:25:05+00',
            ),
            3 =>
            array(
                'id' => 4,
                'registration_plate_number' => 'DEF5678',
                'transporter_id' => 5,
                'creator_id' => 30,
                'updated_at' => '2024-11-21 01:25:28+00',
                'created_at' => '2024-11-21 01:25:31+00',
            ),
            4 =>
            array(
                'id' => 5,
                'registration_plate_number' => 'ABC9012',
                'transporter_id' => 3,
                'creator_id' => 27,
                'updated_at' => '2024-11-21 01:25:55+00',
                'created_at' => '2024-11-21 01:25:58+00',
            ),
            5 =>
            array(
                'id' => 6,
                'registration_plate_number' => 'DEF9012',
                'transporter_id' => 5,
                'creator_id' => 30,
                'updated_at' => '2024-11-21 01:26:17+00',
                'created_at' => '2024-11-21 01:26:19+00',
            ),
            6 =>
            array(
                'id' => 7,
                'registration_plate_number' => 'ABC3456',
                'transporter_id' => 3,
                'creator_id' => 27,
                'updated_at' => '2024-11-21 01:26:56+00',
                'created_at' => '2024-11-21 01:26:58+00',
            ),
            7 =>
            array(
                'id' => 8,
                'registration_plate_number' => 'DEF3456',
                'transporter_id' => 5,
                'creator_id' => 30,
                'updated_at' => '2024-11-21 01:27:12+00',
                'created_at' => '2024-11-21 01:27:15+00',
            ),
        ));
    }
}
