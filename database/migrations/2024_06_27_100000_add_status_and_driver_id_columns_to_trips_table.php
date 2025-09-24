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
            $table->foreignId('driver_id')
                ->default(0)
                ->constrained()
                ->after('actual_quantity');
            $table->text('status')
                ->after('driver_id')
                ->default('Assigned');
            $table->foreign('status')
                ->references('status')
                ->on('trip_statuses');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('trips', function (Blueprint $table) {
            $table->dropColumn(array_merge([
                'driver_id',
                'status',
            ]));
        });
    }
};
