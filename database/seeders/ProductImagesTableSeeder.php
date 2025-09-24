<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductImagesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_images')->delete();

        DB::table('product_images')->insert(array(
            0 =>
            array(
                'id' => 1,
                'product_id' => 1,
                'url' => 'https://storage.googleapis.com/snq-website-images/customer/fine_1.png',
                'featured' => true,
                'creator_id' => 0,
                'created_at' => '2023-11-24 12:25:09',
                'updated_at' => '2023-11-24 12:25:09',
            ),
            1 =>
            array(
                'id' => 2,
                'product_id' => 1,
                'url' => 'https://storage.googleapis.com/snq-website-images/customer/fine_2.png?t=2024-04-25T06%3A25%3A35.339Z',
                'featured' => false,
                'creator_id' => 0,
                'created_at' => '2023-11-24 12:25:09',
                'updated_at' => '2023-11-24 12:25:09',
            ),
            2 =>
            array(
                'id' => 3,
                'product_id' => 2,
                'url' => 'https://storage.googleapis.com/snq-website-images/customer/coarse_1.png?t=2024-04-25T06%3A25%3A46.617Z',
                'featured' => true,
                'creator_id' => 0,
                'created_at' => '2023-11-24 12:25:09',
                'updated_at' => '2023-11-24 12:25:09',
            ),
            3 =>
            array(
                'id' => 4,
                'product_id' => 2,
                'url' => 'https://storage.googleapis.com/snq-website-images/customer/coarse_2.png',
                'featured' => false,
                'creator_id' => 0,
                'created_at' => '2023-11-24 12:25:09',
                'updated_at' => '2023-11-24 12:25:09',
            ),
            4 =>
            array(
                'id' => 5,
                'product_id' => 3,
                'url' => 'https://storage.googleapis.com/snq-website-images/customer/river_1.png?t=2024-04-25T06%3A26%3A20.820Z',
                'featured' => true,
                'creator_id' => 0,
                'created_at' => '2023-11-24 12:25:09',
                'updated_at' => '2023-11-24 12:25:09',
            ),
            5 =>
            array(
                'id' => 6,
                'product_id' => 3,
                'url' => 'https://storage.googleapis.com/snq-website-images/customer/river_2.png?t=2024-04-25T06%3A26%3A27.437Z',
                'featured' => false,
                'creator_id' => 0,
                'created_at' => '2023-11-24 12:25:09',
                'updated_at' => '2023-11-24 12:25:09',
            ),
            6 =>
            array(
                'id' => 7,
                'product_id' => 4,
                'url' => 'https://storage.googleapis.com/snq-website-images/customer/dumping_1.png?t=2024-04-25T06%3A26%3A36.962Z',
                'featured' => true,
                'creator_id' => 0,
                'created_at' => '2023-11-24 12:25:09',
                'updated_at' => '2023-11-24 12:25:09',
            ),
            7 =>
            array(
                'id' => 8,
                'product_id' => 4,
                'url' => 'https://storage.googleapis.com/snq-website-images/customer/dumping_2.png',
                'featured' => false,
                'creator_id' => 0,
                'created_at' => '2023-11-24 12:25:09',
                'updated_at' => '2023-11-24 12:25:09',
            ),
            8 =>
            array(
                'id' => 9,
                'product_id' => 5,
                'url' => 'https://storage.googleapis.com/snq-website-images/customer/aggregate_1.png?t=2024-04-25T06%3A26%3A53.290Z',
                'featured' => true,
                'creator_id' => 0,
                'created_at' => '2023-11-24 12:25:09',
                'updated_at' => '2023-11-24 12:25:09',
            ),
            9 =>
            array(
                'id' => 10,
                'product_id' => 5,
                'url' => 'https://storage.googleapis.com/snq-website-images/customer/aggregate_2.png?t=2024-04-25T06%3A27%3A01.441Z',
                'featured' => false,
                'creator_id' => 0,
                'created_at' => '2023-11-24 12:25:09',
                'updated_at' => '2023-11-24 12:25:09',
            ),
            10 =>
            array(
                'id' => 11,
                'product_id' => 6,
                'url' => 'https://storage.googleapis.com/snq-website-images/customer/pebble_1.png?t=2024-04-25T06%3A27%3A12.230Z',
                'featured' => true,
                'creator_id' => 0,
                'created_at' => '2023-11-24 12:25:09',
                'updated_at' => '2023-11-24 12:25:09',
            ),
            11 =>
            array(
                'id' => 12,
                'product_id' => 6,
                'url' => 'https://storage.googleapis.com/snq-website-images/customer/pebble_2.png?t=2024-04-25T06%3A27%3A21.302Z',
                'featured' => false,
                'creator_id' => 0,
                'created_at' => '2023-11-24 12:25:09',
                'updated_at' => '2023-11-24 12:25:09',
            ),
            12 =>
            array(
                'id' => 13,
                'product_id' => 7,
                'url' => 'https://storage.googleapis.com/snq-website-images/customer/crusher_1.png?t=2024-04-25T06%3A27%3A30.256Z',
                'featured' => true,
                'creator_id' => 0,
                'created_at' => '2023-11-24 12:25:09',
                'updated_at' => '2023-11-24 12:25:09',
            ),
            13 =>
            array(
                'id' => 14,
                'product_id' => 7,
                'url' => 'https://storage.googleapis.com/snq-website-images/customer/crusher_2.png',
                'featured' => false,
                'creator_id' => 0,
                'created_at' => '2023-11-24 12:25:09',
                'updated_at' => '2023-11-24 12:25:09',
            ),
            14 =>
            array(
                'id' => 15,
                'product_id' => 8,
                'url' => 'https://storage.googleapis.com/snq-website-images/customer/chipping_1.png?t=2024-04-25T06%3A28%3A19.971Z',
                'featured' => true,
                'creator_id' => 0,
                'created_at' => '2023-11-24 12:25:09',
                'updated_at' => '2023-11-24 12:25:09',
            ),
            15 =>
            array(
                'id' => 16,
                'product_id' => 8,
                'url' => 'https://storage.googleapis.com/snq-website-images/customer/chipping_2.png?t=2024-04-25T06%3A28%3A28.776Z',
                'featured' => false,
                'creator_id' => 0,
                'created_at' => '2023-11-24 12:25:09',
                'updated_at' => '2023-11-24 12:25:09',
            ),
            16 =>
            array(
                'id' => 17,
                'product_id' => 9,
                'url' => 'https://storage.googleapis.com/snq-website-images/customer/hardcore_1.png?t=2024-04-25T06%3A28%3A59.987Z',
                'featured' => true,
                'creator_id' => 0,
                'created_at' => '2023-11-24 12:25:09',
                'updated_at' => '2023-11-24 12:25:09',
            ),
            17 =>
            array(
                'id' => 18,
                'product_id' => 9,
                'url' => 'https://storage.googleapis.com/snq-website-images/customer/hardcore_2.png?t=2024-04-25T06%3A29%3A09.571Z',
                'featured' => false,
                'creator_id' => 0,
                'created_at' => '2023-11-24 12:25:09',
                'updated_at' => '2023-11-24 12:25:09',
            ),
            18 =>
            array(
                'id' => 19,
                'product_id' => 10,
                'url' => 'https://storage.googleapis.com/snq-website-images/customer/simen_1.png?t=2024-04-25T06%3A29%3A18.067Z',
                'featured' => true,
                'creator_id' => 0,
                'created_at' => '2023-11-24 12:25:09',
                'updated_at' => '2023-11-24 12:25:09',
            ),
            19 =>
            array(
                'id' => 20,
                'product_id' => 10,
                'url' => 'https://storage.googleapis.com/snq-website-images/customer/simen_2.png?t=2024-04-25T06%3A29%3A25.277Z',
                'featured' => false,
                'creator_id' => 0,
                'created_at' => '2023-11-24 12:25:09',
                'updated_at' => '2023-11-24 12:25:09',
            ),
            20 =>
            array(
                'id' => 21,
                'product_id' => 11,
                'url' => 'https://storage.googleapis.com/snq-website-images/customer/plaster_1.png?t=2024-04-25T06%3A29%3A34.204Z',
                'featured' => true,
                'creator_id' => 0,
                'created_at' => '2023-11-24 12:25:09',
                'updated_at' => '2023-11-24 12:25:09',
            ),
            21 =>
            array(
                'id' => 22,
                'product_id' => 11,
                'url' => 'https://storage.googleapis.com/snq-website-images/customer/plaster_2.png?t=2024-04-25T06%3A29%3A45.357Z',
                'featured' => false,
                'creator_id' => 0,
                'created_at' => '2023-11-24 12:25:09',
                'updated_at' => '2023-11-24 12:25:09',
            ),
            22 =>
            array(
                'id' => 23,
                'product_id' => 12,
                'url' => 'https://storage.googleapis.com/snq-website-images/customer/bricks_1.png?t=2024-04-25T06%3A29%3A54.493Z',
                'featured' => true,
                'creator_id' => 0,
                'created_at' => '2023-11-24 12:25:09',
                'updated_at' => '2023-11-24 12:25:09',
            ),
            23 =>
            array(
                'id' => 24,
                'product_id' => 12,
                'url' => 'https://storage.googleapis.com/snq-website-images/customer/bricks_2.png?t=2024-04-25T06%3A30%3A03.574Z',
                'featured' => false,
                'creator_id' => 0,
                'created_at' => '2023-11-24 12:25:09',
                'updated_at' => '2023-11-24 12:25:09',
            ),
            24 =>
            array(
                'id' => 25,
                'product_id' => 13,
                'url' => 'https://storage.googleapis.com/snq-website-images/customer/waste_1.png?t=2024-04-25T06%3A30%3A12.137Z',
                'featured' => true,
                'creator_id' => 0,
                'created_at' => '2023-11-24 12:25:09',
                'updated_at' => '2023-11-24 12:25:09',
            ),
            25 =>
            array(
                'id' => 26,
                'product_id' => 13,
                'url' => 'https://storage.googleapis.com/snq-website-images/customer/waste_2.png?t=2024-04-25T06%3A30%3A24.156Z',
                'featured' => false,
                'creator_id' => 0,
                'created_at' => '2023-11-24 12:25:09',
                'updated_at' => '2023-11-24 12:25:09',
            ),
            26 =>
            array(
                'id' => 27,
                'product_id' => 14,
                'url' => 'https://storage.googleapis.com/snq-website-images/customer/used_1.png?t=2024-04-25T06%3A30%3A32.865Z',
                'featured' => true,
                'creator_id' => 0,
                'created_at' => '2023-11-24 12:25:09',
                'updated_at' => '2023-11-24 12:25:09',
            ),
            27 =>
            array(
                'id' => 28,
                'product_id' => 14,
                'url' => 'https://storage.googleapis.com/snq-website-images/customer/used_2.png?t=2024-04-25T06%3A30%3A41.218Z',
                'featured' => false,
                'creator_id' => 0,
                'created_at' => '2023-11-24 12:25:09',
                'updated_at' => '2023-11-24 12:25:09',
            ),
            28 =>
            array(
                'id' => 29,
                'product_id' => 16,
                'url' => 'https://storage.googleapis.com/snq-website-images/customer/quarry-dust.jpeg?t=2024-06-05T02%3A44%3A35.332Z',
                'featured' => true,
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            29 =>
            array(
                'id' => 30,
                'product_id' => 15,
                'url' => 'https://storage.googleapis.com/snq-website-images/customer/6x9-block.jpeg?t=2024-06-05T02%3A55%3A28.047Z',
                'featured' => true,
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
        ));
    }
}
