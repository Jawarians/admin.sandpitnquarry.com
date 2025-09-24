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
        DB::table('banks')->insert(array(
            0 =>
            array(
                'name' => 'Affin Bank Berhad',
                'default' => 0,
                'active' => 1,
                'creator_id' => 0,
                'created_at' => '2023-11-17 11:06:47',
                'updated_at' => '2023-11-17 11:06:47',
            ),
            1 =>
            array(
                'name' => 'Agro Bank',
                'default' => 0,
                'active' => 1,
                'creator_id' => 0,
                'created_at' => '2023-11-17 11:06:47',
                'updated_at' => '2023-11-17 11:06:47',
            ),
            2 =>
            array(
                'name' => 'Al Rajhi Banking & Investment Corporation (Malaysia) Berhad',
                'default' => 0,
                'active' => 1,
                'creator_id' => 0,
                'created_at' => '2023-11-17 11:06:47',
                'updated_at' => '2023-11-17 11:06:47',
            ),
            3 =>
            array(
                'name' => 'Alliance Bank Malaysia Berhad',
                'default' => 0,
                'active' => 1,
                'creator_id' => 0,
                'created_at' => '2023-11-17 11:06:47',
                'updated_at' => '2023-11-17 11:06:47',
            ),
            4 =>
            array(
                'name' => 'AmBank (M) Berhad',
                'default' => 0,
                'active' => 1,
                'creator_id' => 0,
                'created_at' => '2023-11-17 11:06:47',
                'updated_at' => '2023-11-17 11:06:47',
            ),
            5 =>
            array(
                'name' => 'Bangkok Bank Berhad',
                'default' => 0,
                'active' => 1,
                'creator_id' => 0,
                'created_at' => '2023-11-17 11:06:47',
                'updated_at' => '2023-11-17 11:06:47',
            ),
            6 =>
            array(
                'name' => 'Bank Islam Malaysia Berhad',
                'default' => 0,
                'active' => 1,
                'creator_id' => 0,
                'created_at' => '2023-11-17 11:06:47',
                'updated_at' => '2023-11-17 11:06:47',
            ),
            7 =>
            array(
                'name' => 'Bank Muamalat Malaysia Berhad',
                'default' => 0,
                'active' => 1,
                'creator_id' => 0,
                'created_at' => '2023-11-17 11:06:47',
                'updated_at' => '2023-11-17 11:06:47',
            ),
            8 =>
            array(
                'name' => 'Bank of America Malaysia Berhad',
                'default' => 0,
                'active' => 1,
                'creator_id' => 0,
                'created_at' => '2023-11-17 11:06:47',
                'updated_at' => '2023-11-17 11:06:47',
            ),
            9 =>
            array(
                'name' => 'Bank of China (Malaysia) Berhad',
                'default' => 0,
                'active' => 1,
                'creator_id' => 0,
                'created_at' => '2023-11-17 11:06:47',
                'updated_at' => '2023-11-17 11:06:47',
            ),
            10 =>
            array(
                'name' => 'Bank Rakyat',
                'default' => 0,
                'active' => 1,
                'creator_id' => 0,
                'created_at' => '2023-11-17 11:06:47',
                'updated_at' => '2023-11-17 11:06:47',
            ),
            11 =>
            array(
                'name' => 'Bank Simpanan Nasional',
                'default' => 0,
                'active' => 1,
                'creator_id' => 0,
                'created_at' => '2023-11-17 11:06:47',
                'updated_at' => '2023-11-17 11:06:47',
            ),
            12 =>
            array(
                'name' => 'China Construction Bank (Malaysia) Berhad',
                'default' => 0,
                'active' => 1,
                'creator_id' => 0,
                'created_at' => '2023-11-17 11:06:47',
                'updated_at' => '2023-11-17 11:06:47',
            ),
            13 =>
            array(
                'name' => 'CIMB Bank Berhad',
                'default' => 0,
                'active' => 1,
                'creator_id' => 0,
                'created_at' => '2023-11-17 11:06:47',
                'updated_at' => '2023-11-17 11:06:47',
            ),
            14 =>
            array(
                'name' => 'Citibank Berhad',
                'default' => 0,
                'active' => 1,
                'creator_id' => 0,
                'created_at' => '2023-11-17 11:06:47',
                'updated_at' => '2023-11-17 11:06:47',
            ),
            15 =>
            array(
                'name' => 'Deutsche Bank (Malaysia) Berhad',
                'default' => 0,
                'active' => 1,
                'creator_id' => 0,
                'created_at' => '2023-11-17 11:06:47',
                'updated_at' => '2023-11-17 11:06:47',
            ),
            16 =>
            array(
                'name' => 'Hong Leong Bank Berhad',
                'default' => 0,
                'active' => 1,
                'creator_id' => 0,
                'created_at' => '2023-11-17 11:06:47',
                'updated_at' => '2023-11-17 11:06:47',
            ),
            17 =>
            array(
                'name' => 'HSBC Bank Malaysia Berhad',
                'default' => 0,
                'active' => 1,
                'creator_id' => 0,
                'created_at' => '2023-11-17 11:06:47',
                'updated_at' => '2023-11-17 11:06:47',
            ),
            18 =>
            array(
                'name' => 'India International Bank (Malaysia) Berhad',
                'default' => 0,
                'active' => 1,
                'creator_id' => 0,
                'created_at' => '2023-11-17 11:06:47',
                'updated_at' => '2023-11-17 11:06:47',
            ),
            19 =>
            array(
                'name' => 'Industrial and Commercial Bank of China (Malaysia) Berhad',
                'default' => 0,
                'active' => 1,
                'creator_id' => 0,
                'created_at' => '2023-11-17 11:06:47',
                'updated_at' => '2023-11-17 11:06:47',
            ),
            20 =>
            array(
                'name' => 'J.P. Morgan Chase Bank Berhad',
                'default' => 0,
                'active' => 1,
                'creator_id' => 0,
                'created_at' => '2023-11-17 11:06:47',
                'updated_at' => '2023-11-17 11:06:47',
            ),
            21 =>
            array(
                'name' => 'Kuwait Finance House (Malaysia) Berhad',
                'default' => 0,
                'active' => 1,
                'creator_id' => 0,
                'created_at' => '2023-11-17 11:06:47',
                'updated_at' => '2023-11-17 11:06:47',
            ),
            22 =>
            array(
                'name' => 'Malayan Banking Berhad',
                'default' => 0,
                'active' => 1,
                'creator_id' => 0,
                'created_at' => '2023-11-17 11:06:47',
                'updated_at' => '2023-11-17 11:06:47',
            ),
            23 =>
            array(
                'name' => 'MBSB Bank Berhad',
                'default' => 0,
                'active' => 1,
                'creator_id' => 0,
                'created_at' => '2023-11-17 11:06:47',
                'updated_at' => '2023-11-17 11:06:47',
            ),
            24 =>
            array(
                'name' => 'Mizuho Bank (Malaysia) Berhad',
                'default' => 0,
                'active' => 1,
                'creator_id' => 0,
                'created_at' => '2023-11-17 11:06:47',
                'updated_at' => '2023-11-17 11:06:47',
            ),
            25 =>
            array(
                'name' => 'National Bank of Abu Dhabi Malaysia Berhad',
                'default' => 0,
                'active' => 1,
                'creator_id' => 0,
                'created_at' => '2023-11-17 11:06:47',
                'updated_at' => '2023-11-17 11:06:47',
            ),
            26 =>
            array(
                'name' => 'No Bank Record',
                'default' => 1,
                'active' => 1,
                'creator_id' => 0,
                'created_at' => '2023-10-23 12:49:56',
                'updated_at' => '2023-10-23 12:49:56',
            ),
            27 =>
            array(
                'name' => 'OCBC Bank (Malaysia) Berhad',
                'default' => 0,
                'active' => 1,
                'creator_id' => 0,
                'created_at' => '2023-11-17 11:06:47',
                'updated_at' => '2023-11-17 11:06:47',
            ),
            28 =>
            array(
                'name' => 'Public Bank Berhad',
                'default' => 0,
                'active' => 1,
                'creator_id' => 0,
                'created_at' => '2023-11-17 11:06:47',
                'updated_at' => '2023-11-17 11:06:47',
            ),
            29 =>
            array(
                'name' => 'RHB Bank Berhad',
                'default' => 0,
                'active' => 1,
                'creator_id' => 0,
                'created_at' => '2023-11-17 11:06:47',
                'updated_at' => '2023-11-17 11:06:47',
            ),
            30 =>
            array(
                'name' => 'Standard Chartered Bank Malaysia Berhad',
                'default' => 0,
                'active' => 1,
                'creator_id' => 0,
                'created_at' => '2023-11-17 11:06:47',
                'updated_at' => '2023-11-17 11:06:47',
            ),
            31 =>
            array(
                'name' => 'Sumitomo Mitsui Banking Corporation Malaysia Berhad',
                'default' => 0,
                'active' => 1,
                'creator_id' => 0,
                'created_at' => '2023-11-17 11:06:47',
                'updated_at' => '2023-11-17 11:06:47',
            ),
            32 =>
            array(
                'name' => 'United Overseas Bank (Malaysia) Bhd.',
                'default' => 0,
                'active' => 1,
                'creator_id' => 0,
                'created_at' => '2023-11-17 11:06:47',
                'updated_at' => '2023-11-17 11:06:47',
            ),
        ));
    }
};
