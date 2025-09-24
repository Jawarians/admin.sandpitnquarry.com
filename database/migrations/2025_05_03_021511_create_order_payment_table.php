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
        // ...existing code...
        Schema::create('order_payments', function (Blueprint $table) {
            $table->id();

            // allow multiple OrderPayment rows to reference the same bill (no unique constraint)
            $table->text('billplz_id');

            $table->foreignId('user_id')->constrained();

            // make order_id nullable so payment can exist before the actual Order
            $table->foreignId('order_id')->nullable()->constrained()->nullOnDelete();

            $table->text('collection_id');
            $table->boolean('paid')->default(false);
            $table->text('state')->nullable();
            $table->unsignedInteger('amount');
            $table->unsignedInteger('paid_amount')->nullable();
            $table->dateTime('due_at')->nullable();
            $table->text('email')->nullable();
            $table->text('phone')->nullable();
            $table->text('name')->nullable();

            // url should not be unique when using one bill for multiple order rows
            $table->text('url');

            $table->dateTime('paid_at')->nullable();

            // slip_id uniqueness removed to avoid conflicts when multiple rows reference same payment
            $table->text('slip_id')->nullable();
            $table->text('slip_status')->nullable();
            $table->text('x_signature')->nullable();
            $table->foreignId('creator_id')->constrained('users');

            // store original order payload until payment is confirmed
            $table->json('order_payload')->nullable();
            $table->boolean('order_created')->default(false);

            $table->timestamps();
        });
        // ...existing code...
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_payments');
    }
};