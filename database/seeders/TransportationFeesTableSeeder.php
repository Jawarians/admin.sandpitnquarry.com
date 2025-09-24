<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransportationFeesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        DB::table('transportation_fees')->delete();

        DB::table('transportation_fees')->insert(array(
            0 =>
            array(
                'id' => 1,
                'transporter_fee_id' => 1,
                'route_id' => 1,
                'creator_id' => 4,
                'updated_at' => now(),
                'created_at' => now(),
            ),
        ));
    }
}
