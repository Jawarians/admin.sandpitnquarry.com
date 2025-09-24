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
        Schema::create('coin_refunds', function (Blueprint $table) {
            $table->id();
            $table->text('coin_refundable_type');
            $table->foreign('coin_refundable_type')->references('type')->on('morphs');
            $table->unsignedBigInteger('coin_refundable_id');
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
        Schema::dropIfExists('coin_refunds');
    }
};
