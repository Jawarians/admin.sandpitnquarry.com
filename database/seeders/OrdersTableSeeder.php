<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrdersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        DB::table('orders')->delete();

        DB::table('orders')->insert(array(
            0 =>
            array(
                'id' => 2501070003,
                'purchase_id' => 2,
                'user_id' => 4,
                'address_id' => 32,
                'product_id' => 4,
                'price_item_id' => 20,
                'unit' => 'Tonne',
                'price_per_unit' => 1840,
                'wheel_id' => 12,
                'creator_id' => 4,
                'updated_at' => now(),
                'created_at' => now(),
                'status' => 'Ongoing',
            ),
            1 =>
            array(
                'id' => 2501070002,
                'purchase_id' => 1,
                'user_id' => 4,
                'address_id' => 0,
                'product_id' => 16,
                'price_item_id' => 11,
                'unit' => 'Tonne',
                'price_per_unit' => 2000,
                'wheel_id' => 6,
                'creator_id' => 4,
                'updated_at' => now(),
                'created_at' => now(),
                'status' => 'Ongoing',
            ),
            2 =>
            array(
                'id' => 2501070001,
                'purchase_id' => 1,
                'user_id' => 4,
                'address_id' => 30,
                'product_id' => 1,
                'price_item_id' => 364,
                'unit' => 'Load',
                'price_per_unit' => 62000,
                'wheel_id' => 10,
                'creator_id' => 4,
                'updated_at' => now(),
                'created_at' => now(),
                'status' => 'Ongoing',
            ),
        ));
    }
}
