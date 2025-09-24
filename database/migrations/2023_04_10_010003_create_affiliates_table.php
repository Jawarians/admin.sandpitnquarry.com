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
        Schema::create('affiliates', function (Blueprint $table) {
            $table->foreignId('id')->constrained('users');
            $table->primary('id');
            $table->text('initial');
            $table->text('registration_number')->unique();
            $table->text('address_1');
            $table->text('address_2');
            $table->text('address_3');
            $table->text('phone');
            $table->text('fax')->nullable();
            $table->text('email');
            $table->text('account_number');
            $table->text('bank');
            $table->boolean('active')->default(0);
            $table->text('rgba')
                ->default('rgba(0, 0, 0, 1)');
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
        Schema::dropIfExists('affiliates');
    }
};
