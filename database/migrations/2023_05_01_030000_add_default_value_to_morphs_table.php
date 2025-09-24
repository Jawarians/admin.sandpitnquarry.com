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

        DB::table('morphs')->insert(array(
            0 =>
            array(
                'type' => 'account',
                'qualified_name' => 'App\\Models\\Account',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            1 =>
            array(
                'type' => 'account_details',
                'qualified_name' => 'App\\Models\\AccountDetail',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            2 =>
            array(
                'type' => 'bonus',
                'qualified_name' => 'App\\Models\\Bonus',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            3 =>
            array(
                'type' => 'business',
                'qualified_name' => 'App\\Models\\BusinessPriceItemDetail',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            4 =>
            array(
                'type' => 'business_price',
                'qualified_name' => 'App\\Models\\BusinessPrice',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            5 =>
            array(
                'type' => 'button',
                'qualified_name' => 'App\\Models\\WhatsAppButton',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            6 =>
            array(
                'type' => 'code',
                'qualified_name' => 'App\\Models\\Code',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            7 =>
            array(
                'type' => 'customer_referrer',
                'qualified_name' => 'App\\Models\\CustomerReferrer',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            8 =>
            array(
                'type' => 'driver',
                'qualified_name' => 'App\\Models\\Driver',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            9 =>
            array(
                'type' => 'image',
                'qualified_name' => 'App\\Models\\WhatsAppImage',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            10 =>
            array(
                'type' => 'invoice',
                'qualified_name' => 'App\\Models\\Invoice',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            11 =>
            array(
                'type' => 'job',
                'qualified_name' => 'App\\Models\\Job',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            12 =>
            array(
                'type' => 'message',
                'qualified_name' => 'App\\Models\\WhatsAppMessage',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            13 =>
            array(
                'type' => 'order',
                'qualified_name' => 'App\\Models\\Order',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            14 =>
            array(
                'type' => 'payment',
                'qualified_name' => 'App\\Models\\Payment',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            15 =>
            array(
                'type' => 'reaction',
                'qualified_name' => 'App\\Models\\WhatsAppReaction',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            16 =>
            array(
                'type' => 'coin_refund',
                'qualified_name' => 'App\\Models\\CoinRefund',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            17 =>
            array(
                'type' => 'rejection',
                'qualified_name' => 'App\\Models\\TripRejectionReason',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            18 =>
            array(
                'type' => 'reload',
                'qualified_name' => 'App\\Models\\Reload',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            19 =>
            array(
                'type' => 'retail',
                'qualified_name' => 'App\\Models\\RetailPrice',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            20 =>
            array(
                'type' => 'sticker',
                'qualified_name' => 'App\\Models\\WhatsAppSticker',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            21 =>
            array(
                'type' => 'surcharge',
                'qualified_name' => 'App\\Models\\Surcharge',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            22 =>
            array(
                'type' => 'termination',
                'qualified_name' => 'App\\Models\\TripTerminationReason',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            23 =>
            array(
                'type' => 'text',
                'qualified_name' => 'App\\Models\\WhatsAppText',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            24 =>
            array(
                'type' => 'tonnage',
                'qualified_name' => 'App\\Models\\TonnageProductPrice',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            25 =>
            array(
                'type' => 'transaction',
                'qualified_name' => 'App\\Models\\Transaction',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            26 =>
            array(
                'type' => 'transporter',
                'qualified_name' => 'App\\Models\\Transporter',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            27 =>
            array(
                'type' => 'transporter_referrer',
                'qualified_name' => 'App\\Models\\TransporterReferrer',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            28 =>
            array(
                'type' => 'trip',
                'qualified_name' => 'App\\Models\\Trip',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            29 =>
            array(
                'type' => 'truck',
                'qualified_name' => 'App\\Models\\Truck',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            30 =>
            array(
                'type' => 'user',
                'qualified_name' => 'App\\Models\\User',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            31 =>
            array(
                'type' => 'video',
                'qualified_name' => 'App\\Models\\WhatsAppVideo',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            32 =>
            array(
                'type' => 'wheel_price',
                'qualified_name' => 'App\\Models\\WheelPrice',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            33 =>
            array(
                'type' => 'withdrawal',
                'qualified_name' => 'App\\Models\\Withdrawal',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            34 =>
            array(
                'type' => 'employee',
                'qualified_name' => 'App\\Models\\Employee',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            35 =>
            array(
                'type' => 'refund',
                'qualified_name' => 'App\\Models\\Transaction',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            36 =>
            array(
                'type' => 'material',
                'qualified_name' => 'App\\Models\\BusinessPriceItemDetail',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            37 =>
            array(
                'type' => 'transportation',
                'qualified_name' => 'App\\Models\\Transportation',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            38 =>
            array(
                'type' => 'route',
                'qualified_name' => 'App\\Models\\RouteDetail',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            39 =>
            array(
                'type' => 'service_charge',
                'qualified_name' => 'App\\Models\\ServiceCharge',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            40 =>
            array(
                'type' => 'purchase',
                'qualified_name' => 'App\\Models\\Purchase',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            41 =>
            array(
                'type' => 'site',
                'qualified_name' => 'App\\Models\\Site',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            42 =>
            array(
                'type' => 'zone',
                'qualified_name' => 'App\\Models\\Zone',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            43 =>
            array(
                'type' => 'customer',
                'qualified_name' => 'App\\Models\\Customer',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            44 =>
            array(
                'type' => 'customer_account',
                'qualified_name' => 'App\\Models\\CustomerAccount',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            45 =>
            array(
                'type' => 'bank_statement',
                'qualified_name' => 'App\\Models\\Account',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            46 =>
            array(
                'type' => 'tonne_refund',
                'qualified_name' => 'App\\Models\\TonneRefunds',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            47 =>
            array(
                'type' => 'waiting_charges',
                'qualified_name' => 'App\\Models\\WaitingCharges',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            48 =>
            array(
                'type' => 'reload_charges',
                'qualified_name' => 'App\\Models\\ReloadCharges',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            49 =>
            array(
                'type' => 'withdrawal_charges',
                'qualified_name' => 'App\\Models\\WithdrawalCharges',
                'creator_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
        ));

        DB::update("alter table morphs ENABLE ROW LEVEL SECURITY;");
        DB::update('create policy "Enable read access for all users" on "public"."morphs" as PERMISSIVE for SELECT to public using (true);');
    }
};
