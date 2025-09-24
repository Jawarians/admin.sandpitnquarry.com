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
        Schema::create('countries', function (Blueprint $table) {
            $table->text('name')->primary();
            $table->text('calling_code');
            $table->text('iso4217_country_name')->unique();
            $table->text('iso3166_1_alpha_2', 2)->unique();
            $table->text('iso3166_1_alpha_3', 3)->unique();
            $table->text('continent', 2);
            $table->text('tld', 3);
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
        Schema::dropIfExists('countries');
    }
};
