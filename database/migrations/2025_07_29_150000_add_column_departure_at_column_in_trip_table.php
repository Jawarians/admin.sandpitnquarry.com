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
        Schema::table('trips', function (Blueprint $table) {
            $table->timestamp('departure_at')
                ->after('creator_id')
                ->nullable();
            $table->timestamp('reached_at')
                ->after('creator_id')
                ->nullable();
            $table->text('duration')
                ->after('creator_id')
                ->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('trips', function (Blueprint $table) {
            $table->dropColumn(array_merge([
                'departure_at',
                'reached_at',
                'duration',
            ]));
        });
    }
};
