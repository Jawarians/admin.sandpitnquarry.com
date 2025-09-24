<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WhatsAppUsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        DB::table('whats_app_users')->delete();
        
        DB::table('whats_app_users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'user_id' => 3460,
                'phone_number' => '601123216372',
                'creator_id' => 3460,
                'created_at' => '2024-04-18 21:52:35',
                'updated_at' => '2024-04-18 21:52:35',
            ),
            1 => 
            array (
                'id' => 2,
                'user_id' => 3455,
                'phone_number' => '601112105466',
                'creator_id' => 3455,
                'created_at' => '2024-04-21 19:12:59',
                'updated_at' => '2024-04-21 19:12:59',
            ),
            2 => 
            array (
                'id' => 3,
                'user_id' => 3458,
                'phone_number' => '60162875842',
                'creator_id' => 3458,
                'created_at' => '2024-04-24 11:47:23',
                'updated_at' => '2024-04-24 11:47:23',
            ),
            3 => 
            array (
                'id' => 4,
                'user_id' => 3464,
                'phone_number' => '60132465607',
                'creator_id' => 3464,
                'created_at' => '2024-04-24 13:49:34',
                'updated_at' => '2024-04-24 13:49:34',
            ),
            4 => 
            array (
                'id' => 5,
                'user_id' => 3462,
                'phone_number' => '60163680453',
                'creator_id' => 3462,
                'created_at' => '2024-04-29 21:25:15',
                'updated_at' => '2024-04-29 21:25:15',
            ),
            5 => 
            array (
                'id' => 6,
                'user_id' => 3461,
                'phone_number' => '60166540894',
                'creator_id' => 3461,
                'created_at' => '2024-04-30 11:53:40',
                'updated_at' => '2024-04-30 11:53:40',
            ),
        ));
        
        
    }
}