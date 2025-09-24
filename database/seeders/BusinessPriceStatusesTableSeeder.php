<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BusinessPriceStatusesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        DB::table('business_price_statuses')->delete();
        
        DB::table('business_price_statuses')->insert(array (
            0 => 
            array (
                'status' => 'Approve',
                'order' => 0,
                'creator_id' => 0,
                'created_at' => '2024-05-11 23:52:28',
                'updated_at' => '2024-05-11 23:52:28',
            ),
            1 => 
            array (
                'status' => 'Pending',
                'order' => 0,
                'creator_id' => 0,
                'created_at' => '2024-05-11 23:52:28',
                'updated_at' => '2024-05-11 23:52:28',
            ),
            2 => 
            array (
                'status' => 'Reject',
                'order' => 0,
                'creator_id' => 0,
                'created_at' => '2024-05-11 23:52:28',
                'updated_at' => '2024-05-11 23:52:28',
            ),
            3 => 
            array (
                'status' => 'Verified',
                'order' => 0,
                'creator_id' => 0,
                'created_at' => '2024-05-11 23:52:28',
                'updated_at' => '2024-05-11 23:52:28',
            ),
            4 => 
            array (
                'status' => 'Deleted',
                'order' => 0,
                'creator_id' => 0,
                'created_at' => '2024-05-11 23:52:28',
                'updated_at' => '2024-05-11 23:52:28',
            ),
        ));
        
        DB::update("alter table business_price_statuses ENABLE ROW LEVEL SECURITY;");        
        DB::update('create policy "Enable read access for all users" on "public"."business_price_statuses" as PERMISSIVE for SELECT to public using (true);'); 
    }
}