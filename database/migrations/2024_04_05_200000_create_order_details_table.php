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
        Schema::create('order_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained();
            $table->foreignId('site_id')->constrained();
            $table->text('status')->default('Created');
            $table->foreign('status')->references('status')->on('order_statuses');
            $table->unsignedInteger('quantity');
            $table->unsignedInteger('total_kg');
            $table->text('remark')->nullable();
            $table->dateTime('available_at');
            $table->dateTime('due_at');
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
        Schema::dropIfExists('order_details');
    }
};
