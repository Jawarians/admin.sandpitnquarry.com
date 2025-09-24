<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolePermissionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        DB::table('role_permissions')->delete();
        
        DB::table('role_permissions')->insert(array (
            0 => 
            array (
                'id' => 1,
                'role' => 'Sales Agent',
                'permission' => 'add_order',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:33:16+00',
                'created_at' => '2024-07-06 11:33:16+00',
            ),
            1 => 
            array (
                'id' => 2,
                'role' => 'Sales Agent',
                'permission' => 'view_order',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:32:55+00',
                'created_at' => '2024-07-06 11:32:55+00',
            ),
            2 => 
            array (
                'id' => 3,
                'role' => 'Sales Agent',
                'permission' => 'add_proforma_invoice',
                'creator_id' => 0,
                'updated_at' => '2024-10-25 11:52:31+00',
                'created_at' => '2024-10-25 11:52:31+00',
            ),
            3 => 
            array (
                'id' => 4,
                'role' => 'Sales Agent',
                'permission' => 'view_price',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:32:46+00',
                'created_at' => '2024-07-06 11:32:46+00',
            ),
            4 => 
            array (
                'id' => 5,
                'role' => 'Sales Agent',
                'permission' => 'add_account',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:32:31+00',
                'created_at' => '2024-07-06 11:32:31+00',
            ),
            5 => 
            array (
                'id' => 6,
                'role' => 'Sales Agent',
                'permission' => 'resubmit_account',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:32:05+00',
                'created_at' => '2024-07-06 11:32:05+00',
            ),
            6 => 
            array (
                'id' => 7,
                'role' => 'Sales Agent',
                'permission' => 'view_account',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:34:04+00',
                'created_at' => '2024-07-06 11:34:04+00',
            ),
            7 => 
            array (
                'id' => 8,
                'role' => 'Sales Agent',
                'permission' => 'add_address',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:31:46+00',
                'created_at' => '2024-07-06 11:31:46+00',
            ),
            8 => 
            array (
                'id' => 9,
                'role' => 'Sales Agent',
                'permission' => 'edit_address',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:31:36+00',
                'created_at' => '2024-07-06 11:31:36+00',
            ),
            9 => 
            array (
                'id' => 10,
                'role' => 'Sales Agent',
                'permission' => 'view_address',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:31:28+00',
                'created_at' => '2024-07-06 11:31:28+00',
            ),
            10 => 
            array (
                'id' => 11,
                'role' => 'Sales Agent',
                'permission' => 'add_customer',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:31:21+00',
                'created_at' => '2024-07-06 11:31:21+00',
            ),
            11 => 
            array (
                'id' => 12,
                'role' => 'Sales Agent',
                'permission' => 'edit_customer',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:31:05+00',
                'created_at' => '2024-07-06 11:31:05+00',
            ),
            12 => 
            array (
                'id' => 13,
                'role' => 'Sales Agent',
                'permission' => 'view_customer',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:30:30+00',
                'created_at' => '2024-07-06 11:30:30+00',
            ),
            13 => 
            array (
                'id' => 14,
                'role' => 'Sales Coordinator',
                'permission' => 'add_order',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:30:17+00',
                'created_at' => '2024-07-06 11:30:17+00',
            ),
            14 => 
            array (
                'id' => 15,
                'role' => 'Sales Coordinator',
                'permission' => 'view_order',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:29:57+00',
                'created_at' => '2024-07-06 11:29:57+00',
            ),
            15 => 
            array (
                'id' => 16,
                'role' => 'Sales Coordinator',
                'permission' => 'add_proforma_invoice',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:30:08+00',
                'created_at' => '2024-07-06 11:30:08+00',
            ),
            16 => 
            array (
                'id' => 17,
                'role' => 'Sales Coordinator',
                'permission' => 'verify_proforma_invoice',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:30:08+00',
                'created_at' => '2024-07-06 11:30:08+00',
            ),
            17 => 
            array (
                'id' => 18,
                'role' => 'Sales Coordinator',
                'permission' => 'add_account',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:30:08+00',
                'created_at' => '2024-07-06 11:30:08+00',
            ),
            18 => 
            array (
                'id' => 19,
                'role' => 'Sales Coordinator',
                'permission' => 'resubmit_account',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:33:16+00',
                'created_at' => '2024-07-06 11:33:16+00',
            ),
            19 => 
            array (
                'id' => 20,
                'role' => 'Sales Coordinator',
                'permission' => 'view_account',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:32:55+00',
                'created_at' => '2024-07-06 11:32:55+00',
            ),
            20 => 
            array (
                'id' => 21,
                'role' => 'Sales Coordinator',
                'permission' => 'add_address',
                'creator_id' => 0,
                'updated_at' => '2024-10-25 11:52:31+00',
                'created_at' => '2024-10-25 11:52:31+00',
            ),
            21 => 
            array (
                'id' => 22,
                'role' => 'Sales Coordinator',
                'permission' => 'edit_address',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:32:46+00',
                'created_at' => '2024-07-06 11:32:46+00',
            ),
            22 => 
            array (
                'id' => 23,
                'role' => 'Sales Coordinator',
                'permission' => 'view_address',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:32:31+00',
                'created_at' => '2024-07-06 11:32:31+00',
            ),
            23 => 
            array (
                'id' => 24,
                'role' => 'Sales Coordinator',
                'permission' => 'add_customer',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:32:05+00',
                'created_at' => '2024-07-06 11:32:05+00',
            ),
            24 => 
            array (
                'id' => 25,
                'role' => 'Sales Coordinator',
                'permission' => 'edit_customer',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:34:04+00',
                'created_at' => '2024-07-06 11:34:04+00',
            ),
            25 => 
            array (
                'id' => 26,
                'role' => 'Sales Coordinator',
                'permission' => 'view_customer',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:31:46+00',
                'created_at' => '2024-07-06 11:31:46+00',
            ),
            26 => 
            array (
                'id' => 27,
                'role' => 'Credit Controller',
                'permission' => 'view_price',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:31:36+00',
                'created_at' => '2024-07-06 11:31:36+00',
            ),
            27 => 
            array (
                'id' => 28,
                'role' => 'Credit Controller',
                'permission' => 'approve_account',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:31:28+00',
                'created_at' => '2024-07-06 11:31:28+00',
            ),
            28 => 
            array (
                'id' => 29,
                'role' => 'Credit Controller',
                'permission' => 'reject_account',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:31:21+00',
                'created_at' => '2024-07-06 11:31:21+00',
            ),
            29 => 
            array (
                'id' => 30,
                'role' => 'Credit Controller',
                'permission' => 'stop_account',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:31:05+00',
                'created_at' => '2024-07-06 11:31:05+00',
            ),
            30 => 
            array (
                'id' => 31,
                'role' => 'Credit Controller',
                'permission' => 'view_account',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:30:30+00',
                'created_at' => '2024-07-06 11:30:30+00',
            ),
            31 => 
            array (
                'id' => 32,
                'role' => 'Credit Controller',
                'permission' => 'view_payment',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:30:17+00',
                'created_at' => '2024-07-06 11:30:17+00',
            ),
            32 => 
            array (
                'id' => 33,
                'role' => 'Credit Controller',
                'permission' => 'view_address',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:29:57+00',
                'created_at' => '2024-07-06 11:29:57+00',
            ),
            33 => 
            array (
                'id' => 34,
                'role' => 'Credit Controller',
                'permission' => 'view_customer',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:30:08+00',
                'created_at' => '2024-07-06 11:30:08+00',
            ),
            34 => 
            array (
                'id' => 35,
                'role' => 'Account',
                'permission' => 'view_price',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:30:08+00',
                'created_at' => '2024-07-06 11:30:08+00',
            ),
            35 => 
            array (
                'id' => 36,
                'role' => 'Manager',
                'permission' => 'add_price_remark',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:30:08+00',
                'created_at' => '2024-07-06 11:30:08+00',
            ),
            36 => 
            array (
                'id' => 37,
                'role' => 'Account',
                'permission' => 'stop_account',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:33:16+00',
                'created_at' => '2024-07-06 11:33:16+00',
            ),
            37 => 
            array (
                'id' => 38,
                'role' => 'Account',
                'permission' => 'view_account',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:32:55+00',
                'created_at' => '2024-07-06 11:32:55+00',
            ),
            38 => 
            array (
                'id' => 39,
                'role' => 'Account',
                'permission' => 'view_payment',
                'creator_id' => 0,
                'updated_at' => '2024-10-25 11:52:31+00',
                'created_at' => '2024-10-25 11:52:31+00',
            ),
            39 => 
            array (
                'id' => 40,
                'role' => 'Account',
                'permission' => 'view_address',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:32:46+00',
                'created_at' => '2024-07-06 11:32:46+00',
            ),
            40 => 
            array (
                'id' => 41,
                'role' => 'Account',
                'permission' => 'view_customer',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:32:31+00',
                'created_at' => '2024-07-06 11:32:31+00',
            ),
            41 => 
            array (
                'id' => 42,
                'role' => 'Finance',
                'permission' => 'view_order',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:32:05+00',
                'created_at' => '2024-07-06 11:32:05+00',
            ),
            42 => 
            array (
                'id' => 43,
                'role' => 'Finance',
                'permission' => 'view_price',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:34:04+00',
                'created_at' => '2024-07-06 11:34:04+00',
            ),
            43 => 
            array (
                'id' => 44,
                'role' => 'Finance',
                'permission' => 'view_account',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:31:46+00',
                'created_at' => '2024-07-06 11:31:46+00',
            ),
            44 => 
            array (
                'id' => 45,
                'role' => 'Finance',
                'permission' => 'approve_payment',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:31:36+00',
                'created_at' => '2024-07-06 11:31:36+00',
            ),
            45 => 
            array (
                'id' => 46,
                'role' => 'Finance',
                'permission' => 'view_payment',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:31:28+00',
                'created_at' => '2024-07-06 11:31:28+00',
            ),
            46 => 
            array (
                'id' => 47,
                'role' => 'Finance',
                'permission' => 'view_address',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:31:21+00',
                'created_at' => '2024-07-06 11:31:21+00',
            ),
            47 => 
            array (
                'id' => 48,
                'role' => 'Finance',
                'permission' => 'view_customer',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:31:05+00',
                'created_at' => '2024-07-06 11:31:05+00',
            ),
            48 => 
            array (
                'id' => 49,
                'role' => 'Manager',
                'permission' => 'view_order',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:30:30+00',
                'created_at' => '2024-07-06 11:30:30+00',
            ),
            49 => 
            array (
                'id' => 50,
                'role' => 'Manager',
                'permission' => 'approve_proforma_invoice',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:30:17+00',
                'created_at' => '2024-07-06 11:30:17+00',
            ),
            50 => 
            array (
                'id' => 51,
                'role' => 'Manager',
                'permission' => 'view_price',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:29:57+00',
                'created_at' => '2024-07-06 11:29:57+00',
            ),
            51 => 
            array (
                'id' => 52,
                'role' => 'Account',
                'permission' => 'add_account_code',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:30:08+00',
                'created_at' => '2024-07-06 11:30:08+00',
            ),
            52 => 
            array (
                'id' => 53,
                'role' => 'Manager',
                'permission' => 'view_account',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:30:08+00',
                'created_at' => '2024-07-06 11:30:08+00',
            ),
            53 => 
            array (
                'id' => 54,
                'role' => 'Manager',
                'permission' => 'view_payment',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:30:08+00',
                'created_at' => '2024-07-06 11:30:08+00',
            ),
            54 => 
            array (
                'id' => 55,
                'role' => 'Manager',
                'permission' => 'view_address',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:33:16+00',
                'created_at' => '2024-07-06 11:33:16+00',
            ),
            55 => 
            array (
                'id' => 56,
                'role' => 'Manager',
                'permission' => 'view_customer',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:32:55+00',
                'created_at' => '2024-07-06 11:32:55+00',
            ),
            56 => 
            array (
                'id' => 57,
                'role' => 'Manager',
                'permission' => 'download_price',
                'creator_id' => 0,
                'updated_at' => '2024-10-25 11:52:31+00',
                'created_at' => '2024-10-25 11:52:31+00',
            ),
            57 => 
            array (
                'id' => 58,
                'role' => 'Sales Coordinator',
                'permission' => 'reject_proforma_invoice',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:32:46+00',
                'created_at' => '2024-07-06 11:32:46+00',
            ),
            58 => 
            array (
                'id' => 59,
                'role' => 'Sales Coordinator',
                'permission' => 'view_price',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:32:31+00',
                'created_at' => '2024-07-06 11:32:31+00',
            ),
            59 => 
            array (
                'id' => 60,
                'role' => 'Sales Coordinator',
                'permission' => 'reject_purchasing_order',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:32:05+00',
                'created_at' => '2024-07-06 11:32:05+00',
            ),
            60 => 
            array (
                'id' => 61,
                'role' => 'Finance',
                'permission' => 'reject_payment',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:34:04+00',
                'created_at' => '2024-07-06 11:34:04+00',
            ),
            61 => 
            array (
                'id' => 62,
                'role' => 'Quotation Approver',
                'permission' => 'approve_quotation',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:31:46+00',
                'created_at' => '2024-07-06 11:31:46+00',
            ),
            62 => 
            array (
                'id' => 63,
                'role' => 'Sales Coordinator',
                'permission' => 'add_price_note',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:31:36+00',
                'created_at' => '2024-07-06 11:31:36+00',
            ),
            63 => 
            array (
                'id' => 64,
                'role' => 'Sales Coordinator',
                'permission' => 'edit_price_note',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:31:28+00',
                'created_at' => '2024-07-06 11:31:28+00',
            ),
            64 => 
            array (
                'id' => 65,
                'role' => 'Sales Coordinator',
                'permission' => 'view_price_note',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:31:21+00',
                'created_at' => '2024-07-06 11:31:21+00',
            ),
            65 => 
            array (
                'id' => 66,
                'role' => 'Manager',
                'permission' => 'add_price_note',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:31:05+00',
                'created_at' => '2024-07-06 11:31:05+00',
            ),
            66 => 
            array (
                'id' => 67,
                'role' => 'Manager',
                'permission' => 'edit_price_note',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:30:30+00',
                'created_at' => '2024-07-06 11:30:30+00',
            ),
            67 => 
            array (
                'id' => 68,
                'role' => 'Manager',
                'permission' => 'view_price_note',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:30:17+00',
                'created_at' => '2024-07-06 11:30:17+00',
            ),
            68 => 
            array (
                'id' => 69,
                'role' => 'Account',
                'permission' => 'edit_account_code',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:29:57+00',
                'created_at' => '2024-07-06 11:29:57+00',
            ),
            69 => 
            array (
                'id' => 70,
                'role' => 'Finance',
                'permission' => 'add_coin',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:30:08+00',
                'created_at' => '2024-07-06 11:30:08+00',
            ),
            70 => 
            array (
                'id' => 71,
                'role' => 'Finance',
                'permission' => 'view_coin',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:30:08+00',
                'created_at' => '2024-07-06 11:30:08+00',
            ),
            71 => 
            array (
                'id' => 72,
                'role' => 'Manager',
                'permission' => 'approve_coin',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:30:08+00',
                'created_at' => '2024-07-06 11:30:08+00',
            ),
            72 => 
            array (
                'id' => 73,
                'role' => 'Manager',
                'permission' => 'reject_coin',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:33:16+00',
                'created_at' => '2024-07-06 11:33:16+00',
            ),
            73 => 
            array (
                'id' => 74,
                'role' => 'Manager',
                'permission' => 'view_coin',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:32:55+00',
                'created_at' => '2024-07-06 11:32:55+00',
            ),
            74 => 
            array (
                'id' => 75,
                'role' => 'Sales Coordinator',
                'permission' => 'add_payment',
                'creator_id' => 0,
                'updated_at' => '2024-10-25 11:52:31+00',
                'created_at' => '2024-10-25 11:52:31+00',
            ),
            75 => 
            array (
                'id' => 76,
                'role' => 'Sales Agent',
                'permission' => 'add_payment',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:32:46+00',
                'created_at' => '2024-07-06 11:32:46+00',
            ),
            76 => 
            array (
                'id' => 77,
                'role' => 'Sales Coordinator',
                'permission' => 'add_purchasing_order',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:32:31+00',
                'created_at' => '2024-07-06 11:32:31+00',
            ),
            77 => 
            array (
                'id' => 78,
                'role' => 'Manager',
                'permission' => 'reject_proforma_invoice',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:32:05+00',
                'created_at' => '2024-07-06 11:32:05+00',
            ),
            78 => 
            array (
                'id' => 79,
                'role' => 'Quotation Approver',
                'permission' => 'reject_quotation',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:34:04+00',
                'created_at' => '2024-07-06 11:34:04+00',
            ),
            79 => 
            array (
                'id' => 80,
                'role' => 'Sales Agent',
                'permission' => 'cancel_order',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:31:46+00',
                'created_at' => '2024-07-06 11:31:46+00',
            ),
            80 => 
            array (
                'id' => 81,
                'role' => 'Sales Coordinator',
                'permission' => 'cancel_order',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:31:36+00',
                'created_at' => '2024-07-06 11:31:36+00',
            ),
            81 => 
            array (
                'id' => 82,
                'role' => 'Sales Agent',
                'permission' => 'add_quotation',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:31:28+00',
                'created_at' => '2024-07-06 11:31:28+00',
            ),
            82 => 
            array (
                'id' => 83,
                'role' => 'Sales Coordinator',
                'permission' => 'add_quotation',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:31:21+00',
                'created_at' => '2024-07-06 11:31:21+00',
            ),
            83 => 
            array (
                'id' => 84,
                'role' => 'Sales Agent',
                'permission' => 'add_purchasing_order',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:31:05+00',
                'created_at' => '2024-07-06 11:31:05+00',
            ),
            84 => 
            array (
                'id' => 85,
                'role' => 'Sales Agent',
                'permission' => 'download_price',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:30:30+00',
                'created_at' => '2024-07-06 11:30:30+00',
            ),
            85 => 
            array (
                'id' => 86,
                'role' => 'Sales Coordinator',
                'permission' => 'download_price',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:30:17+00',
                'created_at' => '2024-07-06 11:30:17+00',
            ),
            86 => 
            array (
                'id' => 87,
                'role' => 'Sales Agent',
                'permission' => 'generate_price',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:29:57+00',
                'created_at' => '2024-07-06 11:29:57+00',
            ),
            87 => 
            array (
                'id' => 88,
                'role' => 'Sales Coordinator',
                'permission' => 'generate_price',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:30:08+00',
                'created_at' => '2024-07-06 11:30:08+00',
            ),
            88 => 
            array (
                'id' => 89,
                'role' => 'Sales Agent',
                'permission' => 'upload_price',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:30:08+00',
                'created_at' => '2024-07-06 11:30:08+00',
            ),
            89 => 
            array (
                'id' => 90,
                'role' => 'Sales Coordinator',
                'permission' => 'upload_price',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:30:08+00',
                'created_at' => '2024-07-06 11:30:08+00',
            ),
            90 => 
            array (
                'id' => 91,
                'role' => 'Sales Agent',
                'permission' => 'edit_pending_account',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:33:16+00',
                'created_at' => '2024-07-06 11:33:16+00',
            ),
            91 => 
            array (
                'id' => 92,
                'role' => 'Sales Coordinator',
                'permission' => 'edit_pending_account',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:32:55+00',
                'created_at' => '2024-07-06 11:32:55+00',
            ),
            92 => 
            array (
                'id' => 93,
                'role' => 'Sales Agent',
                'permission' => 'delete_address',
                'creator_id' => 0,
                'updated_at' => '2024-10-25 11:52:31+00',
                'created_at' => '2024-10-25 11:52:31+00',
            ),
            93 => 
            array (
                'id' => 94,
                'role' => 'Sales Coordinator',
                'permission' => 'delete_address',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:32:46+00',
                'created_at' => '2024-07-06 11:32:46+00',
            ),
            94 => 
            array (
                'id' => 95,
                'role' => 'Sales Agent',
                'permission' => 'generate_purchase',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:32:31+00',
                'created_at' => '2024-07-06 11:32:31+00',
            ),
            95 => 
            array (
                'id' => 96,
                'role' => 'Sales Coordinator',
                'permission' => 'generate_purchase',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:32:05+00',
                'created_at' => '2024-07-06 11:32:05+00',
            ),
            96 => 
            array (
                'id' => 97,
                'role' => 'Sales Agent',
                'permission' => 'view_trip',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:34:04+00',
                'created_at' => '2024-07-06 11:34:04+00',
            ),
            97 => 
            array (
                'id' => 98,
                'role' => 'Sales Coordinator',
                'permission' => 'view_trip',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:31:46+00',
                'created_at' => '2024-07-06 11:31:46+00',
            ),
            98 => 
            array (
                'id' => 99,
                'role' => 'Sales Agent',
                'permission' => 'terminate_trip',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:31:36+00',
                'created_at' => '2024-07-06 11:31:36+00',
            ),
            99 => 
            array (
                'id' => 100,
                'role' => 'Sales Coordinator',
                'permission' => 'terminate_trip',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:31:28+00',
                'created_at' => '2024-07-06 11:31:28+00',
            ),
            100 => 
            array (
                'id' => 101,
                'role' => 'Sales Agent',
                'permission' => 'view_job',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:31:21+00',
                'created_at' => '2024-07-06 11:31:21+00',
            ),
            101 => 
            array (
                'id' => 102,
                'role' => 'Sales Coordinator',
                'permission' => 'view_job',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:31:05+00',
                'created_at' => '2024-07-06 11:31:05+00',
            ),
            102 => 
            array (
                'id' => 103,
                'role' => 'Sales Agent',
                'permission' => 'cancel_job',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:30:30+00',
                'created_at' => '2024-07-06 11:30:30+00',
            ),
            103 => 
            array (
                'id' => 104,
                'role' => 'Sales Coordinator',
                'permission' => 'cancel_job',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:30:17+00',
                'created_at' => '2024-07-06 11:30:17+00',
            ),
            104 => 
            array (
                'id' => 105,
                'role' => 'Sales Agent',
                'permission' => 'view_purchase',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:29:57+00',
                'created_at' => '2024-07-06 11:29:57+00',
            ),
            105 => 
            array (
                'id' => 106,
                'role' => 'Sales Coordinator',
                'permission' => 'view_purchase',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:30:08+00',
                'created_at' => '2024-07-06 11:30:08+00',
            ),
            106 => 
            array (
                'id' => 107,
                'role' => 'Sales Agent',
                'permission' => 'delete_price',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:30:08+00',
                'created_at' => '2024-07-06 11:30:08+00',
            ),
            107 => 
            array (
                'id' => 108,
                'role' => 'Sales Coordinator',
                'permission' => 'delete_price',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:30:08+00',
                'created_at' => '2024-07-06 11:30:08+00',
            ),
            108 => 
            array (
                'id' => 109,
                'role' => 'Credit Controller',
                'permission' => 'change_limit',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:33:16+00',
                'created_at' => '2024-07-06 11:33:16+00',
            ),
            109 => 
            array (
                'id' => 110,
                'role' => 'Credit Controller',
                'permission' => 'change_term',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:32:55+00',
                'created_at' => '2024-07-06 11:32:55+00',
            ),
            110 => 
            array (
                'id' => 111,
                'role' => 'Sales Coordinator',
                'permission' => 'verify_purchasing_order',
                'creator_id' => 0,
                'updated_at' => '2024-10-25 11:52:31+00',
                'created_at' => '2024-10-25 11:52:31+00',
            ),
            111 => 
            array (
                'id' => 112,
                'role' => 'Manager',
                'permission' => 'approve_purchasing_order',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:32:46+00',
                'created_at' => '2024-07-06 11:32:46+00',
            ),
            112 => 
            array (
                'id' => 113,
                'role' => 'Manager',
                'permission' => 'reject_purchasing_order',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:32:31+00',
                'created_at' => '2024-07-06 11:32:31+00',
            ),
            113 => 
            array (
                'id' => 114,
                'role' => 'Sales Coordinator',
                'permission' => 'view_payment',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:32:05+00',
                'created_at' => '2024-07-06 11:32:05+00',
            ),
            114 => 
            array (
                'id' => 115,
                'role' => 'Sales Agent',
                'permission' => 'view_payment',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:34:04+00',
                'created_at' => '2024-07-06 11:34:04+00',
            ),
            115 => 
            array (
                'id' => 116,
                'role' => 'Sales Coordinator',
                'permission' => 'edit_pending_quotation',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:31:46+00',
                'created_at' => '2024-07-06 11:31:46+00',
            ),
            116 => 
            array (
                'id' => 117,
                'role' => 'Sales Agent',
                'permission' => 'edit_pending_quotation',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:31:36+00',
                'created_at' => '2024-07-06 11:31:36+00',
            ),
            117 => 
            array (
                'id' => 118,
                'role' => 'Sales Coordinator',
                'permission' => 'edit_pending_purchasing_order',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:31:28+00',
                'created_at' => '2024-07-06 11:31:28+00',
            ),
            118 => 
            array (
                'id' => 119,
                'role' => 'Sales Agent',
                'permission' => 'edit_pending_purchasing_order',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:31:21+00',
                'created_at' => '2024-07-06 11:31:21+00',
            ),
            119 => 
            array (
                'id' => 120,
                'role' => 'Sales Coordinator',
                'permission' => 'edit_pending_proforma_invoice',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:31:05+00',
                'created_at' => '2024-07-06 11:31:05+00',
            ),
            120 => 
            array (
                'id' => 121,
                'role' => 'Sales Agent',
                'permission' => 'edit_pending_proforma_invoice',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:30:30+00',
                'created_at' => '2024-07-06 11:30:30+00',
            ),
            121 => 
            array (
                'id' => 122,
                'role' => 'Sales Coordinator',
                'permission' => 'duplicate_order',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:30:17+00',
                'created_at' => '2024-07-06 11:30:17+00',
            ),
            122 => 
            array (
                'id' => 123,
                'role' => 'Sales Agent',
                'permission' => 'duplicate_order',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:29:57+00',
                'created_at' => '2024-07-06 11:29:57+00',
            ),
            123 => 
            array (
                'id' => 124,
                'role' => 'Sales Coordinator',
                'permission' => 'edit_attention',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:30:08+00',
                'created_at' => '2024-07-06 11:30:08+00',
            ),
            124 => 
            array (
                'id' => 125,
                'role' => 'Sales Agent',
                'permission' => 'edit_attention',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:30:08+00',
                'created_at' => '2024-07-06 11:30:08+00',
            ),
            125 => 
            array (
                'id' => 126,
                'role' => 'Sales Coordinator',
                'permission' => 'change_contact',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:30:08+00',
                'created_at' => '2024-07-06 11:30:08+00',
            ),
            126 => 
            array (
                'id' => 127,
                'role' => 'Sales Agent',
                'permission' => 'change_contact',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:30:08+00',
                'created_at' => '2024-07-06 11:30:08+00',
            ),
            127 => 
            array (
                'id' => 128,
                'role' => 'Credit Controller',
                'permission' => 'view_order',
                'creator_id' => 4,
                'updated_at' => '2024-08-23 11:04:14+00',
                'created_at' => '2024-08-23 11:04:11+00',
            ),
        ));
        
        
    }
}