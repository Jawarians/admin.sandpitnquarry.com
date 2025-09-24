<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('trip_reasons', function (Blueprint $table) {
            $table->id();
            $table->foreignId('trip_id')->constrained();
            $table->unsignedBigInteger('trip_reasonable_id');
            $table->text('trip_reasonable_type');
            $table->foreign('trip_reasonable_type')->references('type')->on('morphs');
            $table->foreignId('creator_id')->constrained('users');
            $table->timestamp('updated_at');
            $table->timestamp('created_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trip_reasons');
    }
};
