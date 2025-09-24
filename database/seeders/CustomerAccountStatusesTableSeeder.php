<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomerAccountStatusesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        DB::table('customer_account_statuses')->delete();
        
        DB::table('customer_account_statuses')->insert(array (
            0 => 
            array (
                'status' => 'Approved',
            'rgba' => 'rgba(0, 0, 0, 1)',
                'creator_id' => 0,
                'updated_at' => '2024-09-23 14:55:14+00',
                'created_at' => '2024-09-23 14:55:12+00',
            ),
            1 => 
            array (
                'status' => 'Pending',
            'rgba' => 'rgba(0, 0, 0, 1)',
                'creator_id' => 0,
                'updated_at' => '2024-09-23 14:54:28+00',
                'created_at' => '2024-09-23 14:54:26+00',
            ),
            2 => 
            array (
                'status' => 'Reject',
            'rgba' => 'rgba(0, 0, 0, 1)',
                'creator_id' => 0,
                'updated_at' => '2024-09-23 14:55:39+00',
                'created_at' => '2024-09-23 14:55:37+00',
            ),
        ));
        
        
    }
}