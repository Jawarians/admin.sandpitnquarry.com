<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AccountDetailItemsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        DB::table('account_detail_items')->delete();
        
        DB::table('account_detail_items')->insert(array (
            0 => 
            array (
                'id' => 1,
                'account_detail_id' => 1,
                'term' => 0,
                'limit' => 0,
                'minimize' => 0,
                'status' => 'Approve',
                'creator_id' => 10,
                'updated_at' => '2024-11-18 22:24:50+00',
                'created_at' => '2024-11-18 22:24:50+00',
            ),
            1 => 
            array (
                'id' => 2,
                'account_detail_id' => 2,
                'term' => 60,
                'limit' => 10000000,
                'minimize' => 0,
                'status' => 'Approve',
                'creator_id' => 9,
                'updated_at' => '2024-11-12 09:21:04+00',
                'created_at' => '2024-11-12 09:21:04+00',
            ),
            2 => 
            array (
                'id' => 3,
                'account_detail_id' => 3,
                'term' => 60,
                'limit' => 5000000,
                'minimize' => 0,
                'status' => 'Approve',
                'creator_id' => 9,
                'updated_at' => '2024-11-12 09:19:38+00',
                'created_at' => '2024-11-12 09:19:38+00',
            ),
            3 => 
            array (
                'id' => 4,
                'account_detail_id' => 4,
                'term' => 60,
                'limit' => 15000000,
                'minimize' => 0,
                'status' => 'Approve',
                'creator_id' => 9,
                'updated_at' => '2024-11-11 17:37:27+00',
                'created_at' => '2024-11-11 17:37:27+00',
            ),
            4 => 
            array (
                'id' => 5,
                'account_detail_id' => 5,
                'term' => 60,
                'limit' => 15000000,
                'minimize' => 0,
                'status' => 'Stop',
                'creator_id' => 9,
                'updated_at' => '2024-11-11 17:36:27+00',
                'created_at' => '2024-11-11 17:36:27+00',
            ),
            5 => 
            array (
                'id' => 6,
                'account_detail_id' => 6,
                'term' => 60,
                'limit' => 5000000,
                'minimize' => 0,
                'status' => 'Approve',
                'creator_id' => 9,
                'updated_at' => '2024-11-11 17:33:12+00',
                'created_at' => '2024-11-11 17:33:12+00',
            ),
            6 => 
            array (
                'id' => 7,
                'account_detail_id' => 7,
                'term' => 60,
                'limit' => 5000000,
                'minimize' => 0,
                'status' => 'Stop',
                'creator_id' => 9,
                'updated_at' => '2024-11-11 17:32:04+00',
                'created_at' => '2024-11-11 17:32:04+00',
            ),
            7 => 
            array (
                'id' => 8,
                'account_detail_id' => 8,
                'term' => 60,
                'limit' => 5000000,
                'minimize' => 0,
                'status' => 'Approve',
                'creator_id' => 9,
                'updated_at' => '2024-11-11 16:25:06+00',
                'created_at' => '2024-11-11 16:25:06+00',
            ),
            8 => 
            array (
                'id' => 9,
                'account_detail_id' => 9,
                'term' => 60,
                'limit' => 5000000,
                'minimize' => 0,
                'status' => 'Stop',
                'creator_id' => 9,
                'updated_at' => '2024-11-11 16:17:24+00',
                'created_at' => '2024-11-11 16:17:24+00',
            ),
            9 => 
            array (
                'id' => 10,
                'account_detail_id' => 10,
                'term' => 30,
                'limit' => 10000000,
                'minimize' => 0,
                'status' => 'Approve',
                'creator_id' => 9,
                'updated_at' => '2024-11-11 16:14:24+00',
                'created_at' => '2024-11-11 16:14:24+00',
            ),
            10 => 
            array (
                'id' => 11,
                'account_detail_id' => 11,
                'term' => 30,
                'limit' => 10000000,
                'minimize' => 0,
                'status' => 'Stop',
                'creator_id' => 9,
                'updated_at' => '2024-11-11 16:13:50+00',
                'created_at' => '2024-11-11 16:13:50+00',
            ),
            11 => 
            array (
                'id' => 12,
                'account_detail_id' => 12,
                'term' => 30,
                'limit' => 3000000,
                'minimize' => 0,
                'status' => 'Approve',
                'creator_id' => 9,
                'updated_at' => '2024-11-11 16:12:20+00',
                'created_at' => '2024-11-11 16:12:20+00',
            ),
            12 => 
            array (
                'id' => 13,
                'account_detail_id' => 13,
                'term' => 30,
                'limit' => 3000000,
                'minimize' => 0,
                'status' => 'Stop',
                'creator_id' => 9,
                'updated_at' => '2024-11-11 16:11:54+00',
                'created_at' => '2024-11-11 16:11:54+00',
            ),
            13 => 
            array (
                'id' => 14,
                'account_detail_id' => 14,
                'term' => 60,
                'limit' => 5000000,
                'minimize' => 0,
                'status' => 'Approve',
                'creator_id' => 9,
                'updated_at' => '2024-11-11 16:09:08+00',
                'created_at' => '2024-11-11 16:09:08+00',
            ),
            14 => 
            array (
                'id' => 15,
                'account_detail_id' => 15,
                'term' => 60,
                'limit' => 5000000,
                'minimize' => 0,
                'status' => 'Stop',
                'creator_id' => 9,
                'updated_at' => '2024-11-11 16:08:48+00',
                'created_at' => '2024-11-11 16:08:48+00',
            ),
            15 => 
            array (
                'id' => 16,
                'account_detail_id' => 16,
                'term' => 60,
                'limit' => 10000000,
                'minimize' => 0,
                'status' => 'Approve',
                'creator_id' => 9,
                'updated_at' => '2024-11-11 16:03:18+00',
                'created_at' => '2024-11-11 16:03:18+00',
            ),
            16 => 
            array (
                'id' => 17,
                'account_detail_id' => 17,
                'term' => 60,
                'limit' => 10000000,
                'minimize' => 0,
                'status' => 'Stop',
                'creator_id' => 9,
                'updated_at' => '2024-11-11 16:02:58+00',
                'created_at' => '2024-11-11 16:02:58+00',
            ),
            17 => 
            array (
                'id' => 18,
                'account_detail_id' => 18,
                'term' => 60,
                'limit' => 10000000,
                'minimize' => 0,
                'status' => 'Approve',
                'creator_id' => 9,
                'updated_at' => '2024-11-11 15:58:01+00',
                'created_at' => '2024-11-11 15:58:01+00',
            ),
        ));
        
        
    }
}