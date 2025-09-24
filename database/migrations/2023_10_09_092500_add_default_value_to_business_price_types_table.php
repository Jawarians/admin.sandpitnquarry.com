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
        DB::table('business_price_types')->insert(array (
            0 => 
            array (
                'type' => 'Purchasing Order',
                'order' => 2,
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            1 => 
            array (
                'type' => 'Proforma Invoice',
                'order' => 3,
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            2 => 
            array (
                'type' => 'Quotation',
                'order' => 1,
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
        ));
    }
};
