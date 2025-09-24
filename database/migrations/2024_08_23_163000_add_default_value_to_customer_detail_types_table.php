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
        DB::table('customer_detail_types')->insert(array (
            0 => 
            array (
                'type' => 'SSM',
                'rgba' => 'rgba(0, 0, 0, 1)',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
        ));
    }
};
