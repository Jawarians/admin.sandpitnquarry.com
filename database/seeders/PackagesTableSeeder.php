<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PackagesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        DB::table('packages')->delete();

        DB::table('packages')->insert(array(
            0 =>
            array(
                'id' => 1,
                'name' => 'Silver',
                'period' => 1,
                'discount' => 0,
                'service_charge' => 0,
                'payment_term' => 21,
                'order_delay_minutes' => 20,
                'transporter_introducer' => '15',
                'customer_introducer' => '0.5',
                'image' => 'https://picsum.photos/id/238/200/300',
                'badge' => 'https://storage.googleapis.com/snq-website-images/customer/silver_badge.png',
                'show' => true,
                'trial' => 0,
                'rgba' => 'rgba(193, 110, 61, 1)',
                'creator_id' => 0,
                'created_at' => '2023-11-24 12:25:09',
                'updated_at' => '2023-11-24 12:25:09',
            ),
            1 =>
            array(
                'id' => 2,
                'name' => 'Gold',
                'period' => 12,
                'discount' => 10,
                'service_charge' => 0,
                'payment_term' => 14,
                'order_delay_minutes' => 10,
                'transporter_introducer' => '15',
                'customer_introducer' => '0.5',
                'image' => 'https://picsum.photos/id/239/200/300',
                'badge' => 'https://storage.googleapis.com/snq-website-images/customer/gold_badge.png',
                'show' => true,
                'trial' => 0,
                'rgba' => 'rgba(130, 130, 130, 1)',
                'creator_id' => 0,
                'created_at' => '2023-11-24 12:25:09',
                'updated_at' => '2023-11-24 12:25:09',
            ),
            2 =>
            array(
                'id' => 3,
                'name' => 'Diamond',
                'period' => 24,
                'discount' => 15,
                'service_charge' => 0,
                'payment_term' => 7,
                'order_delay_minutes' => 0,
                'transporter_introducer' => '15',
                'customer_introducer' => '0.5',
                'image' => 'https://picsum.photos/id/240/200/300',
                'badge' => 'https://storage.googleapis.com/snq-website-images/customer/diamond_badge.png',
                'show' => true,
                'trial' => 0,
                'rgba' => 'rgba(255, 157, 9, 1)',
                'creator_id' => 0,
                'created_at' => '2023-11-24 12:25:09',
                'updated_at' => '2023-11-24 12:25:09',
            ),
            3 =>
            array(
                'id' => 0,
                'name' => 'Bronze',
                'period' => 0,
                'discount' => 0,
                'service_charge' => 0.01,
                'payment_term' => 28,
                'order_delay_minutes' => 0,
                'transporter_introducer' => '15',
                'customer_introducer' => '0.5',
                'image' => 'https://picsum.photos/id/237/200/300',
                'badge' => 'https://storage.googleapis.com/snq-website-images/customer/bronze_badge.png',
                'show' => true,
                'trial' => 0,
                'rgba' => 'rgba(40, 69, 254, 1)',
                'creator_id' => 0,
                'created_at' => '2023-11-24 12:25:09',
                'updated_at' => '2023-11-24 12:25:09',
            ),
        ));
    }
}
