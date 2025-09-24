<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FavouritesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        DB::table('favourites')->delete();
        
        DB::table('favourites')->insert(array (
            0 => 
            array (
                'id' => 1,
                'user_id' => 4,
                'product_id' => 1,
                'creator_id' => 4,
                'updated_at' => '2024-12-04 01:52:19+00',
                'created_at' => '2024-12-04 01:52:22+00',
            ),
        ));
        
        
    }
}