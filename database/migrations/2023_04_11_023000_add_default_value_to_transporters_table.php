<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::table('transporters')->insert(array(
            0 =>
            array(
                'id' => 0,
                'name' => 'Sandpit n Quarry Sdn. Bhd.',
                'registration_number' => '1404825V',
                'type' => 'SDN. BHD.',
                'user_id' => 0,
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
        ));
    }
};
