<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WhatsAppVideosTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        DB::table('whats_app_videos')->delete();
        
        DB::table('whats_app_videos')->insert(array (
            0 => 
            array (
                'id' => '1177790433570093',
                'url' => '/storage/1177790433570093.mp4',
                'caption' => NULL,
                'mime_type' => 'video/mp4',
                'created_at' => '2024-05-16 09:23:03',
                'updated_at' => '2024-05-16 09:23:03',
            ),
        ));
        
        
    }
}