<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HeroHeadersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        DB::table('hero_headers')->delete();
        
        DB::table('hero_headers')->insert(array (
            0 => 
            array (
                'id' => 1,
                'title' => 'We Got The Drive To Keep Your Goods Moving.',
                'subtitle' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
                'link' => 'https://google.com',
                'cta' => 'Get Started',
                'image' => 'https://storage.googleapis.com/snq-website-images/customer/header.png?t=2024-04-25T06%3A32%3A14.313Z',
                'start_at' => '2023-11-17 12:25:08',
                'end_at' => '2023-12-01 12:25:08',
                'creator_id' => 1,
                'created_at' => '2023-11-24 12:25:08',
                'updated_at' => '2023-11-24 12:25:08',
            ),
            1 => 
            array (
                'id' => 2,
                'title' => ' ',
                'subtitle' => ' ',
                'link' => ' ',
                'cta' => ' ',
                'image' => 'https://storage.googleapis.com/snq-website-images/customer/adbanner.jpg?t=2024-04-25T06%3A32%3A31.650Z',
                'start_at' => '2023-11-17 12:25:08',
                'end_at' => '2024-12-01 12:25:08',
                'creator_id' => 1,
                'created_at' => '2023-11-24 12:25:08',
                'updated_at' => '2023-11-24 12:25:08',
            ),
            2 => 
            array (
                'id' => 3,
                'title' => ' ',
                'subtitle' => ' ',
                'link' => ' ',
                'cta' => ' ',
                'image' => 'https://storage.googleapis.com/snq-website-images/customer/adbanner2.jpg?t=2024-04-25T06%3A32%3A39.646Z',
                'start_at' => '2023-11-17 12:25:08',
                'end_at' => '2024-12-01 12:25:08',
                'creator_id' => 1,
                'created_at' => '2023-11-24 12:25:08',
                'updated_at' => '2023-11-24 12:25:08',
            ),
            3 => 
            array (
                'id' => 4,
                'title' => ' ',
                'subtitle' => ' ',
                'link' => ' ',
                'cta' => ' ',
                'image' => 'https://storage.googleapis.com/snq-website-images/customer/Banner_1.jpeg?t=2024-04-25T06%3A32%3A46.163Z',
                'start_at' => '2023-11-17 12:25:08',
                'end_at' => '2025-12-01 12:25:08',
                'creator_id' => 1,
                'created_at' => '2023-11-24 12:25:08',
                'updated_at' => '2023-11-24 12:25:08',
            ),
        ));
        
        
    }
}