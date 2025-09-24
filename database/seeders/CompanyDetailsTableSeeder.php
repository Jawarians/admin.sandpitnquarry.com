<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompanyDetailsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        DB::table('company_details')->delete();
        
        DB::table('company_details')->insert(array (
            0 => 
            array (
                'id' => 1,
                'company_id' => 20,
                'registration_number' => '491920-X',
                'type' => 'SDN. BHD.',
                'active' => false,
                'creator_id' => 20,
                'updated_at' => '2024-11-20 11:35:39+00',
                'created_at' => '2024-11-20 11:35:41+00',
            ),
            1 => 
            array (
                'id' => 2,
                'company_id' => 21,
                'registration_number' => '187529-M',
                'type' => 'SDN. BHD.',
                'active' => true,
                'creator_id' => 22,
                'updated_at' => '2024-11-20 11:36:15+00',
                'created_at' => '2024-11-20 11:36:17+00',
            ),
            2 => 
            array (
                'id' => 3,
                'company_id' => 22,
                'registration_number' => '84131-T',
                'type' => 'SDN.',
                'active' => false,
                'creator_id' => 22,
                'updated_at' => '2024-11-20 11:36:52+00',
                'created_at' => '2024-11-20 11:36:54+00',
            ),
            3 => 
            array (
                'id' => 4,
                'company_id' => 23,
                'registration_number' => '517287-K',
                'type' => 'ENTERPRISE',
                'active' => false,
                'creator_id' => 23,
                'updated_at' => '2024-11-20 11:37:20+00',
                'created_at' => '2024-11-20 11:37:22+00',
            ),
            4 => 
            array (
                'id' => 5,
                'company_id' => 24,
                'registration_number' => '183505-K',
                'type' => 'KOPERASI',
                'active' => false,
                'creator_id' => 24,
                'updated_at' => '2024-11-20 11:37:44+00',
                'created_at' => '2024-11-20 11:37:46+00',
            ),
            5 => 
            array (
                'id' => 6,
                'company_id' => 25,
                'registration_number' => '157476-P',
                'type' => 'LLP / PLT',
                'active' => false,
                'creator_id' => 25,
                'updated_at' => '2024-11-20 11:38:20+00',
                'created_at' => '2024-11-20 11:38:22+00',
            ),
            6 => 
            array (
                'id' => 8,
                'company_id' => 26,
                'registration_number' => '283857-T',
                'type' => 'KELAB / PERSATUAN',
                'active' => false,
                'creator_id' => 26,
                'updated_at' => '2024-11-20 11:38:32+00',
                'created_at' => '2024-11-20 11:38:50+00',
            ),
        ));
        
        
    }
}