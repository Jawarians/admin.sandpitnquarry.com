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
        DB::table('address_types')->insert(array(
            0 =>
            array(
                'type' => 'Billing',
                'order' => 3,
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            1 =>
            array(
                'type' => 'Mailing',
                'order' => 2,
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            2 =>
            array(
                'type' => 'Office',
                'order' => 4,
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            3 =>
            array(
                'type' => 'Site',
                'order' => 1,
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            4 =>
            array(
                'type' => 'Normal',
                'order' => 5,
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
        ));
        DB::update("alter table address_types ENABLE ROW LEVEL SECURITY;");
        DB::update('create policy "Enable read access for all users" on "public"."address_types" as PERMISSIVE for SELECT to public using (true);');
    }
};
