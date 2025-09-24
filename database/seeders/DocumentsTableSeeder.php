<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DocumentsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        DB::table('documents')->delete();
        
        DB::table('documents')->insert(array (
            0 => 
            array (
                'id' => 1,
                'documentable_id' => 1,
                'documentable_type' => 'customer_account',
                'label' => '_f824c9b3-ce9e-4949-a28d-f4de107d2f27
',
                'path' => 'https://xqdhqrijnrkgoxzpptwq.supabase.co/storage/v1/object/public/documents/customer_account/2/rakdL4YOS39M3jZ.jpeg
',
                'creator_id' => 4,
                'deleted_at' => NULL,
                'updated_at' => '2025-01-14 19:01:48',
                'created_at' => '2025-01-14 19:01:50',
            ),
        ));
        
        
    }
}