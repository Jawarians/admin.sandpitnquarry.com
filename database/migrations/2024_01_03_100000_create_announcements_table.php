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
        Schema::create('announcements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('company_id')->constrained('users');
            $table->foreignId('customer_id')->constrained('users');
            $table->foreignId('agent_id')->constrained('users');
            $table->text('announcementable_id');
            $table->text('announcementable_type');
            $table->foreign('announcementable_type')->references('type')->on('morphs');
            $table->text('title');
            $table->text('subtitle');
            $table->text('status');
            $table->text('group');
            $table->text('rgba')
                ->default('rgba(0, 0, 0, 1)');
            $table->text('path');
            $table->timestamp('read_at')->nullable();
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
        Schema::dropIfExists('announcements');
    }
};
