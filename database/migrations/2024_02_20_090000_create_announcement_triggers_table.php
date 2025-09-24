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
        Schema::create('announcement_triggers', function (Blueprint $table) {
            $table->id();
            $table->text('trigger');
            $table->foreign('trigger')->references('trigger')->on('triggers');
            $table->text('permission');
            $table->foreign('permission')->references('permission')->on('permissions');
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
        Schema::dropIfExists('announcement_triggers');
    }
};
