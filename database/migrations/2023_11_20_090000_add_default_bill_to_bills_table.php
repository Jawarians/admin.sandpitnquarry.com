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
         
        DB::table('bills')->insert(array(
            0 =>
            array(
                'id' => 0,
                'transporter_id' => 0,
                'amount' => 0,
                'creator_id' => 0,
                'created_at' => date("Y-m-d h:i:sa"),
                'updated_at' => date("Y-m-d h:i:sa"),
            ),
        ));
    }
};
