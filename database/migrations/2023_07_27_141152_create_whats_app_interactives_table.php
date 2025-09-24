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
        Schema::create('whats_app_interactives', function (Blueprint $table) {
            $table->text('id')->primary();
            $table->foreign('id')->references('id')->on('whats_app_messages');
            $table->text('type');
            $table->text('title');
            $table->longText('description')->nullable();
            $table->timestamp('updated_at');
            $table->timestamp('created_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('whats_app_interactives');
    }
};
