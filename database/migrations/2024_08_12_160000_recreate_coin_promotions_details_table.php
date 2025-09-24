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
        Schema::dropIfExists('coin_promotions_details');
        Schema::create('coin_promotion_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('coin_promotion_id')
                ->constrained();
            $table->unsignedInteger('price');
            $table->unsignedInteger('coins')
                ->default(0);
            $table->unsignedInteger('free_coins')
                ->default(0);
            $table->unsignedInteger('discount')
                ->default(0);
            $table->text('promotion_images')
                ->nullable();
            $table->foreignId('creator_id')
                ->constrained('users');
            $table->softDeletes();
            $table->timestamp('updated_at');
            $table->timestamp('created_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coin_promotion_details');
    }
};
