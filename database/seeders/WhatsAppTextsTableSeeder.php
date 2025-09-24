<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WhatsAppTextsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        DB::table('whats_app_texts')->delete();
        
        DB::table('whats_app_texts')->insert(array (
            0 => 
            array (
                'id' => 'ABGGFlA5Fpa',
                'body' => 'this is a text message',
                'created_at' => '2024-05-11 13:04:11',
                'updated_at' => '2024-05-11 13:04:11',
            ),
            1 => 
            array (
                'id' => 'wamid.HBgLNjAxMzI0NjU2MDcVAgASGCBCRTBBMkJCNUU5OTZBQUUyRjA5NjJEQzAxOTQ1REE0QgA=',
                'body' => 'Assalamualaikum',
                'created_at' => '2024-05-11 13:07:19',
                'updated_at' => '2024-05-11 13:07:19',
            ),
            2 => 
            array (
                'id' => 'wamid.HBgLNjAxMzI0NjU2MDcVAgASGCBCRUI1NTIwRDU3ODJBNDAyOUU0OTVGNzE5QUQ3MzgzQwA=',
                'body' => 'Hai',
                'created_at' => '2024-05-11 13:05:09',
                'updated_at' => '2024-05-11 13:05:09',
            ),
            3 => 
            array (
                'id' => 'wamid.HBgLNjAxMzI0NjU2MDcVAgASGCAwNzM2QzFGRTkzNjFEQTFCNzNDOUY3OTM0QURFM0YzRgA=',
                'body' => '👍🏻',
                'created_at' => '2024-05-16 09:23:35',
                'updated_at' => '2024-05-16 09:23:35',
            ),
        ));
        
        
    }
}