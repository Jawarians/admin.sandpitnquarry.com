<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JobDetailsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        DB::table('job_details')->delete();

        DB::table('job_details')->insert(array(
            0 =>
            array(
                'id' => 1,
                'job_id' => 1,
                'quantity' => 4,
                'status' => 'Accepted',
                'creator_id' => 27,
                'updated_at' => now(),
                'created_at' => now(),
            ),
            1 =>
            array(
                'id' => 2,
                'job_id' => 2,
                'quantity' => 5,
                'status' => 'Accepted',
                'creator_id' => 27,
                'updated_at' => now(),
                'created_at' => now(),
            ),
            2 =>
            array(
                'id' => 3,
                'job_id' => 3,
                'quantity' => 4,
                'status' => 'Accepted',
                'creator_id' => 27,
                'updated_at' => now(),
                'created_at' => now(),
            ),
            3 =>
            array(
                'id' => 4,
                'job_id' => 4,
                'quantity' => 3,
                'status' => 'Accepted',
                'creator_id' => 27,
                'updated_at' => now(),
                'created_at' => now(),
            ),
        ));
    }
}
