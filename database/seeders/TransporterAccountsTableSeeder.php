<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransporterAccountsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        DB::table('transporter_accounts')->delete();

        DB::table('transporter_accounts')->insert(array(
            0 =>
            array(
                'id' => 0,
                'name' => 'No Account Holder Record',
                'number' => 'No Account Record',
                'bank' => 'No Bank Record',
                'transporter_id' => 0,
                'approved_at' => NULL,
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
        ));
    }
}
