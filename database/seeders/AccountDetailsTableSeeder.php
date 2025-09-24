<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AccountDetailsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        DB::table('account_details')->delete();
        
        DB::table('account_details')->insert(array (
            0 => 
            array (
                'id' => 1,
                'account_id' => 6,
                'code' => 'PP-3425',
                'status' => 'Approve',
                'creator_id' => 10,
                'updated_at' => '2024-11-18 22:24:51+00',
                'created_at' => '2024-11-18 22:24:50+00',
                'remark' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'account_id' => 4,
                'code' => 'OP-3423',
                'status' => 'Pending',
                'creator_id' => 12,
                'updated_at' => '2024-07-13 17:26:26+00',
                'created_at' => '2024-07-13 17:26:25+00',
                'remark' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'account_id' => 4,
                'code' => 'OP-3423',
                'status' => 'Approve',
                'creator_id' => 9,
                'updated_at' => '2024-07-13 17:27:19+00',
                'created_at' => '2024-07-13 17:27:18+00',
                'remark' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'account_id' => 4,
                'code' => 'OP-3423',
                'status' => 'Approve',
                'creator_id' => 9,
                'updated_at' => '2024-10-11 15:15:12+00',
                'created_at' => '2024-10-11 15:15:11+00',
                'remark' => 'Update 11/10/2024',
            ),
            4 => 
            array (
                'id' => 5,
                'account_id' => 3,
                'code' => 'PP-3422',
                'status' => 'Approve',
                'creator_id' => 9,
                'updated_at' => '2024-10-11 12:48:47+00',
                'created_at' => '2024-10-11 12:48:46+00',
                'remark' => 'Update 11/10/2024',
            ),
            5 => 
            array (
                'id' => 6,
                'account_id' => 3,
                'code' => 'PP-3422',
                'status' => 'Approve',
                'creator_id' => 9,
                'updated_at' => '2024-07-02 20:58:04+00',
                'created_at' => '2024-07-02 20:58:03+00',
                'remark' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'account_id' => 3,
                'code' => 'PP-3422',
                'status' => 'Stop',
                'creator_id' => 9,
                'updated_at' => '2024-10-11 12:47:18+00',
                'created_at' => '2024-10-11 12:47:17+00',
                'remark' => NULL,
            ),
            7 => 
            array (
                'id' => 8,
                'account_id' => 2,
                'code' => 'OP-3421',
                'status' => 'Stop',
                'creator_id' => 9,
                'updated_at' => '2024-10-11 15:33:20+00',
                'created_at' => '2024-10-11 15:33:19+00',
                'remark' => NULL,
            ),
            8 => 
            array (
                'id' => 9,
                'account_id' => 2,
                'code' => 'OP-3421',
                'status' => 'Approve',
                'creator_id' => 9,
                'updated_at' => '2024-07-01 16:19:05+00',
                'created_at' => '2024-07-01 16:19:04+00',
                'remark' => NULL,
            ),
            9 => 
            array (
                'id' => 10,
                'account_id' => 2,
                'code' => 'OP-3421',
                'status' => 'Approve',
                'creator_id' => 9,
                'updated_at' => '2024-10-11 15:33:54+00',
                'created_at' => '2024-10-11 15:33:53+00',
                'remark' => 'Update 11/10/2024',
            ),
            10 => 
            array (
                'id' => 11,
                'account_id' => 1,
                'code' => 'OP-3420',
                'status' => 'Approve',
                'creator_id' => 9,
                'updated_at' => '2024-06-30 16:21:49+00',
                'created_at' => '2024-06-30 16:21:48+00',
                'remark' => NULL,
            ),
            11 => 
            array (
                'id' => 12,
                'account_id' => 1,
                'code' => 'OP-3420',
                'status' => 'Stop',
                'creator_id' => 9,
                'updated_at' => '2024-10-11 15:31:38+00',
                'created_at' => '2024-10-11 15:31:37+00',
                'remark' => NULL,
            ),
            12 => 
            array (
                'id' => 13,
                'account_id' => 1,
                'code' => 'OP-3420',
                'status' => 'Pending',
                'creator_id' => 12,
                'updated_at' => '2024-06-30 16:20:39+00',
                'created_at' => '2024-06-30 16:20:38+00',
                'remark' => NULL,
            ),
            13 => 
            array (
                'id' => 14,
                'account_id' => 2,
                'code' => 'OP-3421',
                'status' => 'Pending',
                'creator_id' => 12,
                'updated_at' => '2024-07-01 16:17:18+00',
                'created_at' => '2024-07-01 16:17:16+00',
                'remark' => NULL,
            ),
            14 => 
            array (
                'id' => 15,
                'account_id' => 3,
                'code' => 'PP-3422',
                'status' => 'Pending',
                'creator_id' => 11,
                'updated_at' => '2024-07-02 20:57:16+00',
                'created_at' => '2024-07-02 20:57:15+00',
                'remark' => NULL,
            ),
            15 => 
            array (
                'id' => 16,
                'account_id' => 4,
                'code' => 'OP-3423',
                'status' => 'Stop',
                'creator_id' => 9,
                'updated_at' => '2024-10-11 15:12:41+00',
                'created_at' => '2024-10-11 15:12:40+00',
                'remark' => NULL,
            ),
            16 => 
            array (
                'id' => 17,
                'account_id' => 1,
                'code' => 'OP-3420',
                'status' => 'Approve',
                'creator_id' => 9,
                'updated_at' => '2024-10-11 15:32:11+00',
                'created_at' => '2024-10-11 15:32:10+00',
                'remark' => 'Update 11/10/2024',
            ),
            17 => 
            array (
                'id' => 18,
                'account_id' => 5,
                'code' => 'PP-3424',
                'status' => 'Approve',
                'creator_id' => 11,
                'updated_at' => '2024-10-16 14:40:16+00',
                'created_at' => '2024-10-16 14:40:15+00',
                'remark' => 'Approve by Ash',
            ),
        ));
        
        
    }
}