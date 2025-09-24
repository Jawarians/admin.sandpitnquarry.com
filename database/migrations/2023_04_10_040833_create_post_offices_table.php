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
        Schema::create('post_offices', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('postcode');
            $table->foreign('postcode')->references('postcode')->on('postcodes');
            $table->text('city');
            $table->foreign('city')->references('name')->on('cities');
            $table->text('state', 20);
            $table->foreign('state')->references('name')->on('address_states');
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
        Schema::dropIfExists('post_offices');
    }
};
