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
        DB::table('company_types')->insert(array(
            0 =>
            array(
                'type' => 'BHD.',
                'order' => 2,
                'active' => 1,
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            1 =>
            array(
                'type' => 'ENTERPRISE',
                'order' => 3,
                'active' => 1,
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            2 =>
            array(
                'type' => 'KELAB / PERSATUAN',
                'order' => 8,
                'active' => 0,
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            3 =>
            array(
                'type' => 'KOPERASI',
                'order' => 5,
                'active' => 1,
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            4 =>
            array(
                'type' => 'LLP / PLT',
                'order' => 4,
                'active' => 1,
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            5 =>
            array(
                'type' => 'OTHERS / LAIN-LAIN',
                'order' => 9,
                'active' => 0,
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            6 =>
            array(
                'type' => 'SDN.',
                'order' => 6,
                'active' => 1,
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            7 =>
            array(
                'type' => 'SDN. BHD.',
                'order' => 1,
                'active' => 1,
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            8 =>
            array(
                'type' => 'YAYASAN / FOUNDATION',
                'order' => 7,
                'active' => 0,
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
        ));

        DB::update("alter table company_types ENABLE ROW LEVEL SECURITY;");
        DB::update('create policy "Enable read access for all users" on "public"."company_types" as PERMISSIVE for SELECT to public using (true);');
    }
};
