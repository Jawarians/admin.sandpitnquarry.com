<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ZonesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        DB::table('zones')->delete();

        DB::table('zones')->insert(array(
            0 =>
            array(
                'id' => 0,
                'user_id' => 0,
                'name' => 'No Site',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            1 =>
            array(
                'id' => 1,
                'user_id' => 0,
                'name' => 'Bandar Tun Razak',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            2 =>
            array(
                'id' => 2,
                'user_id' => 0,
                'name' => 'Bangsar',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            3 =>
            array(
                'id' => 3,
                'user_id' => 0,
                'name' => 'Batu',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            4 =>
            array(
                'id' => 4,
                'user_id' => 0,
                'name' => 'Brickfields',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            5 =>
            array(
                'id' => 5,
                'user_id' => 0,
                'name' => 'Bukit Bintang',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            6 =>
            array(
                'id' => 6,
                'user_id' => 0,
                'name' => 'Bukit Jalil',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            7 =>
            array(
                'id' => 7,
                'user_id' => 0,
                'name' => 'Cheras',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            8 =>
            array(
                'id' => 8,
                'user_id' => 0,
                'name' => 'Jinjang',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            9 =>
            array(
                'id' => 9,
                'user_id' => 0,
                'name' => 'Kepong',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            10 =>
            array(
                'id' => 10,
                'user_id' => 0,
                'name' => 'Lembah Pantai',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            11 =>
            array(
                'id' => 11,
                'user_id' => 0,
                'name' => 'Pudu',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            12 =>
            array(
                'id' => 12,
                'user_id' => 0,
                'name' => 'Segambut',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            13 =>
            array(
                'id' => 13,
                'user_id' => 0,
                'name' => 'Seputeh',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            14 =>
            array(
                'id' => 14,
                'user_id' => 0,
                'name' => 'Setapak',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            15 =>
            array(
                'id' => 15,
                'user_id' => 0,
                'name' => 'Titiwangsa',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            16 =>
            array(
                'id' => 16,
                'user_id' => 0,
                'name' => 'Wangsa Maju',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            17 =>
            array(
                'id' => 17,
                'user_id' => 0,
                'name' => 'Nilai',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            18 =>
            array(
                'id' => 18,
                'user_id' => 0,
                'name' => 'Putrajaya',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            19 =>
            array(
                'id' => 19,
                'user_id' => 0,
                'name' => 'Alam Budiman',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            20 =>
            array(
                'id' => 20,
                'user_id' => 0,
                'name' => 'Alam Impian',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            21 =>
            array(
                'id' => 21,
                'user_id' => 0,
                'name' => 'Aman Perdana',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            22 =>
            array(
                'id' => 22,
                'user_id' => 0,
                'name' => 'Ambang Botanic',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            23 =>
            array(
                'id' => 23,
                'user_id' => 0,
                'name' => 'Ampang',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            24 =>
            array(
                'id' => 24,
                'user_id' => 0,
                'name' => 'Ara Damansara',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            25 =>
            array(
                'id' => 25,
                'user_id' => 0,
                'name' => 'Balakong',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            26 =>
            array(
                'id' => 26,
                'user_id' => 0,
                'name' => 'Bandar Baru Klang',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            27 =>
            array(
                'id' => 27,
                'user_id' => 0,
                'name' => 'Bandar Botanic',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            28 =>
            array(
                'id' => 28,
                'user_id' => 0,
                'name' => 'Bandar Bukit Raja',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            29 =>
            array(
                'id' => 29,
                'user_id' => 0,
                'name' => 'Bandar Bukit Tinggi',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            30 =>
            array(
                'id' => 30,
                'user_id' => 0,
                'name' => 'Bandar Kinrara',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            31 =>
            array(
                'id' => 31,
                'user_id' => 0,
                'name' => 'Bandar Mahkota Cheras',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            32 =>
            array(
                'id' => 32,
                'user_id' => 0,
                'name' => 'Bandar Puteri Klang',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            33 =>
            array(
                'id' => 33,
                'user_id' => 0,
                'name' => 'Bandar Puteri Puchong',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            34 =>
            array(
                'id' => 34,
                'user_id' => 0,
                'name' => 'Bandar Saujana Putra (Jenjarom)',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            35 =>
            array(
                'id' => 35,
                'user_id' => 0,
                'name' => 'Bandar Sri Damansara',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            36 =>
            array(
                'id' => 36,
                'user_id' => 0,
                'name' => 'Bandar Sungai Long',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            37 =>
            array(
                'id' => 37,
                'user_id' => 0,
                'name' => 'Bandar Sunway',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            38 =>
            array(
                'id' => 38,
                'user_id' => 0,
                'name' => 'Bandar Utama',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            39 =>
            array(
                'id' => 39,
                'user_id' => 0,
                'name' => 'Bangi',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            40 =>
            array(
                'id' => 40,
                'user_id' => 0,
                'name' => 'Banting',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            41 =>
            array(
                'id' => 41,
                'user_id' => 0,
                'name' => 'Batang Berjuntai',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            42 =>
            array(
                'id' => 42,
                'user_id' => 0,
                'name' => 'Batang Kali',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            43 =>
            array(
                'id' => 43,
                'user_id' => 0,
                'name' => 'Batu Arang',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            44 =>
            array(
                'id' => 44,
                'user_id' => 0,
                'name' => 'Batu Caves',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            45 =>
            array(
                'id' => 45,
                'user_id' => 0,
                'name' => 'Batu Tiga',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            46 =>
            array(
                'id' => 46,
                'user_id' => 0,
                'name' => 'Beranang',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            47 =>
            array(
                'id' => 47,
                'user_id' => 0,
                'name' => 'Bukit Antarabangsa',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            48 =>
            array(
                'id' => 48,
                'user_id' => 0,
                'name' => 'Bukit Beruntung',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            49 =>
            array(
                'id' => 49,
                'user_id' => 0,
                'name' => 'Bukit Jelutong',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            50 =>
            array(
                'id' => 50,
                'user_id' => 0,
                'name' => 'Bukit Rahman Putra',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            51 =>
            array(
                'id' => 51,
                'user_id' => 0,
                'name' => 'Bukit Rotan',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            52 =>
            array(
                'id' => 52,
                'user_id' => 0,
                'name' => 'Bukit Subang',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            53 =>
            array(
                'id' => 53,
                'user_id' => 0,
                'name' => 'Broga Hill',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            54 =>
            array(
                'id' => 54,
                'user_id' => 0,
                'name' => 'Cheras',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            55 =>
            array(
                'id' => 55,
                'user_id' => 0,
                'name' => 'Country Heights Kajang',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            56 =>
            array(
                'id' => 56,
                'user_id' => 0,
                'name' => 'Cyberjaya',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            57 =>
            array(
                'id' => 57,
                'user_id' => 0,
                'name' => 'Damansara Damai',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            58 =>
            array(
                'id' => 58,
                'user_id' => 0,
                'name' => 'Damansara Intan,PJ',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            59 =>
            array(
                'id' => 59,
                'user_id' => 0,
                'name' => 'Damansara Jaya',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            60 =>
            array(
                'id' => 60,
                'user_id' => 0,
                'name' => 'Damansara Kim',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            61 =>
            array(
                'id' => 61,
                'user_id' => 0,
                'name' => 'Damansara Perdana',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            62 =>
            array(
                'id' => 62,
                'user_id' => 0,
                'name' => 'Damansara Utama',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            63 =>
            array(
                'id' => 63,
                'user_id' => 0,
                'name' => 'Denai Alam',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            64 =>
            array(
                'id' => 64,
                'user_id' => 0,
                'name' => 'Dengkil',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            65 =>
            array(
                'id' => 65,
                'user_id' => 0,
                'name' => 'Glenmarie',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            66 =>
            array(
                'id' => 66,
                'user_id' => 0,
                'name' => 'Gombak',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            67 =>
            array(
                'id' => 67,
                'user_id' => 0,
                'name' => 'Hulu Bernam (Tg malim)',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            68 =>
            array(
                'id' => 68,
                'user_id' => 0,
                'name' => 'Hulu Langat',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            69 =>
            array(
                'id' => 69,
                'user_id' => 0,
                'name' => 'Hulu Selangor,Serendah',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            70 =>
            array(
                'id' => 70,
                'user_id' => 0,
                'name' => 'I-City',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            71 =>
            array(
                'id' => 71,
                'user_id' => 0,
                'name' => 'Ijok',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            72 =>
            array(
                'id' => 72,
                'user_id' => 0,
                'name' => 'Jade Hills',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            73 =>
            array(
                'id' => 73,
                'user_id' => 0,
                'name' => 'Jenjarom',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            74 =>
            array(
                'id' => 74,
                'user_id' => 0,
                'name' => 'Jeram',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            75 =>
            array(
                'id' => 75,
                'user_id' => 0,
                'name' => 'Kajang',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            76 =>
            array(
                'id' => 76,
                'user_id' => 0,
                'name' => 'Kapar',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            77 =>
            array(
                'id' => 77,
                'user_id' => 0,
                'name' => 'Kayu Ara',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            78 =>
            array(
                'id' => 78,
                'user_id' => 0,
                'name' => 'Kelana Jaya',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            79 =>
            array(
                'id' => 79,
                'user_id' => 0,
                'name' => 'Kerling',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            80 =>
            array(
                'id' => 80,
                'user_id' => 0,
                'name' => 'Kinrara',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            81 =>
            array(
                'id' => 81,
                'user_id' => 0,
                'name' => 'Klang',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            82 =>
            array(
                'id' => 82,
                'user_id' => 0,
                'name' => 'Kota Damansara',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            83 =>
            array(
                'id' => 83,
                'user_id' => 0,
                'name' => 'Kota Kemuning',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            84 =>
            array(
                'id' => 84,
                'user_id' => 0,
                'name' => 'Kuala Kubu Bharu',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            85 =>
            array(
                'id' => 85,
                'user_id' => 0,
                'name' => 'Kuala Langat',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            86 =>
            array(
                'id' => 86,
                'user_id' => 0,
                'name' => 'Kuala Selangor',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            87 =>
            array(
                'id' => 87,
                'user_id' => 0,
                'name' => 'Kuang',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            88 =>
            array(
                'id' => 88,
                'user_id' => 0,
                'name' => 'Kundang',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            89 =>
            array(
                'id' => 89,
                'user_id' => 0,
                'name' => 'Kota Puteri',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            90 =>
            array(
                'id' => 90,
                'user_id' => 0,
                'name' => 'Labu',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            91 =>
            array(
                'id' => 91,
                'user_id' => 0,
                'name' => 'Meru',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            92 =>
            array(
                'id' => 92,
                'user_id' => 0,
                'name' => 'Morib',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            93 =>
            array(
                'id' => 93,
                'user_id' => 0,
                'name' => 'Mutiara Damansara',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            94 =>
            array(
                'id' => 94,
                'user_id' => 0,
                'name' => 'Pandamaran',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            95 =>
            array(
                'id' => 95,
                'user_id' => 0,
                'name' => 'Pandan',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            96 =>
            array(
                'id' => 96,
                'user_id' => 0,
                'name' => 'Paya Jaras',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            97 =>
            array(
                'id' => 97,
                'user_id' => 0,
                'name' => 'Petaling Jaya',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            98 =>
            array(
                'id' => 98,
                'user_id' => 0,
                'name' => 'Pelabuhan Klang',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            99 =>
            array(
                'id' => 99,
                'user_id' => 0,
                'name' => 'Puchong',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            100 =>
            array(
                'id' => 100,
                'user_id' => 0,
                'name' => 'Pulau Carey',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            101 =>
            array(
                'id' => 101,
                'user_id' => 0,
                'name' => 'Pulau Indah (Pulau Lumut)',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            102 =>
            array(
                'id' => 102,
                'user_id' => 0,
                'name' => 'Puncak Alam',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            103 =>
            array(
                'id' => 103,
                'user_id' => 0,
                'name' => 'Puncak Jalil',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            104 =>
            array(
                'id' => 104,
                'user_id' => 0,
                'name' => 'Putra Heights',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            105 =>
            array(
                'id' => 105,
                'user_id' => 0,
                'name' => 'Rasa',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            106 =>
            array(
                'id' => 106,
                'user_id' => 0,
                'name' => 'Rawang',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            107 =>
            array(
                'id' => 107,
                'user_id' => 0,
                'name' => 'Sabak Bernam',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            108 =>
            array(
                'id' => 108,
                'user_id' => 0,
                'name' => 'Salak Tinggi',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            109 =>
            array(
                'id' => 109,
                'user_id' => 0,
                'name' => 'Saujana Utama',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            110 =>
            array(
                'id' => 110,
                'user_id' => 0,
                'name' => 'Sekinchan',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            111 =>
            array(
                'id' => 111,
                'user_id' => 0,
                'name' => 'Seksyen 1',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            112 =>
            array(
                'id' => 112,
                'user_id' => 0,
                'name' => 'Seksyen 10',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            113 =>
            array(
                'id' => 113,
                'user_id' => 0,
                'name' => 'Seksyen 11',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            114 =>
            array(
                'id' => 114,
                'user_id' => 0,
                'name' => 'Seksyen 12',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            115 =>
            array(
                'id' => 115,
                'user_id' => 0,
                'name' => 'Seksyen 13',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            116 =>
            array(
                'id' => 116,
                'user_id' => 0,
                'name' => 'Seksyen 14',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            117 =>
            array(
                'id' => 117,
                'user_id' => 0,
                'name' => 'Seksyen 15',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            118 =>
            array(
                'id' => 118,
                'user_id' => 0,
                'name' => 'Seksyen 16',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            119 =>
            array(
                'id' => 119,
                'user_id' => 0,
                'name' => 'Seksyen 17',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            120 =>
            array(
                'id' => 120,
                'user_id' => 0,
                'name' => 'Seksyen 18',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            121 =>
            array(
                'id' => 121,
                'user_id' => 0,
                'name' => 'Seksyen 19',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            122 =>
            array(
                'id' => 122,
                'user_id' => 0,
                'name' => 'Seksyen 2',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            123 =>
            array(
                'id' => 123,
                'user_id' => 0,
                'name' => 'Seksyen 20',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            124 =>
            array(
                'id' => 124,
                'user_id' => 0,
                'name' => 'Seksyen 21',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            125 =>
            array(
                'id' => 125,
                'user_id' => 0,
                'name' => 'Seksyen 22',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            126 =>
            array(
                'id' => 126,
                'user_id' => 0,
                'name' => 'Seksyen 23',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            127 =>
            array(
                'id' => 127,
                'user_id' => 0,
                'name' => 'Seksyen 24',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            128 =>
            array(
                'id' => 128,
                'user_id' => 0,
                'name' => 'Seksyen 25 (Seri Muda)',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            129 =>
            array(
                'id' => 129,
                'user_id' => 0,
                'name' => 'Seksyen 26 (Bukit Saga)',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            130 =>
            array(
                'id' => 130,
                'user_id' => 0,
                'name' => 'Seksyen 26 (Hicom)',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            131 =>
            array(
                'id' => 131,
                'user_id' => 0,
                'name' => 'Seksyen 27 (Alam Megah)',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            132 =>
            array(
                'id' => 132,
                'user_id' => 0,
                'name' => 'Seksyen 28 (Alam Megah)',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            133 =>
            array(
                'id' => 133,
                'user_id' => 0,
                'name' => 'Seksyen 29 (Jalan Kebun)',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            134 =>
            array(
                'id' => 134,
                'user_id' => 0,
                'name' => 'Seksyen 3',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            135 =>
            array(
                'id' => 135,
                'user_id' => 0,
                'name' => 'Seksyen 31 (Kota Kemuning)',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            136 =>
            array(
                'id' => 136,
                'user_id' => 0,
                'name' => 'Seksyen 32 (Bukit Rimau)',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            137 =>
            array(
                'id' => 137,
                'user_id' => 0,
                'name' => 'Seksyen 33 (Bukit Kemuning)',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            138 =>
            array(
                'id' => 138,
                'user_id' => 0,
                'name' => 'Seksyen 34',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            139 =>
            array(
                'id' => 139,
                'user_id' => 0,
                'name' => 'Seksyen 35',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            140 =>
            array(
                'id' => 140,
                'user_id' => 0,
                'name' => 'Seksyen 36',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            141 =>
            array(
                'id' => 141,
                'user_id' => 0,
                'name' => 'Seksyen 4',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            142 =>
            array(
                'id' => 142,
                'user_id' => 0,
                'name' => 'Seksyen 5',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            143 =>
            array(
                'id' => 143,
                'user_id' => 0,
                'name' => 'Seksyen 6',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            144 =>
            array(
                'id' => 144,
                'user_id' => 0,
                'name' => 'Seksyen 7',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            145 =>
            array(
                'id' => 145,
                'user_id' => 0,
                'name' => 'Seksyen 8',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            146 =>
            array(
                'id' => 146,
                'user_id' => 0,
                'name' => 'Seksyen 9',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            147 =>
            array(
                'id' => 147,
                'user_id' => 0,
                'name' => 'Seksyen U1 (Glenmarie)',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            148 =>
            array(
                'id' => 148,
                'user_id' => 0,
                'name' => 'Seksyen U10 (Alam Budiman)',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            149 =>
            array(
                'id' => 149,
                'user_id' => 0,
                'name' => 'Seksyen U10 (Puncak Perdana)',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            150 =>
            array(
                'id' => 150,
                'user_id' => 0,
                'name' => 'Seksyen U11 (Bukit Bandaraya)',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            151 =>
            array(
                'id' => 151,
                'user_id' => 0,
                'name' => 'Seksyen U12',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            152 =>
            array(
                'id' => 152,
                'user_id' => 0,
                'name' => 'Seksyen U13 (Setia Alam)',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            153 =>
            array(
                'id' => 153,
                'user_id' => 0,
                'name' => 'Seksyen U14 (Alam Budiman)',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            154 =>
            array(
                'id' => 154,
                'user_id' => 0,
                'name' => 'Seksyen U15 (Puncak Alam)',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            155 =>
            array(
                'id' => 155,
                'user_id' => 0,
                'name' => 'Seksyen U16 (Denai Alam)',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            156 =>
            array(
                'id' => 156,
                'user_id' => 0,
                'name' => 'Seksyen U16 (Elmina)',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            157 =>
            array(
                'id' => 157,
                'user_id' => 0,
                'name' => 'Seksyen U17',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            158 =>
            array(
                'id' => 158,
                'user_id' => 0,
                'name' => 'Seksyen U18',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            159 =>
            array(
                'id' => 159,
                'user_id' => 0,
                'name' => 'Seksyen U19 (Paya Jaras)',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            160 =>
            array(
                'id' => 160,
                'user_id' => 0,
                'name' => 'Seksyen U2',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            161 =>
            array(
                'id' => 161,
                'user_id' => 0,
                'name' => 'Seksyen U20',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            162 =>
            array(
                'id' => 162,
                'user_id' => 0,
                'name' => 'Seksyen U3 (Subang)',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            163 =>
            array(
                'id' => 163,
                'user_id' => 0,
                'name' => 'Seksyen U4 (Kwasa Damansara)',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            164 =>
            array(
                'id' => 164,
                'user_id' => 0,
                'name' => 'Seksyen U5 (Subang Bestari)',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            165 =>
            array(
                'id' => 165,
                'user_id' => 0,
                'name' => 'Seksyen U6 (Subang)',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            166 =>
            array(
                'id' => 166,
                'user_id' => 0,
                'name' => 'Seksyen U7 (Subang)',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            167 =>
            array(
                'id' => 167,
                'user_id' => 0,
                'name' => 'Seksyen U8 (Bukit Jelutong)',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            168 =>
            array(
                'id' => 168,
                'user_id' => 0,
                'name' => 'Seksyen U9',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            169 =>
            array(
                'id' => 169,
                'user_id' => 0,
                'name' => 'Selayang',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            170 =>
            array(
                'id' => 170,
                'user_id' => 0,
                'name' => 'Semenyih',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            171 =>
            array(
                'id' => 171,
                'user_id' => 0,
                'name' => 'Sepang',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            172 =>
            array(
                'id' => 172,
                'user_id' => 0,
                'name' => 'Serdang',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            173 =>
            array(
                'id' => 173,
                'user_id' => 0,
                'name' => 'Serendah',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            174 =>
            array(
                'id' => 174,
                'user_id' => 0,
                'name' => 'Seri Kembangan',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            175 =>
            array(
                'id' => 175,
                'user_id' => 0,
                'name' => 'Seri Muda',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            176 =>
            array(
                'id' => 176,
                'user_id' => 0,
                'name' => 'Setia Alam',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            177 =>
            array(
                'id' => 177,
                'user_id' => 0,
                'name' => 'Shah Alam',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            178 =>
            array(
                'id' => 178,
                'user_id' => 0,
                'name' => 'Sijangkang',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            179 =>
            array(
                'id' => 179,
                'user_id' => 0,
                'name' => 'SS2',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            180 =>
            array(
                'id' => 180,
                'user_id' => 0,
                'name' => 'Subang',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            181 =>
            array(
                'id' => 181,
                'user_id' => 0,
                'name' => 'Subang Bestari',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            182 =>
            array(
                'id' => 182,
                'user_id' => 0,
                'name' => 'Subang Jaya',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            183 =>
            array(
                'id' => 183,
                'user_id' => 0,
                'name' => 'Subang Perdana',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            184 =>
            array(
                'id' => 184,
                'user_id' => 0,
                'name' => 'Sungai Ayer Tawar',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            185 =>
            array(
                'id' => 185,
                'user_id' => 0,
                'name' => 'Sungai Besar',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            186 =>
            array(
                'id' => 186,
                'user_id' => 0,
                'name' => 'Sungai Buloh',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            187 =>
            array(
                'id' => 187,
                'user_id' => 0,
                'name' => 'Sungai Pelek',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            188 =>
            array(
                'id' => 188,
                'user_id' => 0,
                'name' => 'Sungai Ramal,Kajang',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            189 =>
            array(
                'id' => 189,
                'user_id' => 0,
                'name' => 'Sungai Choh',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            190 =>
            array(
                'id' => 190,
                'user_id' => 0,
                'name' => 'Taman TTDI Jaya',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            191 =>
            array(
                'id' => 191,
                'user_id' => 0,
                'name' => 'Tanjung Dua Belas',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            192 =>
            array(
                'id' => 192,
                'user_id' => 0,
                'name' => 'Tanjong Karang',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            193 =>
            array(
                'id' => 193,
                'user_id' => 0,
                'name' => 'Tanjong Sepat',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            194 =>
            array(
                'id' => 194,
                'user_id' => 0,
                'name' => 'Telok Panglima Garang',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            195 =>
            array(
                'id' => 195,
                'user_id' => 0,
                'name' => 'Tropicana',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            196 =>
            array(
                'id' => 196,
                'user_id' => 0,
                'name' => 'Ulu Bernam',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            197 =>
            array(
                'id' => 197,
                'user_id' => 0,
                'name' => 'Ulu Klang',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            198 =>
            array(
                'id' => 198,
                'user_id' => 0,
                'name' => 'USJ',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            199 =>
            array(
                'id' => 199,
                'user_id' => 0,
                'name' => 'USJ Heights',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
        ));
    }
}
