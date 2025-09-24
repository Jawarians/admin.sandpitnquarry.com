<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PricesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        DB::table('prices')->delete();

        DB::table('prices')->insert(array(
            0 =>
            array(
                'id' => 1,
                'name' => 'First Price List',
                'published_at' => '2024-01-01 09:00:00',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
        ));
    }
}
