<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TripsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        DB::table('trips')->delete();

        DB::table('trips')->insert(array(
            0 =>
            array(
                'id' => 2,
                'user_id' => 4,
                'job_id' => 4,
                'expected_quantity' => 30000,
                'actual_quantity' => 0,
                'code' => 779186,
                'waiting_minutes' => NULL,
                'creator_id' => 27,
                'updated_at' => now(),
                'created_at' => now(),
                'driver_id' => 1,
                'status' => 'Assigned',
            ),
            1 =>
            array(
                'id' => 4,
                'user_id' => 4,
                'job_id' => 2,
                'expected_quantity' => 40000,
                'actual_quantity' => 0,
                'code' => 467098,
                'waiting_minutes' => NULL,
                'creator_id' => 27,
                'updated_at' => now(),
                'created_at' => now(),
                'driver_id' => 1,
                'status' => 'Assigned',
            ),
            2 =>
            array(
                'id' => 5,
                'user_id' => 4,
                'job_id' => 2,
                'expected_quantity' => 40000,
                'actual_quantity' => 0,
                'code' => 169856,
                'waiting_minutes' => NULL,
                'creator_id' => 27,
                'updated_at' => now(),
                'created_at' => now(),
                'driver_id' => 1,
                'status' => 'Assigned',
            ),
            3 =>
            array(
                'id' => 6,
                'user_id' => 4,
                'job_id' => 2,
                'expected_quantity' => 40000,
                'actual_quantity' => 0,
                'code' => 743898,
                'waiting_minutes' => NULL,
                'creator_id' => 27,
                'updated_at' => now(),
                'created_at' => now(),
                'driver_id' => 1,
                'status' => 'Assigned',
            ),
            4 =>
            array(
                'id' => 7,
                'user_id' => 4,
                'job_id' => 2,
                'expected_quantity' => 40000,
                'actual_quantity' => 0,
                'code' => 938969,
                'waiting_minutes' => NULL,
                'creator_id' => 27,
                'updated_at' => now(),
                'created_at' => now(),
                'driver_id' => 1,
                'status' => 'Assigned',
            ),
            5 =>
            array(
                'id' => 8,
                'user_id' => 4,
                'job_id' => 2,
                'expected_quantity' => 40000,
                'actual_quantity' => 30000,
                'code' => 398882,
                'waiting_minutes' => NULL,
                'creator_id' => 27,
                'updated_at' => now(),
                'created_at' => now(),
                'driver_id' => 1,
                'status' => 'Completed',
            ),
            6 =>
            array(
                'id' => 3,
                'user_id' => 4,
                'job_id' => 4,
                'expected_quantity' => 30000,
                'actual_quantity' => 0,
                'code' => 878256,
                'waiting_minutes' => NULL,
                'creator_id' => 27,
                'updated_at' => now(),
                'created_at' => now(),
                'driver_id' => 1,
                'status' => 'Completed',
            ),
            7 =>
            array(
                'id' => 1,
                'user_id' => 4,
                'job_id' => 4,
                'expected_quantity' => 30000,
                'actual_quantity' => 0,
                'code' => 603388,
                'waiting_minutes' => NULL,
                'creator_id' => 27,
                'updated_at' => now(),
                'created_at' => now(),
                'driver_id' => 1,
                'status' => 'Completed',
            ),
        ));
    }
}
