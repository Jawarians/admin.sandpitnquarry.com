<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AnnouncementTriggersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        DB::table('announcement_triggers')->insert(array(
            0 =>
            array(
                'id' => 1,
                'trigger' => 'account_detail_item_created',
                'permission' => 'activate_account',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            1 =>
            array(
                'id' => 2,
                'trigger' => 'account_detail_item_created',
                'permission' => 'stop_account',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            2 =>
            array(
                'id' => 3,
                'trigger' => 'account_detail_item_created',
                'permission' => 'reject_account',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            3 =>
            array(
                'id' => 4,
                'trigger' => 'account_detail_item_created',
                'permission' => 'approve_account',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            4 =>
            array(
                'id' => 5,
                'trigger' => 'account_detail_item_created',
                'permission' => 'activate_account',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            5 =>
            array(
                'id' => 6,
                'trigger' => 'business_price_detail_created',
                'permission' => 'view_price',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            6 =>
            array(
                'id' => 7,
                'trigger' => 'business_price_detail_created',
                'permission' => 'reject_proforma_invoice',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            7 =>
            array(
                'id' => 8,
                'trigger' => 'business_price_detail_created',
                'permission' => 'verify_proforma_invoice',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            8 =>
            array(
                'id' => 9,
                'trigger' => 'business_price_detail_created',
                'permission' => 'approve_proforma_invoice',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            9 =>
            array(
                'id' => 10,
                'trigger' => 'business_price_detail_created',
                'permission' => 'reject_purchasing_order',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            10 =>
            array(
                'id' => 11,
                'trigger' => 'business_price_detail_created',
                'permission' => 'verify_purchasing_order',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            11 =>
            array(
                'id' => 12,
                'trigger' => 'business_price_detail_created',
                'permission' => 'approve_purchasing_order',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            12 =>
            array(
                'id' => 13,
                'trigger' => 'business_price_detail_created',
                'permission' => 'reject_quotation',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            13 =>
            array(
                'id' => 14,
                'trigger' => 'business_price_detail_created',
                'permission' => 'verify_quotation',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            14 =>
            array(
                'id' => 15,
                'trigger' => 'business_price_detail_created',
                'permission' => 'approve_quotation',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            15 =>
            array(
                'id' => 16,
                'trigger' => 'payment_detail_created',
                'permission' => 'add_payment',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            16 =>
            array(
                'id' => 17,
                'trigger' => 'payment_detail_created',
                'permission' => 'approve_payment',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            17 =>
            array(
                'id' => 18,
                'trigger' => 'payment_detail_created',
                'permission' => 'reject_payment',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            18 =>
            array(
                'id' => 19,
                'trigger' => 'account_detail_item_created',
                'permission' => 'add_account',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            19 =>
            array(
                'id' => 20,
                'trigger' => 'business_price_detail_created',
                'permission' => 'add_proforma_invoice',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            20 =>
            array(
                'id' => 21,
                'trigger' => 'business_price_detail_created',
                'permission' => 'add_purchasing_order',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            21 =>
            array(
                'id' => 22,
                'trigger' => 'business_price_detail_created',
                'permission' => 'add_quotation',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            22 =>
            array(
                'id' => 23,
                'trigger' => 'order_cancelled',
                'permission' => 'add_order',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            23 =>
            array(
                'id' => 24,
                'trigger' => 'order_cancelled',
                'permission' => 'cancel_order',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
        ));
    }
}
