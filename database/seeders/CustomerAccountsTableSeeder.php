<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomerAccountsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        DB::table('customer_accounts')->delete();
        
        DB::table('customer_accounts')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Customer',
                'number' => '121234345656',
                'bank' => 'Agro Bank',
                'status' => 'Approved',
                'user_id' => 4,
                'approved_at' => '2025-01-14 18:59:06',
                'creator_id' => 4,
                'approver_id' => 10,
                'deleted_at' => NULL,
                'updated_at' => '2025-01-14 18:58:36',
                'created_at' => '2025-01-14 18:58:40',
            ),
        ));
        
        
    }
}