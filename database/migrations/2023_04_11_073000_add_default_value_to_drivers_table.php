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
        // DB::table('drivers')->delete();

        // DB::table('drivers')->insert(array(
        //     0 =>
        //     array(
        //         'id' => 0,
        //         'user_id' => 0,
        //         'creator_id' => 0,
        //         'transporter_id' => 0,
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ),
        // ));
    }
};
