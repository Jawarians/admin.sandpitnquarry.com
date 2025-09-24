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
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained();
            $table->text('unit');
            $table->text('remark')->nullable();
            $table->integer('cost_amount')
                ->nullable();
            $table->integer('transportation_fee')
                ->nullable();
            $table->foreignId('route_id')->constrained();
            $table->integer('quantity')
                ->default(1);
            $table->timestamp('ordered_at')
                ->nullable();
            $table->unsignedBigInteger('wheel_id');
            $table->foreign('wheel_id')->references('wheel')->on('wheels');
            $table->foreignId('price_item_id')->constrained();
            $table->foreignId('address_id')->constrained();
            $table->foreignId('site_id')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->string('status');
            $table->foreign('status')->references('status')->on('cart_statuses');
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
        Schema::dropIfExists('carts');
    }
};
