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
        DB::table('order_statuses')->insert(array(
            0 =>
            array(
                'status' => 'Cancelled',
                'rgba' => 'rgba(194, 100, 40, 1)',
                'creator_id' => 0,
                'updated_at' => '2024-11-20 14:12:12+00',
                'created_at' => '2024-05-11 23:52:21+00',
            ),
            1 =>
            array(
                'status' => 'Completed',
                'rgba' => 'rgba(0, 0, 0, 1)',
                'creator_id' => 0,
                'updated_at' => '2024-10-22 12:59:07+00',
                'created_at' => '2024-10-22 12:59:07+00',
            ),
            2 =>
            array(
                'status' => 'Created',
                'rgba' => 'rgba(0, 0, 0, 1)',
                'creator_id' => 0,
                'updated_at' => '2024-05-11 23:52:21+00',
                'created_at' => '2024-05-11 23:52:21+00',
            ),
            3 =>
            array(
                'status' => 'Full Hold',
                'rgba' => 'rgba(0, 0, 0, 1)',
                'creator_id' => 0,
                'updated_at' => '2024-11-21 10:11:58+00',
                'created_at' => '2024-11-21 10:11:56+00',
            ),
            4 =>
            array(
                'status' => 'Full Released',
                'rgba' => 'rgba(0, 0, 0, 1)',
                'creator_id' => 0,
                'updated_at' => '2024-11-21 10:12:03+00',
                'created_at' => '2024-11-21 10:12:01+00',
            ),
            5 =>
            array(
                'status' => 'Incomplete',
                'rgba' => 'rgba(0, 0, 0, 1)',
                'creator_id' => 0,
                'updated_at' => '2024-10-22 12:59:07+00',
                'created_at' => '2024-10-22 12:59:07+00',
            ),
            6 =>
            array(
                'status' => 'Modified',
                'rgba' => 'rgba(0, 0, 0, 1)',
                'creator_id' => 0,
                'updated_at' => '2024-05-11 23:52:21+00',
                'created_at' => '2024-05-11 23:52:21+00',
            ),
            7 =>
            array(
                'status' => 'Ongoing',
                'rgba' => 'rgba(0, 0, 0, 1)',
                'creator_id' => 0,
                'updated_at' => '2024-10-22 12:59:07+00',
                'created_at' => '2024-10-22 12:59:07+00',
            ),
            8 =>
            array(
                'status' => 'Partially Hold',
                'rgba' => 'rgba(0, 0, 0, 1)',
                'creator_id' => 0,
                'updated_at' => '2024-11-21 10:12:07+00',
                'created_at' => '2024-11-21 10:12:05+00',
            ),
            9 =>
            array(
                'status' => 'Partially Released',
                'rgba' => 'rgba(0, 0, 0, 1)',
                'creator_id' => 0,
                'updated_at' => '2024-11-21 10:12:12+00',
                'created_at' => '2024-11-21 10:12:10+00',
            ),
            10 =>
            array(
                'status' => 'Scheduled',
                'rgba' => 'rgba(0, 0, 0, 1)',
                'creator_id' => 0,
                'updated_at' => '2024-11-21 10:12:12+00',
                'created_at' => '2024-11-21 10:12:10+00',
            ),
        ));

        DB::statement('alter table order_statuses ENABLE ROW LEVEL SECURITY;');
        DB::update('create policy "Enable read access for all users" on "public"."order_statuses" as PERMISSIVE for SELECT to public using (true);');
    }
};
