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
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->unsignedInteger('period');
            $table->unsignedInteger('discount');
            $table->double('service_charge');
            $table->unsignedInteger('payment_term');
            $table->unsignedInteger('order_delay_minutes');
            $table->double('transporter_introducer');
            $table->double('customer_introducer');
            $table->text('image')->unique();
            $table->text('badge')->unique();
            $table->boolean('show');
            $table->unsignedInteger('trial');
            $table->text('rgba')
                ->default('rgba(0, 0, 0, 1)');
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
        Schema::dropIfExists('packages');
    }
};
