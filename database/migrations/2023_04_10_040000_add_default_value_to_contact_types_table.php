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
        DB::table('contact_types')->insert(array(
            0 =>
            array(
                'type' => 'Account',
                'order' => 2,
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            1 =>
            array(
                'type' => 'Office',
                'order' => 3,
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            2 =>
            array(
                'type' => 'Site',
                'order' => 1,
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
        ));

        DB::update("alter table contact_types ENABLE ROW LEVEL SECURITY;");
        DB::update('create policy "Enable read access for all users" on "public"."contact_types" as PERMISSIVE for SELECT to public using (true);');
    }
};
