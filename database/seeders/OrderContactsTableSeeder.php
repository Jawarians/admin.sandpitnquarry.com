<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderContactsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        DB::table('order_contacts')->delete();

        DB::table('order_contacts')->insert(array(
            0 =>
            array(
                'id' => 1,
                'order_detail_id' => 1,
                'name' => 'MR TEST LOAD',
                'country_code' => 'Malaysia',
                'phone' => '601034344545',
                'creator_id' => 4,
                'updated_at' => now(),
                'created_at' => now(),
            ),
            1 =>
            array(
                'id' => 2,
                'order_detail_id' => 1,
                'name' => 'MS TEST LOAD',
                'country_code' => 'Malaysia',
                'phone' => '601023233434',
                'creator_id' => 4,
                'updated_at' => now(),
                'created_at' => now(),
            ),
            2 =>
            array(
                'id' => 3,
                'order_detail_id' => 2,
                'name' => 'MR TEST SELF-PICKUP',
                'country_code' => 'Malaysia',
                'phone' => '601034344545',
                'creator_id' => 4,
                'updated_at' => now(),
                'created_at' => now(),
            ),
            3 =>
            array(
                'id' => 4,
                'order_detail_id' => 3,
                'name' => 'MS TEST TONNE',
                'country_code' => 'Malaysia',
                'phone' => '601056566767',
                'creator_id' => 4,
                'updated_at' => now(),
                'created_at' => now(),
            ),
            4 =>
            array(
                'id' => 5,
                'order_detail_id' => 3,
                'name' => 'MRS TEST TONNE',
                'country_code' => 'Malaysia',
                'phone' => '601078788989',
                'creator_id' => 4,
                'updated_at' => now(),
                'created_at' => now(),
            ),
            5 =>
            array(
                'id' => 6,
                'order_detail_id' => 4,
                'name' => 'MRS TEST TONNE',
                'country_code' => 'Malaysia',
                'phone' => '601078788989',
                'creator_id' => 4,
                'updated_at' => now(),
                'created_at' => now(),
            ),
            6 =>
            array(
                'id' => 7,
                'order_detail_id' => 4,
                'name' => 'MS TEST TONNE',
                'country_code' => 'Malaysia',
                'phone' => '601056566767',
                'creator_id' => 4,
                'updated_at' => now(),
                'created_at' => now(),
            ),
            7 =>
            array(
                'id' => 8,
                'order_detail_id' => 5,
                'name' => 'MR TEST SELF-PICKUP',
                'country_code' => 'Malaysia',
                'phone' => '601034344545',
                'creator_id' => 4,
                'updated_at' => now(),
                'created_at' => now(),
            ),
            8 =>
            array(
                'id' => 9,
                'order_detail_id' => 6,
                'name' => 'MS TEST LOAD',
                'country_code' => 'Malaysia',
                'phone' => '601023233434',
                'creator_id' => 4,
                'updated_at' => now(),
                'created_at' => now(),
            ),
            9 =>
            array(
                'id' => 10,
                'order_detail_id' => 6,
                'name' => 'MR TEST LOAD',
                'country_code' => 'Malaysia',
                'phone' => '601034344545',
                'creator_id' => 4,
                'updated_at' => now(),
                'created_at' => now(),
            ),
        ));
    }
}
