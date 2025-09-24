<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\User;

class CustomerNotificationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('customer_notifications')->delete();
        DB::table('customer_notifications')->insert(
            array(
                0 =>
                    array(
                        'notification_type' => 'info',
                        'title' => 'Welcome to our service!',
                        'description' => 'Thank you for signing up. Stay tuned for updates.',
                        'receiver_id' => 36,
                        'read_status' => false,
                        'image_url' => 'https://storage.googleapis.com/snq-website-images/customer/snq-splash.jpg',
                        'created_at' => Carbon::now(),
                        'creator_id' => 0,
                        'updated_at' => Carbon::now(),
                    ),
                1 =>
                    array(
                        'notification_type' => 'order',
                        'title' => 'Your order has been shipped!',
                        'description' => 'Your recent order is now on its way. Track your shipment for details.',
                        'receiver_id' => 36,
                        'read_status' => false,
                        'image_url' => 'https://storage.googleapis.com/snq-website-images/customer/fine_1.png',
                        'created_at' => Carbon::now(),
                        'creator_id' => 0,
                        'updated_at' => Carbon::now(),
                    ),
                2 =>
                    array(
                        'notification_type' => 'token',
                        'title' => 'Your SQ Tokens are about to expire!',
                        'description' => 'Use your SQ Tokens before they expire at the end of this month.',
                        'receiver_id' => 36,
                        'read_status' => false,
                        'image_url' => 'https://storage.googleapis.com/snq-website-images/customer/token.png',
                        'created_at' => Carbon::now(),
                        'creator_id' => 0,
                        'updated_at' => Carbon::now(),
                    ),
            )
        );
    }
}
