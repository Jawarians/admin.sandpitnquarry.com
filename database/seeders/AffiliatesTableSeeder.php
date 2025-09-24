<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AffiliatesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        DB::table('affiliates')->insert(array(
            0 =>
            array(
                'id' => 0,
                'initial' => 'SQ',
                'registration_number' => 'SQ',
                'address_1' => 'Lot 769-1 &2, Lot 770-1/2',
                'address_2' => 'Jalan Kuala Selangor',
                'address_3' => '45600 Bestari Jaya, Selangor',
                'phone' => '603-32791684',
                'fax' => '603-32791684',
                'email' => 'it@sandpitnquarry.com',
                'account_number' => 'SQ',
                'bank' => 'Maybank',
                'active' => false,
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            1 =>
            array(
                'id' => 1,
                'initial' => 'CS',
                'registration_number' => '840671-T',
                'address_1' => 'LOT 769-1/2 & 770-1/2, JALAN KUALA SELANGOR',
                'address_2' => 'KAMPUNG BARU IJOK',
                'address_3' => '45620, BESTARI JAYA, SELANGOR',
                'phone' => '03-32792388',
                'fax' => '03-32793288',
                'email' => 'sales@changshi.com.my',
                'account_number' => '123456789',
                'bank' => 'Maybank',
                'active' => true,
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            2 =>
            array(
                'id' => 2,
                'initial' => 'PP',
                'registration_number' => '1171071-X',
                'address_1' => 'N0. 242, KAMPUNG BARU IJOK',
                'address_2' => 'SIMPANG IJOK',
                'address_3' => '45620, BATANG BERJUNTAI, SELANGOR',
                'phone' => '6018-2059770',
                'fax' => NULL,
                'email' => 'popularpillar@gmail.com',
                'account_number' => '123456789',
                'bank' => 'Maybank',
                'active' => true,
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            3 =>
            array(
                'id' => 3,
                'initial' => 'OP',
                'registration_number' => '201901018685 (1328014-H)',
                'address_1' => 'A-18-3A, BLOK A, PANGSAPURI PALM GARDEN',
                'address_2' => 'PERSIARAN BUKIT RAJA, BANDAR BARU KLANG',
                'address_3' => '41150 KLANG, SELANGOR DARUL EHSAN',
                'phone' => '603-33423996',
                'fax' => '603-33423996',
                'email' => 'oasispollygon@gmail.com',
                'account_number' => '3216-547-535',
                'bank' => 'PUBLIC BANK',
                'active' => true,
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
        ));
    }
}
