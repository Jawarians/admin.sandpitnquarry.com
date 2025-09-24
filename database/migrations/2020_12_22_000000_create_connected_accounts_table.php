<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConnectedAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('connected_accounts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->text('provider');
            $table->text('provider_id');
            $table->text('name')->nullable();
            $table->text('nickname')->nullable();
            $table->text('email')->nullable();
            $table->text('telephone')->nullable();
            $table->text('avatar_path')->nullable();
            $table->text('token', 1000);
            $table->text('secret')->nullable(); // OAuth1
            $table->text('refresh_token', 1000)->nullable(); // OAuth2
            $table->dateTime('expires_at')->nullable(); // OAuth2
            $table->timestamp('updated_at');
            $table->timestamp('created_at');
            $table->index(['user_id', 'id']);
            $table->index(['provider', 'provider_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('connected_accounts');
    }
}
