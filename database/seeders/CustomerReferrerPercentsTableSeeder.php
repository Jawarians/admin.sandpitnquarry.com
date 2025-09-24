<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomerReferrerPercentsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        DB::table('customer_referrer_percents')->delete();

        DB::table('customer_referrer_percents')->insert(array(
            0 =>
            array(
                'id' => 1,
                'percent' => '3',
                'start_at' => '2023-10-10 04:56:42',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
        ));
    }
}
