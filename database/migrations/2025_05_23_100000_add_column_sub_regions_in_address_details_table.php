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
        Schema::table('address_details', function (Blueprint $table) {
            $table->text('sub_region')
                ->nullable()
                ->constrained()
                ->after('postcode');
            $table->foreign('sub_region')
                ->references('name')
                ->on('sub_regions');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('address_details', function (Blueprint $table) {
            $table->dropColumn(array_merge([
                'sub_region',
            ]));
        });
    }
};
