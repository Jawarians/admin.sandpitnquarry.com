<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::table('users')->insert(array(
            0 =>
            array(
                'id' => 0,
                'name' => 'Sandpit n Quarry Sdn. Bhd.',
                'email' => 'it@sandpitnquarry.com',
                'password' => Hash::make('password'),
                'created_at' => date("Y-m-d h:i:sa"),
                'updated_at' => date("Y-m-d h:i:sa"),
            ),
        ));
    }
};
