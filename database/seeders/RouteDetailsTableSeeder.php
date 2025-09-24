<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RouteDetailsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        DB::table('route_details')->delete();

        DB::table('route_details')->insert(array(
            0 =>
            array(
                'id' => 1,
                'purchase_id' => 2,
                'route_id' => 1,
                'site_id' => 3,
                'address_id' => 32,
                'creator_id' => 4,
                'updated_at' => now(),
                'created_at' => now(),
            ),
        ));
    }
}
