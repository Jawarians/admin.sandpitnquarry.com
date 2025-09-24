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
        Schema::create('address_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('address_id')->default(0)->constrained();
            $table->double('latitude')->nullable();
            $table->double('longitude')->nullable();
            $table->text('name')->nullable();
            $table->text('address_1')->nullable();
            $table->text('address_2')->nullable();
            $table->unsignedBigInteger('postcode');
            $table->foreign('postcode')->references('postcode')->on('postcodes');
            $table->text('city');
            $table->foreign('city')->references('name')->on('cities');
            $table->text('state', 20);
            $table->foreign('state')->references('name')->on('address_states');
            $table->text('status')->default('Created');
            $table->foreign('status')->references('status')->on('address_statuses');
            $table->text('type')->default('Site');
            $table->foreign('type')->references('type')->on('address_types');
            $table->text('link')->nullable();
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
        Schema::dropIfExists('address_details');
    }
};
