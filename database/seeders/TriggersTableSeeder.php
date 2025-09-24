<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TriggersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        DB::table('triggers')->delete();

        DB::table('triggers')->insert(array(
            0 =>
            array(
                'trigger' => 'account_detail_item_created',
                'model' => 'AccountDetailItemCreated',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            1 =>
            array(
                'trigger' => 'business_price_detail_created',
                'model' => 'BusinessPriceDetail',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            2 =>
            array(
                'trigger' => 'order_cancelled',
                'model' => 'OrderCancelled',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            3 =>
            array(
                'trigger' => 'payment_detail_created',
                'model' => 'PaymentDetailCreated',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
        ));
    }
}
