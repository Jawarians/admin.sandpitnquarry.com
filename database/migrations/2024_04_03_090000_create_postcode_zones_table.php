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
        Schema::create('postcode_zones', function (Blueprint $table) {
            $table->id();
            $table->foreignId('zone_id')->constrained();
            $table->unsignedBigInteger('postcode');
            $table->foreign('postcode')->references('postcode')->on('postcodes');
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
        Schema::dropIfExists('postcode_zones');
    }
};
