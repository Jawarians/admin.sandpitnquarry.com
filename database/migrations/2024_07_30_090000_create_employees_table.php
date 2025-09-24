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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->text('email');
            $table->text('country_code')
                ->default('Malaysia');
            $table->foreign('country_code')
                ->references('name')
                ->on('countries');
            $table->text('phone', 25)
                ->nullable();
            $table->text('profile_photo_path')->nullable();
            $table->softDeletes();
            $table->timestamp('updated_at');
            $table->timestamp('created_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
