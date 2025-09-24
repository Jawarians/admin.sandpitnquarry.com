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
        Schema::create('whats_app_reactions', function (Blueprint $table) {
            $table->text('id')->primary()->references('id')->on('whats_app_messages');
            $table->text('message_id');
            $table->foreign('message_id')->references('id')->on('whats_app_messages');
            $table->longText('emoji');
            $table->timestamp('updated_at');
            $table->timestamp('created_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('whats_app_reactions');
    }
};
