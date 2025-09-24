<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::table('wheels')->insert(array(
            0 =>
            array(
                'wheel' => 0,
                'capacity' => 0,
                'load' => 0,
                'tonne' => 0,
                'creator_id' => 0,
                'created_at' => date("Y-m-d h:i:sa"),
                'updated_at' => date("Y-m-d h:i:sa"),
            ),
            1 =>
            array(
                'wheel' => 6,
                'capacity' => 12,
                'load' => 1,
                'tonne' => 1,
                'creator_id' => 0,
                'created_at' => date("Y-m-d h:i:sa"),
                'updated_at' => date("Y-m-d h:i:sa"),
            ),
            2 =>
            array(
                'wheel' => 10,
                'capacity' => 30,
                'load' => 1,
                'tonne' => 1,
                'creator_id' => 0,
                'created_at' => date("Y-m-d h:i:sa"),
                'updated_at' => date("Y-m-d h:i:sa"),
            ),
            3 =>
            array(
                'wheel' => 12,
                'capacity' => 40,
                'load' => 0,
                'tonne' => 1,
                'creator_id' => 0,
                'created_at' => date("Y-m-d h:i:sa"),
                'updated_at' => date("Y-m-d h:i:sa"),
            ),
            4 =>
            array(
                'wheel' => 24,
                'capacity' => 80,
                'load' => 0,
                'tonne' => 0,
                'creator_id' => 0,
                'created_at' => date("Y-m-d h:i:sa"),
                'updated_at' => date("Y-m-d h:i:sa"),
            ),
            5 =>
            array(
                'wheel' => 1,
                'capacity' => 0,
                'load' => 0,
                'tonne' => 0,
                'creator_id' => 0,
                'created_at' => date("Y-m-d h:i:sa"),
                'updated_at' => date("Y-m-d h:i:sa"),
            ),
        ));

        DB::update("alter table wheels ENABLE ROW LEVEL SECURITY;");
        DB::update('create policy "Enable read access for all users" on "public"."wheels" as PERMISSIVE for SELECT to public using (true);');
    }
};
