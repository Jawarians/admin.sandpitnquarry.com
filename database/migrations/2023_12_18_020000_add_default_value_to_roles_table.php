<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::table('roles')->insert(array(
            0 =>
            array(
                'role' => 'Account',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            1 =>
            array(
                'role' => 'Admin',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),

            2 =>
            array(
                'role' => 'Credit Controller',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            3 =>
            array(
                'role' => 'Finance',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            4 =>
            array(
                'role' => 'Manager',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            5 =>
            array(
                'role' => 'Sales Agent',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            6 =>
            array(
                'role' => 'Sales Coordinator',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            7 =>
            array(
                'role' => 'Quotation Approver',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
        ));
    }
};
