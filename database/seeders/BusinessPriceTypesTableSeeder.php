<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BusinessPriceTypesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        DB::table('business_price_types')->delete();
        
        DB::table('business_price_types')->insert(array (
            0 => 
            array (
                'type' => 'Purchasing Order',
                'order' => 2,
                'creator_id' => 0,
                'created_at' => '2024-05-11 23:52:28',
                'updated_at' => '2024-05-11 23:52:28',
            ),
            1 => 
            array (
                'type' => 'Proforma Invoice',
                'order' => 3,
                'creator_id' => 0,
                'created_at' => '2024-05-11 23:52:28',
                'updated_at' => '2024-05-11 23:52:28',
            ),
            2 => 
            array (
                'type' => 'Quotation',
                'order' => 1,
                'creator_id' => 0,
                'created_at' => '2024-05-11 23:52:28',
                'updated_at' => '2024-05-11 23:52:28',
            ),
        ));
        
        DB::update("alter table business_price_types ENABLE ROW LEVEL SECURITY;");        
        DB::update('create policy "Enable read access for all users" on "public"."business_price_types" as PERMISSIVE for SELECT to public using (true);'); 
    }
}