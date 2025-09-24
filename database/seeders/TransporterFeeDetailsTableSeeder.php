<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransporterFeeDetailsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        DB::table('transporter_fee_details')->delete();

        DB::table('transporter_fee_details')->insert(array(
            0 =>
            array(
                'id' => 1,
                'transporter_fee_id' => 1,
                'start' => 0,
                'duration' => 1,
                'charge' => 70,
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            1 =>
            array(
                'id' => 2,
                'transporter_fee_id' => 1,
                'start' => 10,
                'duration' => 3,
                'charge' => 70,
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            2 =>
            array(
                'id' => 3,
                'transporter_fee_id' => 1,
                'start' => 25,
                'duration' => 5,
                'charge' => 70,
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
        ));
    }
}
