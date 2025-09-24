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
        DB::table('job_statuses')->insert(array(
            0 =>
            array(
                'status' => 'Accepted',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            1 =>
            array(
                'status' => 'Cancelled',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            2 =>
            array(
                'status' => 'Reassign',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            3 =>
            array(
                'status' => 'Complete',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            4 =>
            array(
                'status' => 'Incomplete',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
        ));

        DB::update("alter table job_statuses ENABLE ROW LEVEL SECURITY;");
        DB::update('create policy "Enable read access for all users" on "public"."job_statuses" as PERMISSIVE for SELECT to public using (true);');
    }
};
