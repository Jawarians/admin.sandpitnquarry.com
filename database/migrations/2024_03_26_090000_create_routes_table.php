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
        Schema::create('routes', function (Blueprint $table) {
            $table->id();
            $table->dateTime('departure_at');
            $table->double('origin_latitude');
            $table->double('origin_longitude');
            $table->text('origin_addresss');
            $table->double('destination_latitude');
            $table->double('destination_longitude');
            $table->text('destination_addresss');
            $table->text('traffic_model')->default('best_guess');
            $table->text('distance_text');
            $table->unsignedInteger('distance_value')->default(0);
            $table->text('duration_text');
            $table->unsignedInteger('duration_value')->default(0);
            $table->text('traffic_text');
            $table->unsignedInteger('traffic_value')->default(0);
            $table->foreignId('creator_id')->constrained('users');
            $table->timestamp('updated_at');
            $table->timestamp('created_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('routes');
    }
};
