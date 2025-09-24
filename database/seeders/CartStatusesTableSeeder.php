<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CartStatusesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        DB::table('cart_statuses')->delete();

        DB::table('cart_statuses')->insert(array(
            0 =>
            array(
                'status' => 'Pending',
                'rgba' => 'rgba(117, 135, 57, 1)',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:33:16+00',
                'created_at' => '2024-07-06 11:33:16+00',
            ),
            1 =>
            array(
                'status' => 'Paid',
                'rgba' => 'rgba(92, 161, 59, 1)',
                'creator_id' => 0,
                'updated_at' => '2024-07-06 11:32:55+00',
                'created_at' => '2024-07-06 11:32:55+00',
            ),
            2 =>
            array(
                'status' => 'Expired',
                'rgba' => 'rgba(52, 106, 199, 1)',
                'creator_id' => 0,
                'updated_at' => '2024-10-25 11:52:31+00',
                'created_at' => '2024-10-25 11:52:31+00',
            ),
        ));
    }
}
