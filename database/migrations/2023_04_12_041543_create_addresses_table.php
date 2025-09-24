<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('creator_id')->constrained('users');
            $table->timestamp('updated_at');
            $table->timestamp('created_at');
        });

        DB::table('addresses')->insert(array(
            0 =>
            array(
                'id' => 0,
                'user_id' => 0,
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),


        ));
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('addresses');
    }
};
