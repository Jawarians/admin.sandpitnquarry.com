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
        DB::table('order_actions')->insert(array(
            0 =>
            array(
                'action' => 'Created',
                'rgba' => 'rgba(0, 0, 0, 1)',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            1 =>
            array(
                'action' => 'Cancelled',
                'rgba' => 'rgba(0, 0, 0, 1)',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            2 =>
            array(
                'action' => 'Modified',
                'rgba' => 'rgba(0, 0, 0, 1)',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            3 =>
            array(
                'action' => 'Hold',
                'rgba' => 'rgba(0, 0, 0, 1)',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            4 =>
            array(
                'action' => 'Released',
                'rgba' => 'rgba(0, 0, 0, 1)',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
        ));
    }
};
