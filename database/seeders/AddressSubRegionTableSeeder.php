<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AddressSubRegionTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        DB::table('sub_regions')->delete();
        
        DB::table('sub_regions')->insert(array (
            0 => 
            array (
                'name' => 'ALAM IMPIAN',
                'state' => 'SELANGOR',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            1 => 
            array (
                'name' => 'AMAN PERDANA',
                'state' => 'SELANGOR',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            2 => 
            array (
                'name' => 'AMPANG',
                'state' => 'SELANGOR',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            3 => 
            array (
                'name' => 'AMBANG BOTANIC',
                'state' => 'SELANGOR',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            4 => 
            array (
                'name' => 'ARA DAMANSARA',
                'state' => 'SELANGOR',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            5 => 
            array (
                'name' => 'BELAKONG',
                'state' => 'SELANGOR',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            6 => 
            array (
                'name' => 'BANDAR BOTANIC',
                'state' => 'SELANGOR',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            7 => 
            array (
                'name' => 'BANDAR BUKIT RAJA',
                'state' => 'SELANGOR',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            8 => 
            array (
                'name' => 'BANDAR BUKIT TINGGI',
                'state' => 'SELANGOR',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            9 => 
            array (
                'name' => 'BANDAR KINARA',
                'state' => 'SELANGOR',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            10 => 
            array (
                'name' => 'BANDAR MAHKOTA CHERAS',
                'state' => 'SELANGOR',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            11 => 
            array (
                'name' => 'BANDAR PUTERI KLANG',
                'state' => 'SELANGOR',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            12 => 
            array (
                'name' => 'BANDAR PUTERI PUCHONG',
                'state' => 'SELANGOR',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            13 => 
            array (
                'name' => 'BANDAR SAUJANA PUTRA',
                'state' => 'SELANGOR',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            14 => 
            array (
                'name' => 'BANDAR SRI DAMANSARA',
                'state' => 'SELANGOR',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            15 => 
            array (
                'name' => 'BANDAR SUNGAI LONG',
                'state' => 'SELANGOR',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            16 => 
            array (
                'name' => 'BANDAR SUNWAY',
                'state' => 'SELANGOR',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            17 => 
            array (
                'name' => 'BANDAR UTAMA',
                'state' => 'SELANGOR',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            18 => 
            array (
                'name' => 'BANGI',
                'state' => 'SELANGOR',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            19 => 
            array (
                'name' => 'BANTING',
                'state' => 'SELANGOR',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            20 => 
            array (
                'name' => 'BATANG BERJUNTAI',
                'state' => 'SELANGOR',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            21 => 
            array (
                'name' => 'BATANG KALI',
                'state' => 'SELANGOR',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            22 => 
            array (
                'name' => 'BATANG ARANG',
                'state' => 'SELANGOR',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            23 => 
            array (
                'name' => 'BATU CAVES',
                'state' => 'SELANGOR',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            24 => 
            array (
                'name' => 'BERANANG',
                'state' => 'SELANGOR',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            25 => 
            array (
                'name' => 'BUKIT ANTARABANGSA',
                'state' => 'SELANGOR',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            26 => 
            array (
                'name' => 'BUKIT BERUNTUNG',
                'state' => 'SELANGOR',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            27 => 
            array (
                'name' => 'BUKIT JELUTONG',
                'state' => 'SELANGOR',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            28 => 
            array (
                'name' => 'BUKIT RAHMAN PUTRA',
                'state' => 'SELANGOR',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            29 => 
            array (
                'name' => 'BUKIT ROTAN',
                'state' => 'SELANGOR',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            30 => 
            array (
                'name' => 'BUKIT SUBANG',
                'state' => 'SELANGOR',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            31 => 
            array (
                'name' => 'CHERAS',
                'state' => 'SELANGOR',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            32 => 
            array (
                'name' => 'COUNTRY HEIGHTS',
                'state' => 'SELANGOR',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            33 => 
            array (
                'name' => 'CYBERJAYA',
                'state' => 'SELANGOR',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            34 => 
            array (
                'name' => 'DAMANSARA DAMAI',
                'state' => 'SELANGOR',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            35 => 
            array (
                'name' => 'DAMANSARA INTAN',
                'state' => 'SELANGOR',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            36 => 
            array (
                'name' => 'DAMANSARA JAYA',
                'state' => 'SELANGOR',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            37 => 
            array (
                'name' => 'DAMANSARA KIM',
                'state' => 'SELANGOR',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            38 => 
            array (
                'name' => 'DAMANSARA PERDANA',
                'state' => 'SELANGOR',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            39 => 
            array (
                'name' => 'DAMANSARA UTAMA',
                'state' => 'SELANGOR',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            40 => 
            array (
                'name' => 'DENAI ALAM',
                'state' => 'SELANGOR',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            41 => 
            array (
                'name' => 'DENKIL',
                'state' => 'SELANGOR',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            42 => 
            array (
                'name' => 'GLENMARIE',
                'state' => 'SELANGOR',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            43 => 
            array (
                'name' => 'GOMBAK',
                'state' => 'SELANGOR',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            44 => 
            array (
                'name' => 'HULU LANGAT',
                'state' => 'SELANGOR',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            45 => 
            array (
                'name' => 'HULU SELANGOR',
                'state' => 'SELANGOR',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            46 => 
            array (
                'name' => 'I-state',
                'state' => 'SELANGOR',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            47 => 
            array (
                'name' => 'IJOK',
                'state' => 'SELANGOR',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            48 => 
            array (
                'name' => 'JADE HILS',
                'state' => 'SELANGOR',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            49 => 
            array (
                'name' => 'JENJAROM',
                'state' => 'SELANGOR',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            50 => 
            array (
                'name' => 'JERAM',
                'state' => 'SELANGOR',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            51 => 
            array (
                'name' => 'JUGRA',
                'state' => 'SELANGOR',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            52 => 
            array (
                'name' => 'KAJANG',
                'state' => 'SELANGOR',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            53 => 
            array (
                'name' => 'KALUMPANG',
                'state' => 'SELANGOR',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            54 => 
            array (
                'name' => 'KAPAR',
                'state' => 'SELANGOR',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            55 => 
            array (
                'name' => 'KAYU ARA',
                'state' => 'SELANGOR',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            56 => 
            array (
                'name' => 'KELANA JAYA',
                'state' => 'SELANGOR',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            57 => 
            array (
                'name' => 'KERLING',
                'state' => 'SELANGOR',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            58 => 
            array (
                'name' => 'KLANG',
                'state' => 'SELANGOR',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            59 => 
            array (
                'name' => 'KOTA DAMANSARA',
                'state' => 'SELANGOR',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            60 => 
            array (
                'name' => 'KOTA EMERALD',
                'state' => 'SELANGOR',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            61 => 
            array (
                'name' => 'KOTA KEMUNING',
                'state' => 'SELANGOR',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            62 => 
            array (
                'name' => 'KUALA KUBU BARU',
                'state' => 'SELANGOR',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            63 => 
            array (
                'name' => 'KUALA LANGAT',
                'state' => 'SELANGOR',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            64 => 
            array (
                'name' => 'KUALA SELANGOR',
                'state' => 'SELANGOR',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            65 => 
            array (
                'name' => 'KUANG',
                'state' => 'SELANGOR',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            66 => 
            array (
                'name' => 'KUNDANG',
                'state' => 'SELANGOR',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            67 => 
            array (
                'name' => 'MUTIARA DAMANSARA',
                'state' => 'SELANGOR',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            68 => 
            array (
                'name' => 'NILAI',
                'state' => 'SELANGOR',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            69 => 
            array (
                'name' => 'PANDAMARAN',
                'state' => 'SELANGOR',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            70 => 
            array (
                'name' => 'PETALING JAYA',
                'state' => 'SELANGOR',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            71 => 
            array (
                'name' => 'PORT KLANG',
                'state' => 'SELANGOR',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            72 => 
            array (
                'name' => 'PUCHONG',
                'state' => 'SELANGOR',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            73 => 
            array (
                'name' => 'PUCHONG SOUTH',
                'state' => 'SELANGOR',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            74 => 
            array (
                'name' => 'PULAU INDAH',
                'state' => 'SELANGOR',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            75 => 
            array (
                'name' => 'PULAU CAREY',
                'state' => 'SELANGOR',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            76 => 
            array (
                'name' => 'PULAU KETAM',
                'state' => 'SELANGOR',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            77 => 
            array (
                'name' => 'PUNCAK ALAM',
                'state' => 'SELANGOR',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            78 => 
            array (
                'name' => 'PUNCAK JALIL',
                'state' => 'SELANGOR',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            79 => 
            array (
                'name' => 'PUTRA HEIGHTS',
                'state' => 'SELANGOR',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            80 => 
            array (
                'name' => 'RASA',
                'state' => 'SELANGOR',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            81 => 
            array (
                'name' => 'RAWANG',
                'state' => 'SELANGOR',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            82 => 
            array (
                'name' => 'SABAK BERNAM',
                'state' => 'SELANGOR',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            83 => 
            array (
                'name' => 'SALAK TINGGI',
                'state' => 'SELANGOR',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            84 => 
            array (
                'name' => 'SAUJANA',
                'state' => 'SELANGOR',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            85 => 
            array (
                'name' => 'SAUJANA UTAMA',
                'state' => 'SELANGOR',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            86 => 
            array (
                'name' => 'SEKINCHAN',
                'state' => 'SELANGOR',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            87 => 
            array (
                'name' => 'SELAYANG',
                'state' => 'SELANGOR',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            88 => 
            array (
                'name' => 'SEMENYIH',
                'state' => 'SELANGOR',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            89 => 
            array (
                'name' => 'SEPANG',
                'state' => 'SELANGOR',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            90 => 
            array (
                'name' => 'SERDANG',
                'state' => 'SELANGOR',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            91 => 
            array (
                'name' => 'SERENDAAH',
                'state' => 'SELANGOR',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            92 => 
            array (
                'name' => 'SERI KEMBANGAN',
                'state' => 'SELANGOR',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            93 => 
            array (
                'name' => 'SETIA ALAM',
                'state' => 'SELANGOR',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            94 => 
            array (
                'name' => 'SETIA ECO PARK',
                'state' => 'SELANGOR',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            95 => 
            array (
                'name' => 'SHAH ALAM',
                'state' => 'SELANGOR',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            96 => 
            array (
                'name' => 'SIERRA MAS',
                'state' => 'SELANGOR',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            97 => 
            array (
                'name' => 'SS2',
                'state' => 'SELANGOR',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            98 => 
            array (
                'name' => 'SUBANG BESTARI',
                'state' => 'SELANGOR',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            99 => 
            array (
                'name' => 'SUBANG HEIGHTS',
                'state' => 'SELANGOR',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            100 => 
            array (
                'name' => 'SUBANG JAYA',
                'state' => 'SELANGOR',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            101 => 
            array (
                'name' => 'SUBANG PERDANA',
                'state' => 'SELANGOR',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            102 => 
            array (
                'name' => 'SUNGAI AYER TAWAR',
                'state' => 'SELANGOR',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            103 => 
            array (
                'name' => 'SUNGAI BESAR',
                'state' => 'SELANGOR',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            104 => 
            array (
                'name' => 'SUNGAI BULOH',
                'state' => 'SELANGOR',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            105 => 
            array (
                'name' => 'SUNGAI GUMUT',
                'state' => 'SELANGOR',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            106 => 
            array (
                'name' => 'SUNGAI PANJANG',
                'state' => 'SELANGOR',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            107 => 
            array (
                'name' => 'SUNGAI PELEK',
                'state' => 'SELANGOR',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            108 => 
            array (
                'name' => 'TAMAN TTDI JAYA',
                'state' => 'SELANGOR',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            109 => 
            array (
                'name' => 'TANJONG DUABELAS',
                'state' => 'SELANGOR',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            110 => 
            array (
                'name' => 'TANJONG KARANG',
                'state' => 'SELANGOR',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            111 => 
            array (
                'name' => 'TANJONG SEPAT',
                'state' => 'SELANGOR',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            112 => 
            array (
                'name' => 'TELOK PANGLIMA GARANG',
                'state' => 'SELANGOR',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            113 => 
            array (
                'name' => 'TROPICANA',
                'state' => 'SELANGOR',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            114 => 
            array (
                'name' => 'ULU BERNAM',
                'state' => 'SELANGOR',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            115 => 
            array (
                'name' => 'ULU KLANG',
                'state' => 'SELANGOR',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            116 => 
            array (
                'name' => 'ULU YAM',
                'state' => 'SELANGOR',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            117 => 
            array (
                'name' => 'USJ',
                'state' => 'SELANGOR',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            118 => 
            array (
                'name' => 'USJ HEIGHTS',
                'state' => 'SELANGOR',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            119 => 
            array (
                'name' => 'VALENCIA',
                'state' => 'SELANGOR',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            120 => 
            array (
                'name' => 'PUTRAJAYA',
                'state' => 'WP PUTRAJAYA',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            121 => 
            array (
                'name' => 'AMPANG HILIR',
                'state' => 'WP KUALA LUMPUR',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            122 => 
            array (
                'name' => 'BANDAR DAMAI PERDANA',
                'state' => 'WP KUALA LUMPUR',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            123 => 
            array (
                'name' => 'BANDAR MENJALARA',
                'state' => 'WP KUALA LUMPUR',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            124 => 
            array (
                'name' => 'BANDAR TASIK SELATAN',
                'state' => 'WP KUALA LUMPUR',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            125 => 
            array (
                'name' => 'BANGSAR',
                'state' => 'WP KUALA LUMPUR',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            126 => 
            array (
                'name' => 'BANGSAR SOUTH',
                'state' => 'WP KUALA LUMPUR',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            127 => 
            array (
                'name' => 'BATU',
                'state' => 'WP KUALA LUMPUR',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            128 => 
            array (
                'name' => 'BRICKFIELDS',
                'state' => 'WP KUALA LUMPUR',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            129 => 
            array (
                'name' => 'BUKIT BINTANG',
                'state' => 'WP KUALA LUMPUR',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            130 => 
            array (
                'name' => 'BUKIT JALIL',
                'state' => 'WP KUALA LUMPUR',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            131 => 
            array (
                'name' => 'BUKIT KIARA',
                'state' => 'WP KUALA LUMPUR',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            132 => 
            array (
                'name' => 'BUKIT LEDANG',
                'state' => 'WP KUALA LUMPUR',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            133 => 
            array (
                'name' => 'BUKIT PERSEKUTUAN',
                'state' => 'WP KUALA LUMPUR',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            134 => 
            array (
                'name' => 'BUKIT TUNKU',
                'state' => 'WP KUALA LUMPUR',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            135 => 
            array (
                'name' => 'CHAN SOW LIN',
                'state' => 'WP KUALA LUMPUR',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            136 => 
            array (
                'name' => 'CITY CENTRE',
                'state' => 'WP KUALA LUMPUR',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            137 => 
            array (
                'name' => 'COUNTRY HEIGHTS DAMANSARA',
                'state' => 'WP KUALA LUMPUR',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            138 => 
            array (
                'name' => 'DAMANSARA',
                'state' => 'WP KUALA LUMPUR',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            139 => 
            array (
                'name' => 'DAMANSARA HEIGHTS',
                'state' => 'WP KUALA LUMPUR',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            140 => 
            array (
                'name' => 'DESA PANDAN',
                'state' => 'WP KUALA LUMPUR',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            141 => 
            array (
                'name' => 'DESA PARKCITY',
                'state' => 'WP KUALA LUMPUR',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            142 => 
            array (
                'name' => 'DESA PETALING',
                'state' => 'WP KUALA LUMPUR',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            143 => 
            array (
                'name' => 'FEDERAL HILL',
                'state' => 'WP KUALA LUMPUR',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            144 => 
            array (
                'name' => 'JALAN IPOH',
                'state' => 'WP KUALA LUMPUR',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            145 => 
            array (
                'name' => 'JALAN KUCHING',
                'state' => 'WP KUALA LUMPUR',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            146 => 
            array (
                'name' => 'JALAN SULTAN ISMAIL',
                'state' => 'WP KUALA LUMPUR',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            147 => 
            array (
                'name' => 'JINJANG',
                'state' => 'WP KUALA LUMPUR',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            148 => 
            array (
                'name' => 'KENNY HILLS',
                'state' => 'WP KUALA LUMPUR',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            149 => 
            array (
                'name' => 'KAMPUNG BARU',
                'state' => 'WP KUALA LUMPUR',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            150 => 
            array (
                'name' => 'KEPONG',
                'state' => 'WP KUALA LUMPUR',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            151 => 
            array (
                'name' => 'KERAMAT',
                'state' => 'WP KUALA LUMPUR',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            152 => 
            array (
                'name' => 'KL CITY',
                'state' => 'WP KUALA LUMPUR',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            153 => 
            array (
                'name' => 'KL ECO CITY',
                'state' => 'WP KUALA LUMPUR',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            154 => 
            array (
                'name' => 'KL SENTRAL',
                'state' => 'WP KUALA LUMPUR',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            155 => 
            array (
                'name' => 'KLCC',
                'state' => 'WP KUALA LUMPUR',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            156 => 
            array (
                'name' => 'KUCHAI LAMA',
                'state' => 'WP KUALA LUMPUR',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            157 => 
            array (
                'name' => 'MID VALLEY CITY',
                'state' => 'WP KUALA LUMPUR',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            158 => 
            array (
                'name' => 'MONT KIARA',
                'state' => 'WP KUALA LUMPUR',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            159 => 
            array (
                'name' => 'OLD KLANG ROAD',
                'state' => 'WP KUALA LUMPUR',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            160 => 
            array (
                'name' => 'OUG',
                'state' => 'WP KUALA LUMPUR',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            161 => 
            array (
                'name' => 'PANDAN PERDANA',
                'state' => 'WP KUALA LUMPUR',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            162 => 
            array (
                'name' => 'PANDAN INDAH',
                'state' => 'WP KUALA LUMPUR',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            163 => 
            array (
                'name' => 'PANDAN JAYA',
                'state' => 'WP KUALA LUMPUR',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            164 => 
            array (
                'name' => 'PEKAN BATU',
                'state' => 'WP KUALA LUMPUR',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            165 => 
            array (
                'name' => 'PUDU',
                'state' => 'WP KUALA LUMPUR',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            166 => 
            array (
                'name' => 'SALAK SELATAN',
                'state' => 'WP KUALA LUMPUR',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            167 => 
            array (
                'name' => 'SEGAMBUT',
                'state' => 'WP KUALA LUMPUR',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            168 => 
            array (
                'name' => 'SENTUL',
                'state' => 'WP KUALA LUMPUR',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            169 => 
            array (
                'name' => 'SEPUTEH',
                'state' => 'WP KUALA LUMPUR',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            170 => 
            array (
                'name' => 'SETAPAK',
                'state' => 'WP KUALA LUMPUR',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            171 => 
            array (
                'name' => 'SETIAWANGSA',
                'state' => 'WP KUALA LUMPUR',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            172 => 
            array (
                'name' => 'SOLARIS DUTAMAS',
                'state' => 'WP KUALA LUMPUR',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            173 => 
            array (
                'name' => 'SRI DAMANSARA',
                'state' => 'WP KUALA LUMPUR',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            174 => 
            array (
                'name' => 'SRI HARTAMAS',
                'state' => 'WP KUALA LUMPUR',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            175 => 
            array (
                'name' => 'SRI PETALING',
                'state' => 'WP KUALA LUMPUR',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            176 => 
            array (
                'name' => 'SUNGAI BESI',
                'state' => 'WP KUALA LUMPUR',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            177 => 
            array (
                'name' => 'SUNGAI PENCHALA',
                'state' => 'WP KUALA LUMPUR',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            178 => 
            array (
                'name' => 'SUNWAY SPK',
                'state' => 'WP KUALA LUMPUR',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            179 => 
            array (
                'name' => 'TAMAN DESA',
                'state' => 'WP KUALA LUMPUR',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            180 => 
            array (
                'name' => 'TAMAN DUTA',
                'state' => 'WP KUALA LUMPUR',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            181 => 
            array (
                'name' => 'TAMAN MELAWATI',
                'state' => 'WP KUALA LUMPUR',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            182 => 
            array (
                'name' => 'TAMAN TUN DR ISMAIL',
                'state' => 'WP KUALA LUMPUR',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            183 => 
            array (
                'name' => 'TAMAN PERMATA',
                'state' => 'WP KUALA LUMPUR',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            184 => 
            array (
                'name' => 'TITIWANGSA',
                'state' => 'WP KUALA LUMPUR',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            185 => 
            array (
                'name' => 'TPM',
                'state' => 'WP KUALA LUMPUR',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            186 => 
            array (
                'name' => 'WANGSA MAJU',
                'state' => 'WP KUALA LUMPUR',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            187 => 
            array (
                'name' => 'AMPANGAN',
                'state' => 'NEGERI SEMBILAN',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            188 => 
            array (
                'name' => 'BAHAU',
                'state' => 'NEGERI SEMBILAN',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            189 => 
            array (
                'name' => 'BANDAR BARU ENSTEK',
                'state' => 'NEGERI SEMBILAN',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            190 => 
            array (
                'name' => 'BANDAR BARU SERTING',
                'state' => 'NEGERI SEMBILAN',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            191 => 
            array (
                'name' => 'BANDAR SRI SENDAYAN',
                'state' => 'NEGERI SEMBILAN',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            192 => 
            array (
                'name' => 'BATANG MELAKA',
                'state' => 'NEGERI SEMBILAN',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            193 => 
            array (
                'name' => 'BATU KIKIR',
                'state' => 'NEGERI SEMBILAN',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            194 => 
            array (
                'name' => 'BUKIT KEPAYANG',
                'state' => 'NEGERI SEMBILAN',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            195 => 
            array (
                'name' => 'GEMAS',
                'state' => 'NEGERI SEMBILAN',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            196 => 
            array (
                'name' => 'GEMENCHEH',
                'state' => 'NEGERI SEMBILAN',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            197 => 
            array (
                'name' => 'JELEBU',
                'state' => 'NEGERI SEMBILAN',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            198 => 
            array (
                'name' => 'JEMPOL',
                'state' => 'NEGERI SEMBILAN',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            199 => 
            array (
                'name' => 'JIMAH',
                'state' => 'NEGERI SEMBILAN',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            200 => 
            array (
                'name' => 'JOHOL',
                'state' => 'NEGERI SEMBILAN',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            201 => 
            array (
                'name' => 'JUASSEH',
                'state' => 'NEGERI SEMBILAN',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            202 => 
            array (
                'name' => 'KOTA',
                'state' => 'NEGERI SEMBILAN',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            203 => 
            array (
                'name' => 'KUALA KLAWANG',
                'state' => 'NEGERI SEMBILAN',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            204 => 
            array (
                'name' => 'KUALA PILAH',
                'state' => 'NEGERI SEMBILAN',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            205 => 
            array (
                'name' => 'LABU',
                'state' => 'NEGERI SEMBILAN',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            206 => 
            array (
                'name' => 'LENGGENG',
                'state' => 'NEGERI SEMBILAN',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            207 => 
            array (
                'name' => 'LINGGI',
                'state' => 'NEGERI SEMBILAN',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            208 => 
            array (
                'name' => 'LUKUT',
                'state' => 'NEGERI SEMBILAN',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            209 => 
            array (
                'name' => 'MANTIN',
                'state' => 'NEGERI SEMBILAN',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            210 => 
            array (
                'name' => 'PANTAI',
                'state' => 'NEGERI SEMBILAN',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            211 => 
            array (
                'name' => 'PAROI',
                'state' => 'NEGERI SEMBILAN',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            212 => 
            array (
                'name' => 'PASIR PANJANG',
                'state' => 'NEGERI SEMBILAN',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            213 => 
            array (
                'name' => 'PEDAS',
                'state' => 'NEGERI SEMBILAN',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            214 => 
            array (
                'name' => 'PORT DICKSON',
                'state' => 'NEGERI SEMBILAN',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            215 => 
            array (
                'name' => 'RANTAU',
                'state' => 'NEGERI SEMBILAN',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            216 => 
            array (
                'name' => 'RASAH',
                'state' => 'NEGERI SEMBILAN',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            217 => 
            array (
                'name' => 'REMBAU',
                'state' => 'NEGERI SEMBILAN',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            218 => 
            array (
                'name' => 'ROMPIN',
                'state' => 'NEGERI SEMBILAN',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            219 => 
            array (
                'name' => 'SENAWANG',
                'state' => 'NEGERI SEMBILAN',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            220 => 
            array (
                'name' => 'SEREMBAN',
                'state' => 'NEGERI SEMBILAN',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            221 => 
            array (
                'name' => 'SEREMBAN 2',
                'state' => 'NEGERI SEMBILAN',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            222 => 
            array (
                'name' => 'SIKAMAT',
                'state' => 'NEGERI SEMBILAN',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            223 => 
            array (
                'name' => 'SILIAU',
                'state' => 'NEGERI SEMBILAN',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            224 => 
            array (
                'name' => 'SIMPANG DURIAN',
                'state' => 'NEGERI SEMBILAN',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            225 => 
            array (
                'name' => 'SIMPANG PERTANG',
                'state' => 'NEGERI SEMBILAN',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            226 => 
            array (
                'name' => 'SRI MENANTI',
                'state' => 'NEGERI SEMBILAN',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            227 => 
            array (
                'name' => 'SRI RUSA',
                'state' => 'NEGERI SEMBILAN',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            228 => 
            array (
                'name' => 'TAMPIN',
                'state' => 'NEGERI SEMBILAN',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            229 => 
            array (
                'name' => 'TANJONG IPOH',
                'state' => 'NEGERI SEMBILAN',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            230 => 
            array (
                'name' => 'TELOK KEMANG',
                'state' => 'NEGERI SEMBILAN',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
            231 => 
            array (
                'name' => 'TITI',
                'state' => 'NEGERI SEMBILAN',
                'creator_id' => 0,
                'created_at' => '2023-05-30 09:23:51',
                'updated_at' => '2023-05-30 09:23:51',
            ),
        ));
        
        
    }
}