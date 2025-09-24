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
        Schema::create('order_delegations', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('available');
            $table->timestamp('created_at');
            $table->foreignId('creator_id')->constrained('users');
            $table->unsignedInteger('delegated');
            $table->timestamp('end_at');
            $table->foreignId('order_detail_id')->constrained();
            $table->timestamp('start_at');
            $table->text('status')->default('Ongoing');
            $table->foreign('status')->references('status')->on('order_statuses');
            $table->unsignedInteger('total');
            $table->timestamp('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_delegations');
    }
};
