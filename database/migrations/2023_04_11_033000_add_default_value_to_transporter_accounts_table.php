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
        DB::table('transporter_accounts')->insert(array(
            0 =>
            array(
                'id' => 0,
                'name' => 'No Account Holder Record',
                'number' => 'No Account Record',
                'bank' => 'No Bank Record',
                'transporter_id' => 0,
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
        ));
    }
};
