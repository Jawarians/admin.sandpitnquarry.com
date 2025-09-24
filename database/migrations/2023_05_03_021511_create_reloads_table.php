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
        Schema::create('reloads', function (Blueprint $table) {
            $table->id();
            $table->text('billplz_id')->unique();
            $table->foreignId('user_id')->constrained();
            $table->text('collection_id');
            $table->boolean('paid');
            $table->text('state');
            $table->unsignedInteger('amount');
            $table->unsignedInteger('paid_amount')->nullable();
            $table->unsignedInteger('coins');
            $table->unsignedInteger('free_coins');
            $table->dateTime('due_at');
            $table->text('email');
            $table->text('phone')->nullable();
            $table->text('name');
            $table->text('url')->unique();
            $table->dateTime('paid_at')->nullable();
            $table->text('slip_id')->unique()->nullable();
            $table->text('slip_status')->nullable();
            $table->text('x_signature')->nullable();
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
        Schema::dropIfExists('reloads');
    }
};
