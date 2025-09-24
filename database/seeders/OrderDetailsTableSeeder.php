<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderDetailsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        DB::table('order_details')->delete();

        DB::table('order_details')->insert(array(
            0 =>
            array(
                'id' => 1,
                'order_id' => 2501070001,
                'site_id' => 0,
                'status' => 'Created',
                'quantity' => 30,
                'total_kg' => 30000,
                'remark' => 'Testing Load 10 Wheel 30 Trips SQ 589 RM 620',
                'available_at' => Carbon::today(),
                'due_at' => Carbon::today()->addDays(2),
                'creator_id' => 4,
                'updated_at' => now(),
                'created_at' => now(),
                'hold_quantity' => 0,
                'cancel_quantity' => 0,
                'total' => 30,
                'hold' => 0,
                'cancel' => 0,
                'start_at' => Carbon::today(),
                'end_at' => Carbon::today()->addDays(2),
                'action' => 'Created',
            ),
            1 =>
            array(
                'id' => 2,
                'order_id' => 2501070002,
                'site_id' => 10,
                'status' => 'Created',
                'quantity' => 15,
                'total_kg' => 12000,
                'remark' => 'Testing Self-Pickup 6 Wheel 15 Trips SQ 228 RM 240',
                'available_at' => Carbon::today(),
                'due_at' => Carbon::today()->addDays(2),
                'creator_id' => 4,
                'updated_at' => now(),
                'created_at' => now(),
                'hold_quantity' => 0,
                'cancel_quantity' => 0,
                'total' => 15,
                'hold' => 0,
                'cancel' => 0,
                'start_at' => Carbon::today(),
                'end_at' => Carbon::today()->addDays(2),
                'action' => 'Created',
            ),
            2 =>
            array(
                'id' => 3,
                'order_id' => 2501070003,
                'site_id' => 3,
                'status' => 'Created',
                'quantity' => 40,
                'total_kg' => 40000,
                'remark' => 'Testing Tonne 12 Wheel 40 Trips SQ 699.20 RM 736',
                'available_at' => Carbon::today(),
                'due_at' => Carbon::today()->addDays(2),
                'creator_id' => 4,
                'updated_at' => now(),
                'created_at' => now(),
                'hold_quantity' => 0,
                'cancel_quantity' => 0,
                'total' => 40,
                'hold' => 0,
                'cancel' => 0,
                'start_at' => Carbon::today(),
                'end_at' => Carbon::today()->addDays(2),
                'action' => 'Created',
            ),
            3 =>
            array(
                'id' => 4,
                'order_id' => 2501070003,
                'site_id' => 3,
                'status' => 'Ongoing',
                'quantity' => 36,
                'total_kg' => 40000,
                'remark' => 'Testing Tonne 12 Wheel 40 Trips SQ 699.20 RM 736',
                'available_at' => Carbon::today(),
                'due_at' => Carbon::today()->addDays(2),
                'creator_id' => 4,
                'updated_at' => now(),
                'created_at' => now(),
                'hold_quantity' => 5,
                'cancel_quantity' => 4,
                'total' => 36,
                'hold' => 0,
                'cancel' => 4,
                'start_at' => Carbon::today(),
                'end_at' => Carbon::today()->addDays(2),
                'action' => 'Modified',
            ),
            4 =>
            array(
                'id' => 5,
                'order_id' => 2501070002,
                'site_id' => 10,
                'status' => 'Ongoing',
                'quantity' => 13,
                'total_kg' => 12000,
                'remark' => 'Testing Self-Pickup 6 Wheel 15 Trips SQ 228 RM 240',
                'available_at' => Carbon::today(),
                'due_at' => Carbon::today()->addDays(2),
                'creator_id' => 4,
                'updated_at' => now(),
                'created_at' => now(),
                'hold_quantity' => 3,
                'cancel_quantity' => 2,
                'total' => 13,
                'hold' => 0,
                'cancel' => 2,
                'start_at' => Carbon::today(),
                'end_at' => Carbon::today()->addDays(2),
                'action' => 'Modified',
            ),
            5 =>
            array(
                'id' => 6,
                'order_id' => 2501070001,
                'site_id' => 0,
                'status' => 'Ongoing',
                'quantity' => 27,
                'total_kg' => 30000,
                'remark' => 'Testing Load 10 Wheel 30 Trips SQ 589 RM 620',
                'available_at' => Carbon::today(),
                'due_at' => Carbon::today()->addDays(2),
                'creator_id' => 4,
                'updated_at' => now(),
                'created_at' => now(),
                'hold_quantity' => 4,
                'cancel_quantity' => 3,
                'total' => 27,
                'hold' => 0,
                'cancel' => 3,
                'start_at' => Carbon::today(),
                'end_at' => Carbon::today()->addDays(2),
                'action' => 'Modified',
            ),
        ));
    }
}
