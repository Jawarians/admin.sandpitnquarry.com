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
        Schema::table('users', function (Blueprint $table) {
            $table->text('country_code')
                ->after('email')
                ->default('Malaysia');
            $table->foreign('country_code')->references('name')->on('countries');
            $table->text('phone', 25)
                ->after('country_code')
                ->nullable();
            $table->timestamp('phone_verified_at')
                ->after('email_verified_at')
                ->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(array_merge([
                'country_code',
                'phone',
                'phone_verified_at',
            ]));
        });
    }
};
