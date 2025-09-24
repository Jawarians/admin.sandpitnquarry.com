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
        Schema::create('order_contacts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_detail_id')->constrained();
            $table->text('name')->nullable();
            $table->text('country_code')->default('Malaysia');
            $table->foreign('country_code')->references('name')->on('countries');
            $table->text('phone')->nullable();
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
        Schema::dropIfExists('order_contacts');
    }
};
