<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->delete();
        
        DB::table('roles')->insert(array (
            0 => 
            array (
                'role' => 'Account',
                'creator_id' => 0,
                'created_at' => '2024-05-11 23:52:36',
                'updated_at' => '2024-05-11 23:52:36',
            ),
            1 => 
            array (
                'role' => 'Admin',
                'creator_id' => 0,
                'created_at' => '2024-05-11 23:52:36',
                'updated_at' => '2024-05-11 23:52:36',
            ),
            2 => 
            array (
                'role' => 'Credit Controller',
                'creator_id' => 0,
                'created_at' => '2024-05-11 23:52:36',
                'updated_at' => '2024-05-11 23:52:36',
            ),
            3 => 
            array (
                'role' => 'Finance',
                'creator_id' => 0,
                'created_at' => '2024-05-11 23:52:36',
                'updated_at' => '2024-05-11 23:52:36',
            ),
            4 => 
            array (
                'role' => 'Manager',
                'creator_id' => 0,
                'created_at' => '2024-05-11 23:52:36',
                'updated_at' => '2024-05-11 23:52:36',
            ),
            5 => 
            array (
                'role' => 'Sales Agent',
                'creator_id' => 0,
                'created_at' => '2024-05-11 23:52:36',
                'updated_at' => '2024-05-11 23:52:36',
            ),
            6 => 
            array (
                'role' => 'Sales Coordinator',
                'creator_id' => 0,
                'created_at' => '2024-05-11 23:52:36',
                'updated_at' => '2024-05-11 23:52:36',
            ),
            7 => 
            array (
                'role' => 'Quotation Approver',
                'creator_id' => 0,
                'created_at' => '2024-05-11 23:52:36',
                'updated_at' => '2024-05-11 23:52:36',
            ),
        ));
        
        DB::update("alter table roles ENABLE ROW LEVEL SECURITY;");        
        DB::update('create policy "Enable read access for all users" on "public"."roles" as PERMISSIVE for SELECT to public using (true);'); 
    }
}