<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TripRejectionReasonsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        DB::table('trip_rejection_reasons')->delete();

        DB::table('trip_rejection_reasons')->insert(array(
            0 =>
            array(
                'id' => 1,
                'title' => 'Others',
                'hide' => false,
                'remark' => true,
                'order' => 10,
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            1 =>
            array(
                'id' => 2,
                'title' => 'Quality',
                'hide' => false,
                'remark' => true,
                'order' => 1,
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            2 =>
            array(
                'id' => 3,
                'title' => 'Wrong product',
                'hide' => false,
                'remark' => false,
                'order' => 2,
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            3 =>
            array(
                'id' => 4,
                'title' => 'Wrong time',
                'hide' => false,
                'remark' => false,
                'order' => 3,
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            4 =>
            array(
                'id' => 5,
                'title' => 'Wrong location',
                'hide' => false,
                'remark' => false,
                'order' => 4,
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
        ));
    }
}
