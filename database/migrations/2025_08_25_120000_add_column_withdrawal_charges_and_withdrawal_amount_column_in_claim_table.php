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
        Schema::table('claims', function (Blueprint $table) {
            $table->unsignedInteger('withdraw_charge')
                ->nullable()
                ->default(0)
                ->after('amount');
            $table->unsignedInteger('withdraw_amount')
                ->nullable()
                ->default(0)
                ->after('amount');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('claims', function (Blueprint $table) {
            $table->dropColumn(array_merge([
                'withdraw_charge',
                'withdraw_amount',
            ]));
        });
    }
};
