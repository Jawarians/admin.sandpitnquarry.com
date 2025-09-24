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
        Schema::create('business_price_amounts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('business_price_order_id')->constrained();
            $table->unsignedBigInteger('business_price_amountable_id');
            $table->text('business_price_amountable_type');
            $table->foreign('business_price_amountable_type')->references('type')->on('morphs');
            $table->unsignedInteger('amount');
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
        Schema::dropIfExists('business_price_amounts');
    }
};
