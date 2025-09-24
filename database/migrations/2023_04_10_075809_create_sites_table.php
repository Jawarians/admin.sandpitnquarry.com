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
        Schema::create('sites', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->text('address');
            $table->unsignedBigInteger('postcode');
            $table->foreign('postcode')->references('postcode')->on('postcodes');
            $table->text('city');
            $table->foreign('city')->references('name')->on('cities');
            $table->text('state', 20);
            $table->foreign('state')->references('name')->on('address_states');
            $table->double('latitude');
            $table->double('longitude');
            $table->text('country_code')->default('Malaysia');
            $table->foreign('country_code')->references('name')->on('countries');
            $table->text('phone');
            $table->foreignId('merchant_id')->constrained();
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
        Schema::dropIfExists('sites');
    }
};
