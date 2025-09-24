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
        Schema::create('truck_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('truck_id')->constrained();
            $table->text('model');
            $table->double('length');
            $table->double('width');
            $table->double('height');
            $table->unsignedTinyInteger('wheel_id')->default(0);
            $table->foreign('wheel_id')->references('wheel')->on('wheels');
            $table->text('status')->default('Pending');
            $table->foreign('status')->references('status')->on('truck_statuses');
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
        Schema::dropIfExists('truck_details');
    }
};
