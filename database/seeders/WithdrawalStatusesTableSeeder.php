<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WithdrawalStatusesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        DB::table('withdrawal_statuses')->delete();

        DB::table('withdrawal_statuses')->insert(array(
            0 =>
            array(
                'status' => 'Pending',
                'rgba' => 'rgba(0, 0, 0, 1)',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            1 =>
            array(
                'status' => 'Verified',
                'rgba' => 'rgba(0, 0, 0, 1)',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            2 =>
            array(
                'status' => 'Cancelled',
                'rgba' => 'rgba(0, 0, 0, 1)',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            3 =>
            array(
                'status' => 'Approved',
                'rgba' => 'rgba(0, 0, 0, 1)',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            4 =>
            array(
                'status' => 'Rejected',
                'rgba' => 'rgba(0, 0, 0, 1)',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
        ));
    }
}
