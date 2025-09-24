<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AddressStatesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        DB::table('address_states')->delete();
        
        DB::table('address_states')->insert(array (
            0 => 
            array (
                'name' => 'JOHOR',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            1 => 
            array (
                'name' => 'KEDAH',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            2 => 
            array (
                'name' => 'KELANTAN',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            3 => 
            array (
                'name' => 'MELAKA',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            4 => 
            array (
                'name' => 'NEGERI SEMBILAN',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            5 => 
            array (
                'name' => 'PAHANG',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            6 => 
            array (
                'name' => 'PERAK',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            7 => 
            array (
                'name' => 'PERLIS',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            8 => 
            array (
                'name' => 'PULAU PINANG',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            9 => 
            array (
                'name' => 'SABAH',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            10 => 
            array (
                'name' => 'SARAWAK',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            11 => 
            array (
                'name' => 'SELANGOR',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            12 => 
            array (
                'name' => 'TERENGGANU',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            13 => 
            array (
                'name' => 'WP KUALA LUMPUR',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            14 => 
            array (
                'name' => 'WP LABUAN',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            15 => 
            array (
                'name' => 'WP PUTRAJAYA',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            16 => 
            array (
                'name' => 'FEDERAL TERRITORY OF KUALA LUMPUR',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            17 => 
            array (
                'name' => 'WILAYAH PERSEKUTUAN KUALA LUMPUR',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
        ));
        
        
    }
}