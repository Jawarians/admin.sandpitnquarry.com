<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PinsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        DB::table('pins')->delete();

        DB::table('pins')->insert(array(
            0 =>
            array(
                'id' => 4,
                'creator_id' => 4,
                'pin' => '$2y$12$nB3KxLXtGSX68sJFB8Erxu70m/pF3dbrItIGpc6ZDO90eT6A1.uu.',
                'updated_at' => now(),
                'created_at' => now(),
            ),
            1 =>
            array(
                'id' => 5,
                'creator_id' => 3479,
                'pin' => '$2y$12$DezNbfvErDdLNWWiiQFVyuzQYJ0OYIMMXUyWyDdXVqwKc7aAIx7se',
                'updated_at' => now(),
                'created_at' => now(),
            ),
        ));
    }
}
