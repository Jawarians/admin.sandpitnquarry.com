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
        Schema::dropIfExists('pins');
        Schema::create('pins', function (Blueprint $table) {
            $table->foreignId('id')->constrained('users');
            $table->primary('id');
            $table->timestamp('created_at');
            $table->foreignId('creator_id')->constrained('users');
            $table->text('pin');
            $table->timestamp('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pins');
    }
};
