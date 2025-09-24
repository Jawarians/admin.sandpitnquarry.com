<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JobsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        DB::table('jobs')->delete();

        DB::table('jobs')->insert(array(
            0 =>
            array(
                'id' => 1,
                'order_id' => 2501070003,
                'transporter_id' => 3,
                'creator_id' => 27,
                'updated_at' => now(),
                'created_at' => now(),
            ),
            1 =>
            array(
                'id' => 3,
                'order_id' => 2501070001,
                'transporter_id' => 3,
                'creator_id' => 27,
                'updated_at' => now(),
                'created_at' => now(),
            ),
            2 =>
            array(
                'id' => 2,
                'order_id' => 2501070003,
                'transporter_id' => 3,
                'creator_id' => 27,
                'updated_at' => now(),
                'created_at' => now(),
            ),
            3 =>
            array(
                'id' => 4,
                'order_id' => 2501070001,
                'transporter_id' => 3,
                'creator_id' => 27,
                'updated_at' => now(),
                'created_at' => now(),
            ),
        ));
    }
}
