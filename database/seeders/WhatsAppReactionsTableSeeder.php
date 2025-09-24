<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WhatsAppReactionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        DB::table('whats_app_reactions')->delete();
        
        DB::table('whats_app_reactions')->insert(array (
            0 => 
            array (
                'id' => 'wamid.HBgLNjAxMzI0NjU2MDcVAgASGCAyRTY1Q0JFRTVCNTkzNkMxQkIyMzdENzhCNjUyMTYzNQA=',
                'message_id' => 'wamid.HBgLNjAxMzI0NjU2MDcVAgARGBJCODFCQzg0RDk3MEI3REJBRDcA',
                'emoji' => '👍🏻',
                'created_at' => '2024-05-16 09:22:22',
                'updated_at' => '2024-05-16 09:22:22',
            ),
        ));
        
        
    }
}