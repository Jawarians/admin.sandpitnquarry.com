<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('price_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('price_id')->constrained();
            $table->text('price_itemable_type');
            $table->foreign('price_itemable_type')->references('type')->on('morphs');
            $table->unsignedBigInteger('price_itemable_id');
            $table->foreignId('product_id')->constrained();
            $table->unsignedTinyInteger('wheel_id')->default(0);
            $table->foreign('wheel_id')->references('wheel')->on('wheels');
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
        Schema::dropIfExists('price_items');
    }
};
