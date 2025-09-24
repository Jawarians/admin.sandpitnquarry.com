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
        Schema::table('referrers', function (Blueprint $table) {
            if (Schema::hasColumn('referrers', 'referrer_id')) {
                $table->dropColumn('referrer_id');
            }
            $table->foreignId('referrer_id')
                ->default(0)
                ->constrained('users')
                ->after('creator_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('referrers', function (Blueprint $table) {
            $table->dropColumn(array_merge([
                'referrers_id',
            ]));
        });
    }
};
