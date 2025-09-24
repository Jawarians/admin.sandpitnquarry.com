<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BillsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        DB::table('bills')->delete();
        
        DB::table('bills')->insert(array (
            0 => 
            array (
                'id' => 0,
                'transporter_id' => 0,
                'amount' => 0,
                'creator_id' => 0,
                'created_at' => '2024-04-18 03:12:13',
                'updated_at' => '2024-04-18 03:12:13',
            ),
        ));
        
        
    }
}