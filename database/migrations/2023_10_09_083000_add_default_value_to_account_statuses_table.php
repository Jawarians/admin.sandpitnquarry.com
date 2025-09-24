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
        DB::table('account_statuses')->insert(array(
            0 =>
            array(
                'status' => 'Active',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            1 =>
            array(
                'status' => 'Approve',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            2 =>
            array(
                'status' => 'Stop',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            3 =>
            array(
                'status' => 'Minimize',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            4 =>
            array(
                'status' => 'Pending',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            5 =>
            array(
                /// red
                'status' => 'Reject',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            6 =>
            array(
                /// red
                'status' => 'Resubmit',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
        ));

        DB::update("alter table account_statuses ENABLE ROW LEVEL SECURITY;");
        DB::update('create policy "Enable read access for all users" on "public"."account_statuses" as PERMISSIVE for SELECT to public using (true);');
    }
};
