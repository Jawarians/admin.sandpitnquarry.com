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
        Schema::create('business_price_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('business_price_id')->constrained();
            $table->text('unit');
            $table->foreign('unit')->references('unit')->on('order_units');
            $table->text('reference_number')->nullable();
            $table->text('type')->default('Quotation');
            $table->foreign('type')->references('type')->on('business_price_types');
            $table->unsignedInteger('term')->default(0);
            $table->text('status')->default('Pending');
            $table->foreign('status')->references('status')->on('business_price_statuses');
            $table->text('attention')->nullable();
            $table->text('note')->nullable();
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
        Schema::dropIfExists('business_price_details');
    }
};
