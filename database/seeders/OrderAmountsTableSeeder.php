<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderAmountsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        DB::table('order_amounts')->delete();

        DB::table('order_amounts')->insert(array(
            0 =>
            array(
                'id' => 1,
                'order_id' => 2501070001,
                'order_amountable_id' => 364,
                'order_amountable_type' => 'material',
                'amount' => 1860000,
                'creator_id' => 4,
                'updated_at' => now(),
                'created_at' => now(),
            ),
            1 =>
            array(
                'id' => 2,
                'order_id' => 2501070002,
                'order_amountable_id' => 11,
                'order_amountable_type' => 'material',
                'amount' => 360000,
                'creator_id' => 4,
                'updated_at' => now(),
                'created_at' => now(),
            ),
            2 =>
            array(
                'id' => 3,
                'order_id' => 2501070003,
                'order_amountable_id' => 20,
                'order_amountable_type' => 'material',
                'amount' => 2720000,
                'creator_id' => 4,
                'updated_at' => now(),
                'created_at' => now(),
            ),
            3 =>
            array(
                'id' => 4,
                'order_id' => 2501070003,
                'order_amountable_id' => 1,
                'order_amountable_type' => 'transportation',
                'amount' => 224000,
                'creator_id' => 4,
                'updated_at' => now(),
                'created_at' => now(),
            ),
            4 =>
            array(
                'id' => 5,
                'order_id' => 2501070003,
                'order_amountable_id' => 1,
                'order_amountable_type' => 'coin_refund',
                'amount' => 294400,
                'creator_id' => 4,
                'updated_at' => now(),
                'created_at' => now(),
            ),
            5 =>
            array(
                'id' => 6,
                'order_id' => 2501070002,
                'order_amountable_id' => 2,
                'order_amountable_type' => 'coin_refund',
                'amount' => 48000,
                'creator_id' => 4,
                'updated_at' => now(),
                'created_at' => now(),
            ),
            6 =>
            array(
                'id' => 7,
                'order_id' => 2501070001,
                'order_amountable_id' => 3,
                'order_amountable_type' => 'coin_refund',
                'amount' => 186000,
                'creator_id' => 4,
                'updated_at' => now(),
                'created_at' => now(),
            ),
        ));
    }
}
