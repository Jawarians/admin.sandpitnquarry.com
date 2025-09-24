<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContactsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        DB::table('contacts')->delete();
        
        DB::table('contacts')->insert(array (
            0 => 
            array (
                'id' => 1,
                'address_detail_id' => 9,
                'name' => 'ADVANCECON INFRA SDN BHD',
                'country_code' => 'Malaysia',
                'phone' => '60361510310',
                'type' => 'Office',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:33:16+00',
                'created_at' => '2024-07-06 11:33:16+00',
                'fax' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'address_detail_id' => 10,
                'name' => 'ACCORD CONSTRUCTION SDN BHD',
                'country_code' => 'Malaysia',
                'phone' => '60342706688',
                'type' => 'Office',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:32:55+00',
                'created_at' => '2024-07-06 11:32:55+00',
                'fax' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'address_detail_id' => 11,
            'name' => 'ANVE SPORTS (M) SDN BHD',
                'country_code' => 'Malaysia',
                'phone' => '60387373952',
                'type' => 'Office',
                'creator_id' => 0,
                'updated_at' => '2024-10-25 11:52:31+00',
                'created_at' => '2024-10-25 11:52:31+00',
                'fax' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'address_detail_id' => 12,
                'name' => 'ARAH CERGAS SDN BHD',
                'country_code' => 'Malaysia',
                'phone' => '60379822610',
                'type' => 'Office',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:32:46+00',
                'created_at' => '2024-07-06 11:32:46+00',
                'fax' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'address_detail_id' => 13,
                'name' => 'AAY CONSTRUCTION SDN BHD',
                'country_code' => 'Malaysia',
                'phone' => '60361372100',
                'type' => 'Office',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:32:31+00',
                'created_at' => '2024-07-06 11:32:31+00',
                'fax' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'address_detail_id' => 14,
                'name' => 'ARKIBENA SDN BHD',
                'country_code' => 'Malaysia',
                'phone' => '60380628804',
                'type' => 'Office',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:32:05+00',
                'created_at' => '2024-07-06 11:32:05+00',
                'fax' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'address_detail_id' => 15,
                'name' => 'ARKY BINA SDN BHD',
                'country_code' => 'Malaysia',
                'phone' => '60358826130',
                'type' => 'Office',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:34:04+00',
                'created_at' => '2024-07-06 11:34:04+00',
                'fax' => NULL,
            ),
            7 => 
            array (
                'id' => 8,
                'address_detail_id' => 16,
                'name' => 'AIROCOAT ENGINEERING SDN BHD',
                'country_code' => 'Malaysia',
                'phone' => '60356345376',
                'type' => 'Office',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:31:46+00',
                'created_at' => '2024-07-06 11:31:46+00',
                'fax' => NULL,
            ),
            8 => 
            array (
                'id' => 9,
                'address_detail_id' => 17,
                'name' => 'AZIEBINA SDN BHD',
                'country_code' => 'Malaysia',
                'phone' => '60361572839',
                'type' => 'Office',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:31:36+00',
                'created_at' => '2024-07-06 11:31:36+00',
                'fax' => NULL,
            ),
            9 => 
            array (
                'id' => 10,
                'address_detail_id' => 18,
                'name' => 'ASCREST SDN BHD',
                'country_code' => 'Malaysia',
                'phone' => '60351612066',
                'type' => 'Office',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:31:28+00',
                'created_at' => '2024-07-06 11:31:28+00',
                'fax' => NULL,
            ),
            10 => 
            array (
                'id' => 11,
                'address_detail_id' => 19,
                'name' => 'ATHENS PARK SDN BHD',
                'country_code' => 'Malaysia',
                'phone' => '60342918378',
                'type' => 'Office',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:31:21+00',
                'created_at' => '2024-07-06 11:31:21+00',
                'fax' => NULL,
            ),
            11 => 
            array (
                'id' => 12,
                'address_detail_id' => 20,
                'name' => 'ALUNAN ASAS SDN BHD',
                'country_code' => 'Malaysia',
                'phone' => '6043998912',
                'type' => 'Office',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:31:05+00',
                'created_at' => '2024-07-06 11:31:05+00',
                'fax' => NULL,
            ),
            12 => 
            array (
                'id' => 13,
                'address_detail_id' => 21,
                'name' => 'AIMA CONSTRUCTION SDN BHD',
                'country_code' => 'Malaysia',
                'phone' => '60380684331',
                'type' => 'Office',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:30:30+00',
                'created_at' => '2024-07-06 11:30:30+00',
                'fax' => NULL,
            ),
            13 => 
            array (
                'id' => 14,
                'address_detail_id' => 22,
                'name' => 'ARIF BENAR SDN BHD',
                'country_code' => 'Malaysia',
                'phone' => '60378062325',
                'type' => 'Office',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:30:17+00',
                'created_at' => '2024-07-06 11:30:17+00',
                'fax' => NULL,
            ),
            14 => 
            array (
                'id' => 15,
                'address_detail_id' => 23,
                'name' => 'ALLEGIANCE CORPORATION SDN BHD',
                'country_code' => 'Malaysia',
                'phone' => '60378806257',
                'type' => 'Office',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:29:57+00',
                'created_at' => '2024-07-06 11:29:57+00',
                'fax' => NULL,
            ),
            15 => 
            array (
                'id' => 16,
                'address_detail_id' => 24,
                'name' => 'APEX COMMUNICATIONS SDN BHD',
                'country_code' => 'Malaysia',
                'phone' => '60321416341',
                'type' => 'Office',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:30:08+00',
                'created_at' => '2024-07-06 11:30:08+00',
                'fax' => NULL,
            ),
            16 => 
            array (
                'id' => 17,
                'address_detail_id' => 25,
                'name' => 'AMD CONSTRUCTION SDN BHD',
                'country_code' => 'Malaysia',
                'phone' => '60362732772',
                'type' => 'Office',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:30:08+00',
                'created_at' => '2024-07-06 11:30:08+00',
                'fax' => NULL,
            ),
            17 => 
            array (
                'id' => 18,
                'address_detail_id' => 26,
                'name' => 'AWANGSA BINA SDN BHD',
                'country_code' => 'Malaysia',
                'phone' => '60380233703',
                'type' => 'Office',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:30:08+00',
                'created_at' => '2024-07-06 11:30:08+00',
                'fax' => NULL,
            ),
        ));
        
        
    }
}