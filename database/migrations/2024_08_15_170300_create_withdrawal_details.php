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
        Schema::dropIfExists('withdrawal_details');
        Schema::create('withdrawal_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('withdrawal_id')->constrained();
            $table->text('status')->default('Pending');
            $table->foreign('status')->references('status')->on('withdrawal_statuses');
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
        Schema::dropIfExists('withdrawal_details');
    }
};
