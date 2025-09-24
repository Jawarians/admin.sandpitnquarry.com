<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('customer_notifications', function (Blueprint $table) {
            $table->id();
            $table->string('notification_type')->default('info');
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->foreignId('receiver_id')->constrained('users');
            $table->boolean('read_status')->default(false);
            $table->text('image_url')->nullable();
            $table->string('cta_text')->nullable();
            $table->text('cta_link')->nullable();
            $table->foreignId('creator_id')->constrained('users')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer_notifications');
    }
};
