<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserRolesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        DB::table('user_roles')->delete();
        
        DB::table('user_roles')->insert(array (
            0 => 
            array (
                'id' => 1,
                'user_id' => 16,
                'role' => 'Finance',
                'company_id' => 1,
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:33:16+00',
                'created_at' => '2024-07-06 11:33:16+00',
            ),
            1 => 
            array (
                'id' => 2,
                'user_id' => 16,
                'role' => 'Finance',
                'company_id' => 2,
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:32:55+00',
                'created_at' => '2024-07-06 11:32:55+00',
            ),
            2 => 
            array (
                'id' => 3,
                'user_id' => 16,
                'role' => 'Finance',
                'company_id' => 3,
                'creator_id' => 0,
                'updated_at' => '2024-10-25 11:52:31+00',
                'created_at' => '2024-10-25 11:52:31+00',
            ),
            3 => 
            array (
                'id' => 4,
                'user_id' => 15,
                'role' => 'Account',
                'company_id' => 1,
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:32:46+00',
                'created_at' => '2024-07-06 11:32:46+00',
            ),
            4 => 
            array (
                'id' => 5,
                'user_id' => 15,
                'role' => 'Finance',
                'company_id' => 1,
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:32:31+00',
                'created_at' => '2024-07-06 11:32:31+00',
            ),
            5 => 
            array (
                'id' => 6,
                'user_id' => 8,
                'role' => 'Finance',
                'company_id' => 3,
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:32:05+00',
                'created_at' => '2024-07-06 11:32:05+00',
            ),
            6 => 
            array (
                'id' => 7,
                'user_id' => 9,
                'role' => 'Credit Controller',
                'company_id' => 1,
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:34:04+00',
                'created_at' => '2024-07-06 11:34:04+00',
            ),
            7 => 
            array (
                'id' => 8,
                'user_id' => 9,
                'role' => 'Credit Controller',
                'company_id' => 2,
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:31:46+00',
                'created_at' => '2024-07-06 11:31:46+00',
            ),
            8 => 
            array (
                'id' => 9,
                'user_id' => 9,
                'role' => 'Credit Controller',
                'company_id' => 3,
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:31:36+00',
                'created_at' => '2024-07-06 11:31:36+00',
            ),
            9 => 
            array (
                'id' => 10,
                'user_id' => 10,
                'role' => 'Sales Coordinator',
                'company_id' => 1,
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:31:28+00',
                'created_at' => '2024-07-06 11:31:28+00',
            ),
            10 => 
            array (
                'id' => 11,
                'user_id' => 7,
                'role' => 'Sales Coordinator',
                'company_id' => 2,
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:31:21+00',
                'created_at' => '2024-07-06 11:31:21+00',
            ),
            11 => 
            array (
                'id' => 12,
                'user_id' => 8,
                'role' => 'Sales Coordinator',
                'company_id' => 3,
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:31:05+00',
                'created_at' => '2024-07-06 11:31:05+00',
            ),
            12 => 
            array (
                'id' => 13,
                'user_id' => 13,
                'role' => 'Sales Agent',
                'company_id' => 1,
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:30:30+00',
                'created_at' => '2024-07-06 11:30:30+00',
            ),
            13 => 
            array (
                'id' => 14,
                'user_id' => 11,
                'role' => 'Sales Agent',
                'company_id' => 2,
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:30:17+00',
                'created_at' => '2024-07-06 11:30:17+00',
            ),
            14 => 
            array (
                'id' => 15,
                'user_id' => 14,
                'role' => 'Credit Controller',
                'company_id' => 3,
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:29:57+00',
                'created_at' => '2024-07-06 11:29:57+00',
            ),
            15 => 
            array (
                'id' => 16,
                'user_id' => 8,
                'role' => 'Account',
                'company_id' => 3,
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:30:08+00',
                'created_at' => '2024-07-06 11:30:08+00',
            ),
            16 => 
            array (
                'id' => 17,
                'user_id' => 7,
                'role' => 'Account',
                'company_id' => 2,
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:30:08+00',
                'created_at' => '2024-07-06 11:30:08+00',
            ),
            17 => 
            array (
                'id' => 18,
                'user_id' => 12,
                'role' => 'Sales Agent',
                'company_id' => 3,
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:30:08+00',
                'created_at' => '2024-07-06 11:30:08+00',
            ),
            18 => 
            array (
                'id' => 19,
                'user_id' => 14,
                'role' => 'Credit Controller',
                'company_id' => 2,
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:30:08+00',
                'created_at' => '2024-07-06 11:30:08+00',
            ),
            19 => 
            array (
                'id' => 20,
                'user_id' => 14,
                'role' => 'Credit Controller',
                'company_id' => 1,
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:30:08+00',
                'created_at' => '2024-07-06 11:30:08+00',
            ),
            20 => 
            array (
                'id' => 21,
                'user_id' => 17,
                'role' => 'Manager',
                'company_id' => 3,
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:30:08+00',
                'created_at' => '2024-07-06 11:30:08+00',
            ),
            21 => 
            array (
                'id' => 22,
                'user_id' => 17,
                'role' => 'Manager',
                'company_id' => 1,
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:30:08+00',
                'created_at' => '2024-07-06 11:30:08+00',
            ),
            22 => 
            array (
                'id' => 23,
                'user_id' => 17,
                'role' => 'Manager',
                'company_id' => 2,
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:30:08+00',
                'created_at' => '2024-07-06 11:30:08+00',
            ),
            23 => 
            array (
                'id' => 24,
                'user_id' => 10,
                'role' => 'Quotation Approver',
                'company_id' => 1,
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:30:08+00',
                'created_at' => '2024-07-06 11:30:08+00',
            ),
            24 => 
            array (
                'id' => 25,
                'user_id' => 10,
                'role' => 'Quotation Approver',
                'company_id' => 2,
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:30:08+00',
                'created_at' => '2024-07-06 11:30:08+00',
            ),
            25 => 
            array (
                'id' => 26,
                'user_id' => 10,
                'role' => 'Quotation Approver',
                'company_id' => 3,
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:30:08+00',
                'created_at' => '2024-07-06 11:30:08+00',
            ),
            26 => 
            array (
                'id' => 27,
                'user_id' => 7,
                'role' => 'Finance',
                'company_id' => 2,
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:30:08+00',
                'created_at' => '2024-07-06 11:30:08+00',
            ),
            27 => 
            array (
                'id' => 28,
                'user_id' => 16,
                'role' => 'Quotation Approver',
                'company_id' => 1,
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:30:08+00',
                'created_at' => '2024-07-06 11:30:08+00',
            ),
            28 => 
            array (
                'id' => 29,
                'user_id' => 16,
                'role' => 'Quotation Approver',
                'company_id' => 2,
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:30:08+00',
                'created_at' => '2024-07-06 11:30:08+00',
            ),
            29 => 
            array (
                'id' => 30,
                'user_id' => 16,
                'role' => 'Quotation Approver',
                'company_id' => 3,
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:30:08+00',
                'created_at' => '2024-07-06 11:30:08+00',
            ),
            30 => 
            array (
                'id' => 31,
                'user_id' => 16,
                'role' => 'Manager',
                'company_id' => 1,
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:30:08+00',
                'created_at' => '2024-07-06 11:30:08+00',
            ),
            31 => 
            array (
                'id' => 32,
                'user_id' => 16,
                'role' => 'Manager',
                'company_id' => 2,
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:30:08+00',
                'created_at' => '2024-07-06 11:30:08+00',
            ),
            32 => 
            array (
                'id' => 33,
                'user_id' => 16,
                'role' => 'Manager',
                'company_id' => 3,
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:30:08+00',
                'created_at' => '2024-07-06 11:30:08+00',
            ),
        ));
        
        
    }
}