<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TasksTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        DB::table('tasks')->delete();

        DB::table('tasks')->insert(array(
            0 =>
            array(
                'id' => 1,
                'permission' => 'approve_payment',
                'taskable_type' => 'payment',
                'taskable_status' => 'Pending',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            1 =>
            array(
                'id' => 2,
                'permission' => 'reject_payment',
                'taskable_type' => 'payment',
                'taskable_status' => 'Pending',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            2 =>
            array(
                'id' => 3,
                'permission' => 'approve_account',
                'taskable_type' => 'account',
                'taskable_status' => 'Pending',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            3 =>
            array(
                'id' => 4,
                'permission' => 'reject_account',
                'taskable_type' => 'account',
                'taskable_status' => 'Pending',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            4 =>
            array(
                'id' => 5,
                'permission' => 'activate_account',
                'taskable_type' => 'account',
                'taskable_status' => 'Approve',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
        ));
    }
}
