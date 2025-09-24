<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        DB::table('payments')->delete();
        
        DB::table('payments')->insert(array (
            0 => 
            array (
                'id' => 1,
                'remark' => 'public',
                'reference_number' => '1234',
                'paid_at' => '2024-05-16 16:48:00',
                'creator_id' => 13,
                'created_at' => '2024-05-16 16:49:46',
                'updated_at' => '2024-05-16 16:49:48',
            ),
            1 => 
            array (
                'id' => 3,
                'remark' => 'BANK OF CHINA',
                'reference_number' => 'OPI 240504',
                'paid_at' => '2024-05-20 20:12:01',
                'creator_id' => 12,
                'created_at' => '2024-05-20 20:18:29',
                'updated_at' => '2024-05-20 20:20:12',
            ),
            2 => 
            array (
                'id' => 5,
                'remark' => 'BANK OF CHINA',
                'reference_number' => 'OPI 240503',
                'paid_at' => '2024-05-15 15:58:00',
                'creator_id' => 12,
                'created_at' => '2024-05-23 16:00:53',
                'updated_at' => '2024-05-23 16:02:28',
            ),
            3 => 
            array (
                'id' => 4,
                'remark' => 'BANK OF CHINA',
                'reference_number' => 'HF-PI-WM 23.05.24',
                'paid_at' => '2024-05-23 12:48:00',
                'creator_id' => 12,
                'created_at' => '2024-05-23 15:50:48',
                'updated_at' => '2024-05-23 16:03:18',
            ),
            4 => 
            array (
                'id' => 2,
                'remark' => 'Bankrakyat',
                'reference_number' => '000002',
                'paid_at' => '2024-05-14 11:30:00',
                'creator_id' => 13,
                'created_at' => '2024-05-16 21:44:15',
                'updated_at' => '2024-05-23 16:25:04',
            ),
            5 => 
            array (
                'id' => 6,
                'remark' => 'BANK OF CHINA',
                'reference_number' => 'OPI 240503',
                'paid_at' => '2024-05-15 12:35:00',
                'creator_id' => 12,
                'created_at' => '2024-05-27 12:37:24',
                'updated_at' => '2024-05-27 12:48:15',
            ),
        ));
        
        
    }
}