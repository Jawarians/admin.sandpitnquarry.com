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
        Schema::create('account_detail_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('account_detail_id')->constrained();
            $table->unsignedInteger('term')->default(0);
            $table->unsignedInteger('limit')->default(0);
            $table->unsignedInteger('minimize')->default(0);
            $table->text('status')->default('Pending');
            $table->foreign('status')->references('status')->on('account_statuses');
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
        Schema::dropIfExists('account_detail_items');
    }
};
