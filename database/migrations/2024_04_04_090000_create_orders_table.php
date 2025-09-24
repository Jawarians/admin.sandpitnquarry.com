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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('purchase_id')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('address_id')->constrained();
            $table->foreignId('product_id')->constrained();
            $table->foreignId('price_item_id')->constrained();
            $table->text('unit');
            $table->foreign('unit')->references('unit')->on('order_units');
            $table->unsignedInteger('price_per_unit');
            $table->unsignedTinyInteger('wheel_id')->default(0);
            $table->foreign('wheel_id')->references('wheel')->on('wheels');
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
        Schema::dropIfExists('orders');
    }
};
