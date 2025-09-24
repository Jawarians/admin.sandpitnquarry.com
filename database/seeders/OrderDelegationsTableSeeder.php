<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderDelegationsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        DB::table('order_delegations')->delete();

        DB::table('order_delegations')->insert(array(
            0 =>
            array(
                'id' => 1,
                'available' => 30,
                'updated_at' => now(),
                'created_at' => now(),
                'creator_id' => 4,
                'delegated' => 30,
                'end_at' => Carbon::today()->addDays(2),
                'order_detail_id' => 1,
                'start_at' => Carbon::today(),
                'status' => 'Ongoing',
                'total' => 30,
            ),
            1 =>
            array(
                'id' => 2,
                'available' => 15,
                'updated_at' => now(),
                'created_at' => now(),
                'creator_id' => 4,
                'delegated' => 15,
                'end_at' => Carbon::today()->addDays(2),
                'order_detail_id' => 2,
                'start_at' => Carbon::today(),
                'status' => 'Ongoing',
                'total' => 15,
            ),
            2 =>
            array(
                'id' => 3,
                'available' => 40,
                'updated_at' => now(),
                'created_at' => now(),
                'creator_id' => 4,
                'delegated' => 40,
                'end_at' => Carbon::today()->addDays(2),
                'order_detail_id' => 3,
                'start_at' => Carbon::today(),
                'status' => 'Ongoing',
                'total' => 40,
            ),
            3 =>
            array(
                'id' => 4,
                'available' => 31,
                'updated_at' => now(),
                'created_at' => now(),
                'creator_id' => 4,
                'delegated' => 31,
                'end_at' => Carbon::today()->addDays(2),
                'order_detail_id' => 4,
                'start_at' => Carbon::today(),
                'status' => 'Ongoing',
                'total' => 31,
            ),
            4 =>
            array(
                'id' => 5,
                'available' => 10,
                'updated_at' => now(),
                'created_at' => now(),
                'creator_id' => 4,
                'delegated' => 10,
                'end_at' => Carbon::today()->addDays(2),
                'order_detail_id' => 5,
                'start_at' => Carbon::today(),
                'status' => 'Ongoing',
                'total' => 10,
            ),
            5 =>
            array(
                'id' => 6,
                'available' => 23,
                'updated_at' => now(),
                'created_at' => now(),
                'creator_id' => 4,
                'delegated' => 23,
                'end_at' => Carbon::today()->addDays(2),
                'order_detail_id' => 6,
                'start_at' => Carbon::today(),
                'status' => 'Ongoing',
                'total' => 23,
            ),
        ));
    }
}
