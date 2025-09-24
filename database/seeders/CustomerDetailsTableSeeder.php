<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomerDetailsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        DB::table('customer_details')->delete();
        
        DB::table('customer_details')->insert(array (
            0 => 
            array (
                'id' => 1,
                'customer_id' => 20,
                'type' => 'SSM',
                'value' => 'ABC1234',
                'creator_id' => 0,
                'created_at' => '2024-11-28 06:23:56+00',
                'updated_at' => '2024-11-28 06:23:56+00',
            ),
            1 => 
            array (
                'id' => 2,
                'customer_id' => 27,
                'type' => 'SSM',
                'value' => 'ABC1234',
                'creator_id' => 0,
                'created_at' => '2024-11-28 06:26:13+00',
                'updated_at' => '2024-11-28 06:26:13+00',
            ),
        ));
        
        
    }
}