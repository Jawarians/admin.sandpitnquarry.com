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
        Schema::create('whats_app_messages', function (Blueprint $table) {
            $table->text('id')->primary();
            $table->text('from');
            $table->foreign('from')->references('phone_number')->on('whats_app_phone_numbers');
            $table->text('to');
            $table->foreign('to')->references('phone_number')->on('whats_app_phone_numbers');
            $table->text('type', 20)->default('conversation');
            $table->text('status', 10)->nullable();
            $table->dateTime('sent')->nullable();
            $table->dateTime('delivered')->nullable();
            $table->dateTime('read')->nullable();
            $table->text('whats_app_messageable_id');
            $table->text('whats_app_messageable_type');
            $table->foreign('whats_app_messageable_type')->references('type')->on('morphs');
            $table->timestamp('updated_at');
            $table->timestamp('created_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('whats_app_messages');
    }
};
