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
        Schema::table('driver_details', function (Blueprint $table) {
            $table->timestamp('banned_at')
                ->after('creator_id')
                ->nullable();
       });
    } 

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('driver_details', function (Blueprint $table) {
            $table->dropColumn(array_merge([
                'banned_at',
            ]));
        });
    }
};
