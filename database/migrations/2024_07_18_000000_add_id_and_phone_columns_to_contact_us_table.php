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
        Schema::table('contact_us', function (Blueprint $table) {
            $table->dropColumn(array_merge([
                'info',
                'phone_num',
            ]));
            $table->id()
                ->before('name');
            $table->text('country_code')
                ->after('email')
                ->default('Malaysia');
            $table->foreign('country_code')->references('name')->on('countries');
            $table->text('phone', 25)
                ->after('country_code')
                ->nullable();
            $table->longText('content')
                ->after('subject');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('contact_us', function (Blueprint $table) {
            $table->dropColumn(array_merge([
                'country_code',
                'phone',
                'content',
            ]));
            $table->unsignedInteger('phone_num')
                ->after('email');
            $table->longText('info')
                ->after('subject');
        });
    }
};
