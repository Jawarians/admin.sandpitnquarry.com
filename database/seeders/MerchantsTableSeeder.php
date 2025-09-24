<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MerchantsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        DB::table('merchants')->delete();
        
        DB::table('merchants')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'SANDPIT N QUARRY SDN. BHD.',
                'registration_number' => 'ABC-123',
                'type' => 'SDN. BHD.',
                'user_id' => 0,
                'creator_id' => 0,
                'created_at' => '2023-11-24 12:25:09',
                'updated_at' => '2023-11-24 12:25:09',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Homestay Krishnamoorthy Sdn Bhd',
                'registration_number' => 'KV 5298 V',
                'type' => 'SDN. BHD.',
                'user_id' => 4,
                'creator_id' => 4,
                'created_at' => '2023-11-24 12:25:09',
                'updated_at' => '2023-11-24 12:25:09',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Celcom Sdn Bhd',
                'registration_number' => 'KV 5630 W',
                'type' => 'SDN. BHD.',
                'user_id' => 5,
                'creator_id' => 5,
                'created_at' => '2023-11-24 12:25:09',
                'updated_at' => '2023-11-24 12:25:09',
            ),
        ));
        
        
    }
}