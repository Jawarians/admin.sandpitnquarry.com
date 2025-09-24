<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SitesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        DB::table('sites')->delete();
        
        DB::table('sites')->insert(array (
            0 => 
            array (
                'id' => 0,
                'name' => 'No Site',
                'address' => 'No. 123, Jalan ABC',
                'postcode' => 0,
                'city' => 'KLANG',
                'state' => 'SELANGOR',
                'latitude' => '0',
                'longitude' => '0',
                'country_code' => 'Malaysia',
                'phone' => '60166188621',
                'merchant_id' => 1,
                'creator_id' => 0,
                'created_at' => '2023-11-24 12:25:09',
                'updated_at' => '2023-11-24 12:25:09',
            ),
            1 => 
            array (
                'id' => 1,
                'name' => 'YP Bina',
                'address' => '47000, 47000 KUANG, Selangor',
                'postcode' => 47000,
                'city' => 'KUANG',
                'state' => 'SELANGOR',
                'latitude' => '3.2543921',
                'longitude' => '101.5695302',
                'country_code' => 'Malaysia',
                'phone' => '60166188621',
                'merchant_id' => 1,
                'creator_id' => 0,
                'created_at' => '2023-11-24 12:25:09',
                'updated_at' => '2023-11-24 12:25:09',
            ),
            2 => 
            array (
                'id' => 2,
                'name' => 'Ang Cheng HO Quarry Sg. Long Batu 11',
                'address' => '8190, Jalan Kuari Sungai Long, 43100 Hulu Langat, SELANGOR',
                'postcode' => 43100,
                'city' => 'HULU LANGAT',
                'state' => 'SELANGOR',
                'latitude' => '3.0828759670258',
                'longitude' => '101.81510162354',
                'country_code' => 'Malaysia',
                'phone' => '60101234567',
                'merchant_id' => 1,
                'creator_id' => 4,
                'created_at' => '2023-11-24 12:25:09',
                'updated_at' => '2023-11-24 12:25:09',
            ),
            3 => 
            array (
                'id' => 3,
                'name' => 'Cornerstone Ulu Langat Batu 14',
                'address' => 'Ulu Langat, Batu 14, 43100 Hulu Langat, SELANGOR',
                'postcode' => 43100,
                'city' => 'HULU LANGAT',
                'state' => 'SELANGOR',
                'latitude' => '3.1196136474609',
                'longitude' => '101.8078994751',
                'country_code' => 'Malaysia',
                'phone' => '60101234567',
                'merchant_id' => 1,
                'creator_id' => 4,
                'created_at' => '2023-11-24 12:25:09',
                'updated_at' => '2023-11-24 12:25:09',
            ),
            4 => 
            array (
                'id' => 4,
                'name' => 'RCJ Mineral UNISEL',
                'address' => 'Ulu Tinggi, 45500, SELANGOR',
                'postcode' => 45500,
                'city' => 'BESTARI JAYA',
                'state' => 'SELANGOR',
                'latitude' => '3.42079',
                'longitude' => '101.4127311',
                'country_code' => 'Malaysia',
                'phone' => '60101234567',
                'merchant_id' => 1,
                'creator_id' => 4,
                'created_at' => '2023-11-24 12:25:09',
                'updated_at' => '2023-11-24 12:25:09',
            ),
            5 => 
            array (
                'id' => 5,
                'name' => 'Daxia Blok G UNISEL',
                'address' => 'Ulu Tinggi, 45500, SELANGOR',
                'postcode' => 45500,
                'city' => 'BESTARI JAYA',
                'state' => 'SELANGOR',
                'latitude' => '3.4415218830109',
                'longitude' => '101.43360137939',
                'country_code' => 'Malaysia',
                'phone' => '60101234567',
                'merchant_id' => 1,
                'creator_id' => 4,
                'created_at' => '2023-11-24 12:25:09',
                'updated_at' => '2023-11-24 12:25:09',
            ),
            6 => 
            array (
                'id' => 6,
                'name' => 'Daxia Blok F UNISEL',
                'address' => 'Ulu Tinggi, 45500, SELANGOR',
                'postcode' => 45500,
                'city' => 'BESTARI JAYA',
                'state' => 'SELANGOR',
                'latitude' => '3.4419364929199',
                'longitude' => '101.43997192383',
                'country_code' => 'Malaysia',
                'phone' => '60101234567',
                'merchant_id' => 1,
                'creator_id' => 4,
                'created_at' => '2023-11-24 12:25:09',
                'updated_at' => '2023-11-24 12:25:09',
            ),
            7 => 
            array (
                'id' => 7,
                'name' => 'Hasil Perangsang UNISEL',
                'address' => 'Ulu Tinggi, 45500, SELANGOR',
                'postcode' => 45500,
                'city' => 'BESTARI JAYA',
                'state' => 'SELANGOR',
                'latitude' => '3.4420647',
                'longitude' => '101.4496364',
                'country_code' => 'Malaysia',
                'phone' => '60101234567',
                'merchant_id' => 1,
                'creator_id' => 4,
                'created_at' => '2023-11-24 12:25:09',
                'updated_at' => '2023-11-24 12:25:09',
            ),
            8 => 
            array (
                'id' => 8,
                'name' => 'KL Larut Blok B UNISEL',
                'address' => 'Ulu Tinggi, 45500, SELANGOR',
                'postcode' => 45500,
                'city' => 'BESTARI JAYA',
                'state' => 'SELANGOR',
                'latitude' => '3.4380977153778',
                'longitude' => '101.4371109',
                'country_code' => 'Malaysia',
                'phone' => '60101234567',
                'merchant_id' => 1,
                'creator_id' => 4,
                'created_at' => '2023-11-24 12:25:09',
                'updated_at' => '2023-11-24 12:25:09',
            ),
            9 => 
            array (
                'id' => 9,
                'name' => 'Kao Fong',
                'address' => '47000 KUANG, SELANGOR',
                'postcode' => 47000,
                'city' => 'KUANG',
                'state' => 'SELANGOR',
                'latitude' => '3.2543868',
                'longitude' => '101.5744011',
                'country_code' => 'Malaysia',
                'phone' => '60101234567',
                'merchant_id' => 1,
                'creator_id' => 4,
                'created_at' => '2023-11-24 12:25:09',
                'updated_at' => '2023-11-24 12:25:09',
            ),
            10 => 
            array (
                'id' => 10,
                'name' => 'Quarry CNY KUANG',
                'address' => 'CNY QUARRY, 47000 KUANG, SELANGOR',
                'postcode' => 47000,
                'city' => 'KUANG',
                'state' => 'SELANGOR',
                'latitude' => '3.2543868',
                'longitude' => '101.5744011',
                'country_code' => 'Malaysia',
                'phone' => '60111234567',
                'merchant_id' => 1,
                'creator_id' => 5,
                'created_at' => '2023-11-24 12:25:09',
                'updated_at' => '2023-11-24 12:25:09',
            ),
            11 => 
            array (
                'id' => 11,
                'name' => 'Quarry Hanson Sungai Buloh KUANG',
                'address' => 'Sg. Buloh Quarry,Jln DBI 18, Taman Desa Bukit Indah, 47000 Sungai Buloh, SELANGOR',
                'postcode' => 47000,
                'city' => 'KUANG',
                'state' => 'SELANGOR',
                'latitude' => '3.2366074',
                'longitude' => '101.5739485',
                'country_code' => 'Malaysia',
                'phone' => '60111234567',
                'merchant_id' => 1,
                'creator_id' => 5,
                'created_at' => '2023-11-24 12:25:09',
                'updated_at' => '2023-11-24 12:25:09',
            ),
            12 => 
            array (
                'id' => 12,
                'name' => 'Quarry Hanson Rawang',
                'address' => '47000 Rawang, SELANGOR',
                'postcode' => 47000,
                'city' => 'RAWANG',
                'state' => 'SELANGOR',
                'latitude' => '3.2920463',
                'longitude' => '101.6022873',
                'country_code' => 'Malaysia',
                'phone' => '60111234567',
                'merchant_id' => 1,
                'creator_id' => 5,
                'created_at' => '2023-11-24 12:25:09',
                'updated_at' => '2023-11-24 12:25:09',
            ),
            13 => 
            array (
                'id' => 13,
                'name' => 'Kuari Permata',
                'address' => 'LATAR, 48000 Rawang, Selangor',
                'postcode' => 47000,
                'city' => 'RAWANG',
                'state' => 'SELANGOR',
                'latitude' => '3.2941108',
                'longitude' => '101.6041603',
                'country_code' => 'Malaysia',
                'phone' => '60360914889',
                'merchant_id' => 1,
                'creator_id' => 0,
                'created_at' => '2023-11-24 12:25:09',
                'updated_at' => '2023-11-24 12:25:09',
            ),
        ));
        
        DB::update("alter table sites ENABLE ROW LEVEL SECURITY;");        
        DB::update('create policy "Enable read access for all users" on "public"."sites" as PERMISSIVE for SELECT to public using (true);'); 
    }
}