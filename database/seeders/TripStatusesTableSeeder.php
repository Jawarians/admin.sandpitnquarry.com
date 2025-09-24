<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TripStatusesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        DB::table('trip_statuses')->delete();

        DB::table('trip_statuses')->insert(array(
            0 =>
            array(
                'status' => 'Accepted',
                'percent' => 10,
                'notification' => true,
                'rgba' => 'rgba(117, 135, 57, 1)',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:33:16+00',
                'created_at' => '2024-07-06 11:33:16+00',
            ),
            1 =>
            array(
                'status' => 'Arrived',
                'percent' => 60,
                'notification' => true,
                'rgba' => 'rgba(92, 161, 59, 1)',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:32:55+00',
                'created_at' => '2024-07-06 11:32:55+00',
            ),
            2 =>
            array(
                'status' => 'Assigned',
                'percent' => 5,
                'notification' => false,
                'rgba' => 'rgba(52, 106, 199, 1)',
                'creator_id' => 0,
                'updated_at' => '2024-10-25 11:52:31+00',
                'created_at' => '2024-10-25 11:52:31+00',
            ),
            3 =>
            array(
                'status' => 'Cancelled',
                'percent' => 0,
                'notification' => false,
                'rgba' => 'rgba(153, 25, 25, 1)',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:32:46+00',
                'created_at' => '2024-07-06 11:32:46+00',
            ),
            4 =>
            array(
                'status' => 'Completed',
                'percent' => 100,
                'notification' => true,
                'rgba' => 'rgba(95, 230, 23, 1)',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:32:31+00',
                'created_at' => '2024-07-06 11:32:31+00',
            ),
            5 =>
            array(
                'status' => 'Confirmed',
                'percent' => 80,
                'notification' => false,
                'rgba' => 'rgba(162, 201, 48, 1)',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:32:05+00',
                'created_at' => '2024-07-06 11:32:05+00',
            ),
            6 =>
            array(
                'status' => 'Loaded',
                'percent' => 25,
                'notification' => true,
                'rgba' => 'rgba(105, 194, 27, 1)',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:34:04+00',
                'created_at' => '2024-07-06 11:34:04+00',
            ),
            7 =>
            array(
                'status' => 'Loading',
                'percent' => 20,
                'notification' => false,
                'rgba' => 'rgba(191, 153, 56, 1)',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:31:46+00',
                'created_at' => '2024-07-06 11:31:46+00',
            ),
            8 =>
            array(
                'status' => 'Nearby',
                'percent' => 50,
                'notification' => false,
                'rgba' => 'rgba(159, 209, 53, 1)',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:31:36+00',
                'created_at' => '2024-07-06 11:31:36+00',
            ),
            9 =>
            array(
                'status' => 'Notified',
                'percent' => 70,
                'notification' => false,
                'rgba' => 'rgba(108, 171, 65, 1)',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:31:28+00',
                'created_at' => '2024-07-06 11:31:28+00',
            ),
            10 =>
            array(
                'status' => 'Ongoing',
                'percent' => 30,
                'notification' => false,
                'rgba' => 'rgba(206, 219, 56, 1)',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:31:21+00',
                'created_at' => '2024-07-06 11:31:21+00',
            ),
            11 =>
            array(
                'status' => 'Released',
                'percent' => 100,
                'notification' => false,
                'rgba' => 'rgba(212, 58, 31, 1)',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:31:05+00',
                'created_at' => '2024-07-06 11:31:05+00',
            ),
            12 =>
            array(
                'status' => 'Started',
                'percent' => 15,
                'notification' => false,
                'rgba' => 'rgba(184, 162, 50, 1)',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:30:30+00',
                'created_at' => '2024-07-06 11:30:30+00',
            ),
            13 =>
            array(
                'status' => 'Terminated',
                'percent' => 0,
                'notification' => false,
                'rgba' => 'rgba(156, 19, 19, 1)',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:30:17+00',
                'created_at' => '2024-07-06 11:30:17+00',
            ),
            14 =>
            array(
                'status' => 'Unloaded',
                'percent' => 90,
                'notification' => false,
                'rgba' => 'rgba(99, 189, 72, 1)',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:29:57+00',
                'created_at' => '2024-07-06 11:29:57+00',
            ),
            15 =>
            array(
                'status' => 'Unloading',
                'percent' => 95,
                'notification' => false,
                'rgba' => 'rgba(90, 214, 84, 1)',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:30:08+00',
                'created_at' => '2024-07-06 11:30:08+00',
            ),
            16 =>
            array(
                'status' => 'Waiting',
                'percent' => 95,
                'notification' => false,
                'rgba' => 'rgba(90, 214, 84, 1)',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:30:08+00',
                'created_at' => '2024-07-06 11:30:08+00',
            ),
            17 =>
            array(
                'status' => 'Terminating',
                'percent' => 95,
                'notification' => false,
                'rgba' => 'rgba(90, 214, 84, 1)',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:30:08+00',
                'created_at' => '2024-07-06 11:30:08+00',
            ),
            18 =>
            array(
                'status' => 'Arriving',
                'percent' => 95,
                'notification' => false,
                'rgba' => 'rgba(90, 214, 84, 1)',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:30:08+00',
                'created_at' => '2024-07-06 11:30:08+00',
            ),
            19 =>
            array(
                'status' => 'Completing',
                'percent' => 95,
                'notification' => false,
                'rgba' => 'rgba(90, 214, 84, 1)',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:30:08+00',
                'created_at' => '2024-07-06 11:30:08+00',
            ),
        ));
    }
}
