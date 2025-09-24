<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReviewsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        DB::table('reviews')->delete();
        
        DB::table('reviews')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Brainy Trex',
                'email' => 'brainytrex12@gmail.com',
                'country_code' => 'Malaysia',
                'phone' => '60123098515',
                'content' => 'Testing Almost Done',
                'approve' => true,
                'updated_at' => '2024-12-02 10:56:19+00',
                'created_at' => '2024-12-02 10:56:19+00',
                'rating' => '5',
            ),
        ));
        
        
    }
}