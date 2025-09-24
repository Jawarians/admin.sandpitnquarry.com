<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransportersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        DB::table('transporters')->insert(array (
            1 => 
            array (
                'id' => 1,
                'name' => 'POKéMON ANGKUT',
                'registration_number' => 'DGC 2215',
                'type' => 'SDN. BHD.',
                'user_id' => 4,
                'sound_notification' => true,
                'creator_id' => 10,
                'updated_at' => '2023-11-24 12:50:08+00',
                'created_at' => '2023-11-24 12:50:08+00',
            ),
            2 => 
            array (
                'id' => 2,
                'name' => 'CEPAT LOGISTIK',
                'registration_number' => 'KV 6311 V',
                'type' => 'SDN. BHD.',
                'user_id' => 5,
                'sound_notification' => true,
                'creator_id' => 5,
                'updated_at' => '2024-07-10 12:05:41+00',
                'created_at' => '2023-11-24 12:50:08+00',
            ),
            3 => 
            array (
                'id' => 3,
                'name' => 'JOYPLUS SDNBHD',
                'registration_number' => '1495117-H',
                'type' => 'SDN. BHD.',
                'user_id' => 27,
                'sound_notification' => true,
                'creator_id' => 27,
                'updated_at' => '2024-07-06 12:16:41+00',
                'created_at' => '2024-03-26 15:20:30+00',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'THIVIYAH & DAYKSHIYAA ENTERPRISE',
                'registration_number' => 'NS0279103-U',
                'type' => 'ENTERPRISE',
                'user_id' => 30,
                'sound_notification' => true,
                'creator_id' => 30,
                'updated_at' => '2024-06-11 12:09:09+00',
                'created_at' => '2024-06-11 12:09:07+00',
            ),
        ));
        
        
    }
}