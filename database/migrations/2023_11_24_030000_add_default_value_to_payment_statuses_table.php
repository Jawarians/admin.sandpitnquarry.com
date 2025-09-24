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
        DB::table('payment_statuses')->insert(array(
            0 =>
            array(
                'status' => 'Approve',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            1 =>
            array(
                'status' => 'Reject',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            2 =>
            array(
                'status' => 'Pending',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
        ));

        DB::update("alter table payment_statuses ENABLE ROW LEVEL SECURITY;");
        DB::update('create policy "Enable read access for all users" on "public"."payment_statuses" as PERMISSIVE for SELECT to public using (true);');
    }
};
