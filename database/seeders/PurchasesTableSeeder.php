<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PurchasesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        DB::table('purchases')->delete();

        DB::table('purchases')->insert(array(
            0 =>
            array(
                'id' => 1,
                'user_id' => 4,
                'creator_id' => 4,
                'token_rate' => 95,
                'updated_at' => now(),
                'created_at' => now(),
            ),
            1 =>
            array(
                'id' => 2,
                'user_id' => 4,
                'creator_id' => 4,
                'token_rate' => 95,
                'updated_at' => now(),
                'created_at' => now(),
            ),
        ));
    }
}
