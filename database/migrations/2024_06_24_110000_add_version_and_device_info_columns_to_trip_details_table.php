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
        Schema::table('trip_details', function (Blueprint $table) {
            $table->text('device')
                ->after('reason')
                ->nullable();
            $table->text('version')
                ->after('device')
                ->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('trip_details', function (Blueprint $table) {
            $table->dropColumn(array_merge([
                'device',
                'version',
            ]));
        });
    }
};
