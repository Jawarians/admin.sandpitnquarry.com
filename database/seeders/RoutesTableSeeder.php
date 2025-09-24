<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoutesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        DB::table('routes')->delete();

        DB::table('routes')->insert(array(
            0 =>
            array(
                'id' => 1,
                'departure_at' => '2025-01-07 10:55:22',
                'origin_latitude' => '3.1196136474609',
                'origin_longitude' => '101.8078994751',
                'origin_addresss' => 'Cornerstone Ulu Langat Batu 14',
                'destination_latitude' => '3.116',
                'destination_longitude' => '101.8136045',
                'destination_addresss' => 'SEKOLAH KEBANGSAAN TUN ABDUL AZIZ MAJID (SKTAAM), JALAN HULU LANGAT, PEKAN BATU 14 HULU LANGAT, HULU LANGAT, SELANGOR, MALAYSIA',
                'traffic_model' => 'best_guess',
                'distance_text' => '1.5 km',
                'distance_value' => 1505,
                'duration_text' => '3 mins',
                'duration_value' => 198,
                'traffic_text' => '3 mins',
                'traffic_value' => 174,
                'creator_id' => 4,
                'updated_at' => now(),
                'created_at' => now(),
            ),
        ));
    }
}
