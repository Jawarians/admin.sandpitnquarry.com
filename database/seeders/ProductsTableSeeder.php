<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->delete();

        DB::table('products')->insert(array(
            0 =>
                array(
                    'id' => 1,
                    'name' => 'Fine Sand',
                    'nama' => 'Pasir Halus',
                    'description' => 'Pasir Halus',
                    'ideal' => 'Perfect for plastering, finishing work, and fine detailing.',
                    'benefit' => 'Smooth application, enhances surface finish, and ensures durability.',
                    'url' => 'fine-sand',
                    'active' => true,
                    'product_category_id' => 1,
                    'creator_id' => 0,
                    'created_at' => now(),
                    'updated_at' => now(),
                ),
            1 =>
                array(
                    'id' => 2,
                    'name' => 'Coarse Sand',
                    'nama' => 'Pasir Kasar',
                    'description' => 'Pasir Kasar',
                    'ideal' => 'Best suited for concrete mixing, robust foundations, and structural applications.',
                    'benefit' => 'Superior strength and enhanced bonding properties.',
                    'url' => 'coarse-sand',
                    'active' => true,
                    'product_category_id' => 1,
                    'creator_id' => 0,
                    'created_at' => now(),
                    'updated_at' => now(),
                ),
            2 =>
                array(
                    'id' => 3,
                    'name' => 'River Sand',
                    'nama' => 'Pasir Sungai',
                    'description' => 'Pasir Sungai',
                    'ideal' => 'Suitable for basic landscaping, filling, and non-structural tasks',
                    'benefit' => 'Cost-effective option for general-purpose applications.',
                    'url' => 'river-sand',
                    'active' => false,
                    'product_category_id' => 1,
                    'creator_id' => 0,
                    'created_at' => now(),
                    'updated_at' => now(),
                ),
            3 =>
                array(
                    'id' => 5,
                    'name' => 'Aggregate 3/4',
                    'nama' => 'Batu 3/4',
                    'description' => 'Batu 3/4',
                    'ideal' => 'Essential for structural applications like concrete foundations and beams.',
                    'benefit' => 'High-strength material for robust construction.',
                    'url' => 'aggregate-3-4',
                    'active' => true,
                    'product_category_id' => 2,
                    'creator_id' => 0,
                    'created_at' => now(),
                    'updated_at' => now(),
                ),
            4 =>
                array(
                    'id' => 6,
                    'name' => 'Pebble Stone',
                    'nama' => 'Batu Pebble',
                    'description' => 'Batu Pebble',
                    'ideal' => '',
                    'benefit' => '',
                    'url' => 'pebble-stone',
                    'active' => false,
                    'product_category_id' => 2,
                    'creator_id' => 0,
                    'created_at' => now(),
                    'updated_at' => now(),
                ),
            5 =>
                array(
                    'id' => 7,
                    'name' => 'Crusher Run',
                    'nama' => 'Batu Campur',
                    'description' => 'Batu Campur',
                    'ideal' => 'Perfect for road base construction, driveways, and foundation layers.',
                    'benefit' => 'Provides excellent load-bearing capacity and long-lasting durability.',
                    'url' => 'crusher-run',
                    'active' => true,
                    'product_category_id' => 2,
                    'creator_id' => 0,
                    'created_at' => now(),
                    'updated_at' => now(),
                ),
            6 =>
                array(
                    'id' => 8,
                    'name' => 'Chipping',
                    'nama' => 'Cebisan Batu',
                    'description' => 'Cebisan Batu',
                    'ideal' => 'Ideal for surface finishing, decorative purposes, and non-structural elements.',
                    'benefit' => 'Enhances aesthetic appeal and provides functional finishes.',
                    'url' => 'chipping',
                    'active' => true,
                    'product_category_id' => 2,
                    'creator_id' => 0,
                    'created_at' => now(),
                    'updated_at' => now(),
                ),
            7 =>
                array(
                    'id' => 9,
                    'name' => 'Hardcore',
                    'nama' => 'Batu Keras',
                    'description' => 'Batu Keras',
                    'ideal' => '',
                    'benefit' => '',
                    'url' => 'hardcore',
                    'active' => false,
                    'product_category_id' => 2,
                    'creator_id' => 0,
                    'created_at' => now(),
                    'updated_at' => now(),
                ),
            8 =>
                array(
                    'id' => 10,
                    'name' => 'Cement',
                    'nama' => 'Simen',
                    'description' => 'Simen',
                    'ideal' => '',
                    'benefit' => '',
                    'url' => 'cement',
                    'active' => false,
                    'product_category_id' => 3,
                    'creator_id' => 0,
                    'created_at' => now(),
                    'updated_at' => now(),
                ),
            9 =>
                array(
                    'id' => 11,
                    'name' => 'Plaster',
                    'nama' => 'Plaster',
                    'description' => 'Plaster',
                    'ideal' => '',
                    'benefit' => '',
                    'url' => 'plaster',
                    'active' => false,
                    'product_category_id' => 3,
                    'creator_id' => 0,
                    'created_at' => now(),
                    'updated_at' => now(),
                ),
            10 =>
                array(
                    'id' => 12,
                    'name' => 'Solid Clay Bricks',
                    'nama' => 'Bata Tanah Liat',
                    'description' => 'Bata Tanah Liat',
                    'ideal' => '',
                    'benefit' => '',
                    'url' => 'solid-clay-bricks',
                    'active' => false,
                    'product_category_id' => 3,
                    'creator_id' => 0,
                    'created_at' => now(),
                    'updated_at' => now(),
                ),
            11 =>
                array(
                    'id' => 14,
                    'name' => 'Used Premix',
                    'nama' => 'Premix Terpakai',
                    'description' => 'Premix Terpakai',
                    'ideal' => '',
                    'benefit' => '',
                    'url' => 'used-premix',
                    'active' => false,
                    'product_category_id' => 3,
                    'creator_id' => 0,
                    'created_at' => now(),
                    'updated_at' => now(),
                ),
            12 =>
                array(
                    'id' => 15,
                    'name' => '6x9 Block',
                    'nama' => 'Blok 6x9',
                    'description' => 'Blok 6x9',
                    'ideal' => 'Suitable for heavy-duty construction, retaining walls, and large-scale projects.',
                    'benefit' => 'Provides exceptional stability and load-bearing capacity.',
                    'url' => '6x9-block',
                    'active' => true,
                    'product_category_id' => 2,
                    'creator_id' => 0,
                    'created_at' => now(),
                    'updated_at' => now(),
                ),
            13 =>
                array(
                    'id' => 16,
                    'name' => 'Quarry Dust',
                    'nama' => 'Habuk Kuari',
                    'description' => 'Habuk Kuari',
                    'ideal' => 'Best suited for landscaping, filler material, and non-structural applications.',
                    'benefit' => 'Versatile, cost-effective, and eco-friendly solution.',
                    'url' => 'quarry-dust',
                    'active' => true,
                    'product_category_id' => 2,
                    'creator_id' => 0,
                    'created_at' => now(),
                    'updated_at' => now(),
                ),
            14 =>
                array(
                    'id' => 4,
                    'name' => 'Unwashed Sand',
                    'nama' => 'Pasir Mentah',
                    'description' => 'Pasir Kotor',
                    'ideal' => 'Suitable for basic landscaping, filling, and non-structural tasks.',
                    'benefit' => 'Cost-effective option for general-purpose applications.',
                    'url' => 'unwashed-sand',
                    'active' => true,
                    'product_category_id' => 1,
                    'creator_id' => 0,
                    'created_at' => now(),
                    'updated_at' => '2024-05-30 12:53:42',
                ),
            15 =>
                array(
                    'id' => 13,
                    'name' => 'Quarry Waste',
                    'nama' => 'Lebihan Kuari',
                    'description' => 'Kuari Terpakai',
                    'ideal' => '',
                    'benefit' => '',
                    'url' => 'quarry-waste',
                    'active' => true,
                    'product_category_id' => 3,
                    'creator_id' => 0,
                    'created_at' => now(),
                    'updated_at' => '2024-05-30 12:54:39',
                ),
            16 =>
                array(
                    'id' => 17,
                    'name' => 'Earth Soil',
                    'nama' => 'Tanah',
                    'description' => 'Tanah',
                    'ideal' => '',
                    'benefit' => '',
                    'url' => 'earth-soil',
                    'active' => true,
                    'product_category_id' => 1,
                    'creator_id' => 0,
                    'created_at' => '2024-05-30 12:54:39',
                    'updated_at' => '2024-05-30 12:54:39',
                ),
        ));
    }
}
