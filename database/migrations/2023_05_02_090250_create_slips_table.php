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
        Schema::create('slips', function (Blueprint $table) {
            $table->id();
            $table->text('billplz_id')->unique()->nullable();
            $table->foreignId('transporter_id')->constrained();
            $table->text('collection_id')->nullable();
            $table->foreignId('package_id')->constrained();
            $table->foreignId('fee_id')->constrained();
            $table->boolean('upgrade');
            $table->boolean('paid');
            $table->text('state');
            $table->unsignedInteger('amount');
            $table->unsignedInteger('paid_amount')->nullable();
            $table->dateTime('due_at')->nullable();
            $table->text('email');
            $table->text('phone');
            $table->text('name');
            $table->text('url')->unique()->nullable();
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
        Schema::dropIfExists('slips');
    }
};
