<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CoinsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        DB::table('coins')->delete();

        DB::table('coins')->insert(array(
            0 =>
            array(
                'id' => 1,
                'user_id' => 4,
                'amount' => 9000000,
                'coinable_id' => 1,
                'coinable_type' => 'reload',
                'creator_id' => 4,
                'updated_at' => now(),
                'created_at' => now(),
            ),
            1 =>
            array(
                'id' => 2,
                'user_id' => 4,
                'amount' => -2109000,
                'coinable_id' => 1,
                'coinable_type' => 'purchase',
                'creator_id' => 4,
                'updated_at' => now(),
                'created_at' => now(),
            ),
            2 =>
            array(
                'id' => 3,
                'user_id' => 4,
                'amount' => -2796800,
                'coinable_id' => 2,
                'coinable_type' => 'purchase',
                'creator_id' => 4,
                'updated_at' => now(),
                'created_at' => now(),
            ),
            3 =>
            array(
                'id' => 4,
                'user_id' => 4,
                'amount' => 279680,
                'coinable_id' => 2501070003,
                'coinable_type' => 'order',
                'creator_id' => 4,
                'updated_at' => now(),
                'created_at' => now(),
            ),
            4 =>
            array(
                'id' => 5,
                'user_id' => 4,
                'amount' => 45600,
                'coinable_id' => 2501070002,
                'coinable_type' => 'order',
                'creator_id' => 4,
                'updated_at' => now(),
                'created_at' => now(),
            ),
            5 =>
            array(
                'id' => 6,
                'user_id' => 4,
                'amount' => 176700,
                'coinable_id' => 2501070001,
                'coinable_type' => 'order',
                'creator_id' => 4,
                'updated_at' => now(),
                'created_at' => now(),
            ),
            array(
                'id' => 7,
                'user_id' => 3479,
                'amount' => 10000000,
                'coinable_id' => 1,
                'coinable_type' => 'reload',
                'creator_id' => 4,
                'updated_at' => now(),
                'created_at' => now(),
            ),
             array(
                'id' => 8,
                'user_id' => 3480,
                'amount' => 10000000,
                'coinable_id' => 1,
                'coinable_type' => 'reload',
                'creator_id' => 4,
                'updated_at' => now(),
                'created_at' => now(),
            ),
        ));
    }
}
