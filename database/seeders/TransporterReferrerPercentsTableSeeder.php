<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransporterReferrerPercentsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        DB::table('transporter_referrer_percents')->delete();

        DB::table('transporter_referrer_percents')->insert(array(
            0 =>
            array(
                'id' => 1,
                'percent' => '15',
                'start_at' => '2023-10-10 04:57:26',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
        ));
    }
}
