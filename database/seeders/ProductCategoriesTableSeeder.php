<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductCategoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_categories')->delete();

        DB::table('product_categories')->insert(array (
            0 =>
            array (
                'id' => 1,
                'name' => 'sand',
                'description' => 'Granular material composed of finely divided mineral particles',
                'active' => true,
                'creator_id' => 0,
                'created_at' => '2023-11-24 12:25:09',
                'updated_at' => '2023-11-24 12:25:09',
            ),
            1 =>
            array (
                'id' => 2,
                'name' => 'quarry',
                'description' => 'Any naturally occurring solid mass or aggregate of minerals or mineraloid matter',
                'active' => true,
                'creator_id' => 0,
                'created_at' => '2023-11-24 12:25:09',
                'updated_at' => '2023-11-24 12:25:09',
            ),
            2 =>
            array (
                'id' => 3,
                'name' => 'Cement',
                'description' => 'A binder, a chemical substance used for construction that sets, hardens, and adheres to other materials to bind them together',
                'active' => false,
                'creator_id' => 0,
                'created_at' => '2023-11-24 12:25:09',
                'updated_at' => '2023-11-24 12:25:09',
            ),
        ));

        DB::update("alter table product_categories ENABLE ROW LEVEL SECURITY;");
        DB::update('create policy "Enable read access for all users" on "public"."product_categories" as PERMISSIVE for SELECT to public using (true);');
    }
}
