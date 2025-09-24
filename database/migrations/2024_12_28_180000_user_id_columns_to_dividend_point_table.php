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
        Schema::table('dividend_points', function (Blueprint $table) {
            if (Schema::hasColumn('dividend_points', 'user_id')) {
                $table->dropColumn('user_id');
            }
            $table->foreignId('user_id')
                ->default(0)
                ->constrained()
                ->after('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('dividend_points', function (Blueprint $table) {
            $table->dropColumn(array_merge([
                'user_id',
            ]));
        });
    }
};
