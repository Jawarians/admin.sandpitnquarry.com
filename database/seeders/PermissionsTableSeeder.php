<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        DB::table('permissions')->delete();
        
        DB::table('permissions')->insert(array (
            0 => 
            array (
                'permission' => 'activate_account',
                'model' => 'Account',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:33:16+00',
                'created_at' => '2024-07-06 11:33:16+00',
            ),
            1 => 
            array (
                'permission' => 'add_account',
                'model' => 'Account',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:32:55+00',
                'created_at' => '2024-07-06 11:32:55+00',
            ),
            2 => 
            array (
                'permission' => 'add_account_code',
                'model' => 'Account',
                'creator_id' => 0,
                'updated_at' => '2024-10-25 11:52:31+00',
                'created_at' => '2024-10-25 11:52:31+00',
            ),
            3 => 
            array (
                'permission' => 'add_address',
                'model' => 'Address',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:32:46+00',
                'created_at' => '2024-07-06 11:32:46+00',
            ),
            4 => 
            array (
                'permission' => 'add_coin',
                'model' => 'Coin',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:32:31+00',
                'created_at' => '2024-07-06 11:32:31+00',
            ),
            5 => 
            array (
                'permission' => 'add_customer',
                'model' => 'Customer',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:32:05+00',
                'created_at' => '2024-07-06 11:32:05+00',
            ),
            6 => 
            array (
                'permission' => 'add_job',
                'model' => 'Job',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:34:04+00',
                'created_at' => '2024-07-06 11:34:04+00',
            ),
            7 => 
            array (
                'permission' => 'add_order',
                'model' => 'Order',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:31:46+00',
                'created_at' => '2024-07-06 11:31:46+00',
            ),
            8 => 
            array (
                'permission' => 'add_payment',
                'model' => 'Payment',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:31:36+00',
                'created_at' => '2024-07-06 11:31:36+00',
            ),
            9 => 
            array (
                'permission' => 'add_price_note',
                'model' => 'Price Note',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:31:28+00',
                'created_at' => '2024-07-06 11:31:28+00',
            ),
            10 => 
            array (
                'permission' => 'add_price_remark',
                'model' => 'Price',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:31:21+00',
                'created_at' => '2024-07-06 11:31:21+00',
            ),
            11 => 
            array (
                'permission' => 'add_proforma_invoice',
                'model' => 'Proforma Invoice',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:31:05+00',
                'created_at' => '2024-07-06 11:31:05+00',
            ),
            12 => 
            array (
                'permission' => 'add_purchasing_order',
                'model' => 'Purchasing Order',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:30:30+00',
                'created_at' => '2024-07-06 11:30:30+00',
            ),
            13 => 
            array (
                'permission' => 'add_quotation',
                'model' => 'Quotation',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:30:17+00',
                'created_at' => '2024-07-06 11:30:17+00',
            ),
            14 => 
            array (
                'permission' => 'add_trip',
                'model' => 'Trip',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:29:57+00',
                'created_at' => '2024-07-06 11:29:57+00',
            ),
            15 => 
            array (
                'permission' => 'approve_account',
                'model' => 'Account',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:30:08+00',
                'created_at' => '2024-07-06 11:30:08+00',
            ),
            16 => 
            array (
                'permission' => 'approve_coin',
                'model' => 'Coin',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:30:08+00',
                'created_at' => '2024-07-06 11:30:08+00',
            ),
            17 => 
            array (
                'permission' => 'approve_payment',
                'model' => 'Payment',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:30:08+00',
                'created_at' => '2024-07-06 11:30:08+00',
            ),
            18 => 
            array (
                'permission' => 'approve_proforma_invoice',
                'model' => 'Proforma Invoice',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:33:16+00',
                'created_at' => '2024-07-06 11:33:16+00',
            ),
            19 => 
            array (
                'permission' => 'approve_purchasing_order',
                'model' => 'Purchasing Order',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:32:55+00',
                'created_at' => '2024-07-06 11:32:55+00',
            ),
            20 => 
            array (
                'permission' => 'approve_quotation',
                'model' => 'Quotation',
                'creator_id' => 0,
                'updated_at' => '2024-10-25 11:52:31+00',
                'created_at' => '2024-10-25 11:52:31+00',
            ),
            21 => 
            array (
                'permission' => 'cancel_job',
                'model' => 'Job',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:32:46+00',
                'created_at' => '2024-07-06 11:32:46+00',
            ),
            22 => 
            array (
                'permission' => 'cancel_order',
                'model' => 'Order',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:32:31+00',
                'created_at' => '2024-07-06 11:32:31+00',
            ),
            23 => 
            array (
                'permission' => 'cancel_trip',
                'model' => 'Trip',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:32:05+00',
                'created_at' => '2024-07-06 11:32:05+00',
            ),
            24 => 
            array (
                'permission' => 'change_contact',
                'model' => 'Customer',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:34:04+00',
                'created_at' => '2024-07-06 11:34:04+00',
            ),
            25 => 
            array (
                'permission' => 'change_limit',
                'model' => 'Account',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:31:46+00',
                'created_at' => '2024-07-06 11:31:46+00',
            ),
            26 => 
            array (
                'permission' => 'change_term',
                'model' => 'Account',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:31:36+00',
                'created_at' => '2024-07-06 11:31:36+00',
            ),
            27 => 
            array (
                'permission' => 'delete_address',
                'model' => 'Address',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:31:28+00',
                'created_at' => '2024-07-06 11:31:28+00',
            ),
            28 => 
            array (
                'permission' => 'delete_price',
                'model' => 'Price',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:31:21+00',
                'created_at' => '2024-07-06 11:31:21+00',
            ),
            29 => 
            array (
                'permission' => 'download_price',
                'model' => 'Price',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:31:05+00',
                'created_at' => '2024-07-06 11:31:05+00',
            ),
            30 => 
            array (
                'permission' => 'duplicate_order',
                'model' => 'Order',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:30:30+00',
                'created_at' => '2024-07-06 11:30:30+00',
            ),
            31 => 
            array (
                'permission' => 'edit_account_code',
                'model' => 'Account',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:30:17+00',
                'created_at' => '2024-07-06 11:30:17+00',
            ),
            32 => 
            array (
                'permission' => 'edit_address',
                'model' => 'Address',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:29:57+00',
                'created_at' => '2024-07-06 11:29:57+00',
            ),
            33 => 
            array (
                'permission' => 'edit_attention',
                'model' => 'Price',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:30:08+00',
                'created_at' => '2024-07-06 11:30:08+00',
            ),
            34 => 
            array (
                'permission' => 'edit_customer',
                'model' => 'Customer',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:30:08+00',
                'created_at' => '2024-07-06 11:30:08+00',
            ),
            35 => 
            array (
                'permission' => 'edit_job',
                'model' => 'Job',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:30:08+00',
                'created_at' => '2024-07-06 11:30:08+00',
            ),
            36 => 
            array (
                'permission' => 'edit_pending_account',
                'model' => 'Account',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:33:16+00',
                'created_at' => '2024-07-06 11:33:16+00',
            ),
            37 => 
            array (
                'permission' => 'edit_pending_proforma_invoice',
                'model' => 'Proforma Invoice',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:32:55+00',
                'created_at' => '2024-07-06 11:32:55+00',
            ),
            38 => 
            array (
                'permission' => 'edit_pending_purchasing_order',
                'model' => 'Purchasing Order',
                'creator_id' => 0,
                'updated_at' => '2024-10-25 11:52:31+00',
                'created_at' => '2024-10-25 11:52:31+00',
            ),
            39 => 
            array (
                'permission' => 'edit_pending_quotation',
                'model' => 'Quotation',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:32:46+00',
                'created_at' => '2024-07-06 11:32:46+00',
            ),
            40 => 
            array (
                'permission' => 'edit_price_note',
                'model' => 'Price Note',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:32:31+00',
                'created_at' => '2024-07-06 11:32:31+00',
            ),
            41 => 
            array (
                'permission' => 'edit_trip',
                'model' => 'Trip',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:32:05+00',
                'created_at' => '2024-07-06 11:32:05+00',
            ),
            42 => 
            array (
                'permission' => 'generate_price',
                'model' => 'Price',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:34:04+00',
                'created_at' => '2024-07-06 11:34:04+00',
            ),
            43 => 
            array (
                'permission' => 'generate_purchase',
                'model' => 'Purchase',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:31:46+00',
                'created_at' => '2024-07-06 11:31:46+00',
            ),
            44 => 
            array (
                'permission' => 'reassign_trip',
                'model' => 'Trip',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:31:36+00',
                'created_at' => '2024-07-06 11:31:36+00',
            ),
            45 => 
            array (
                'permission' => 'reject_account',
                'model' => 'Account',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:31:28+00',
                'created_at' => '2024-07-06 11:31:28+00',
            ),
            46 => 
            array (
                'permission' => 'reject_coin',
                'model' => 'Coin',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:31:21+00',
                'created_at' => '2024-07-06 11:31:21+00',
            ),
            47 => 
            array (
                'permission' => 'reject_payment',
                'model' => 'Payment',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:31:05+00',
                'created_at' => '2024-07-06 11:31:05+00',
            ),
            48 => 
            array (
                'permission' => 'reject_proforma_invoice',
                'model' => 'Proforma Invoice',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:30:30+00',
                'created_at' => '2024-07-06 11:30:30+00',
            ),
            49 => 
            array (
                'permission' => 'reject_purchasing_order',
                'model' => 'Purchasing Order',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:30:17+00',
                'created_at' => '2024-07-06 11:30:17+00',
            ),
            50 => 
            array (
                'permission' => 'reject_quotation',
                'model' => 'Quotation',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:29:57+00',
                'created_at' => '2024-07-06 11:29:57+00',
            ),
            51 => 
            array (
                'permission' => 'release_trip',
                'model' => 'Trip',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:30:08+00',
                'created_at' => '2024-07-06 11:30:08+00',
            ),
            52 => 
            array (
                'permission' => 'resubmit_account',
                'model' => 'Account',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:30:08+00',
                'created_at' => '2024-07-06 11:30:08+00',
            ),
            53 => 
            array (
                'permission' => 'stop_account',
                'model' => 'Account',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:30:08+00',
                'created_at' => '2024-07-06 11:30:08+00',
            ),
            54 => 
            array (
                'permission' => 'terminate_trip',
                'model' => 'Trip',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:33:16+00',
                'created_at' => '2024-07-06 11:33:16+00',
            ),
            55 => 
            array (
                'permission' => 'upload_price',
                'model' => 'Price',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:32:55+00',
                'created_at' => '2024-07-06 11:32:55+00',
            ),
            56 => 
            array (
                'permission' => 'verify_proforma_invoice',
                'model' => 'Proforma Invoice',
                'creator_id' => 0,
                'updated_at' => '2024-10-25 11:52:31+00',
                'created_at' => '2024-10-25 11:52:31+00',
            ),
            57 => 
            array (
                'permission' => 'verify_purchasing_order',
                'model' => 'Purchasing Order',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:32:46+00',
                'created_at' => '2024-07-06 11:32:46+00',
            ),
            58 => 
            array (
                'permission' => 'verify_quotation',
                'model' => 'Quotation',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:32:31+00',
                'created_at' => '2024-07-06 11:32:31+00',
            ),
            59 => 
            array (
                'permission' => 'view_account',
                'model' => 'Account',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:32:05+00',
                'created_at' => '2024-07-06 11:32:05+00',
            ),
            60 => 
            array (
                'permission' => 'view_address',
                'model' => 'Address',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:34:04+00',
                'created_at' => '2024-07-06 11:34:04+00',
            ),
            61 => 
            array (
                'permission' => 'view_coin',
                'model' => 'Coin',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:31:46+00',
                'created_at' => '2024-07-06 11:31:46+00',
            ),
            62 => 
            array (
                'permission' => 'view_customer',
                'model' => 'Customer',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:31:36+00',
                'created_at' => '2024-07-06 11:31:36+00',
            ),
            63 => 
            array (
                'permission' => 'view_job',
                'model' => 'Job',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:31:28+00',
                'created_at' => '2024-07-06 11:31:28+00',
            ),
            64 => 
            array (
                'permission' => 'view_order',
                'model' => 'Order',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:31:21+00',
                'created_at' => '2024-07-06 11:31:21+00',
            ),
            65 => 
            array (
                'permission' => 'view_payment',
                'model' => 'Payment',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:31:05+00',
                'created_at' => '2024-07-06 11:31:05+00',
            ),
            66 => 
            array (
                'permission' => 'view_price',
                'model' => 'Price',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:30:30+00',
                'created_at' => '2024-07-06 11:30:30+00',
            ),
            67 => 
            array (
                'permission' => 'view_price_note',
                'model' => 'Price Note',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:30:17+00',
                'created_at' => '2024-07-06 11:30:17+00',
            ),
            68 => 
            array (
                'permission' => 'view_purchase',
                'model' => 'Purchase',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:29:57+00',
                'created_at' => '2024-07-06 11:29:57+00',
            ),
            69 => 
            array (
                'permission' => 'view_trip',
                'model' => 'Trip',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:30:08+00',
                'created_at' => '2024-07-06 11:30:08+00',
            ),
        ));
        
        
    }
}