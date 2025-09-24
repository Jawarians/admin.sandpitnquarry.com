<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ResetTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        DB::update("SELECT setval(pg_get_serial_sequence('account_detail_items', 'id'), coalesce(max(id),0) + 1, false) FROM account_detail_items;");
        DB::update("SELECT setval(pg_get_serial_sequence('account_details', 'id'), coalesce(max(id),0) + 1, false) FROM account_details;");
        DB::update("SELECT setval(pg_get_serial_sequence('accounts', 'id'), coalesce(max(id),0) + 1, false) FROM accounts;");
        DB::update("SELECT setval(pg_get_serial_sequence('address_details', 'id'), coalesce(max(id),0) + 1, false) FROM address_details;");
        DB::update("SELECT setval(pg_get_serial_sequence('addresses', 'id'), coalesce(max(id),0) + 1, false) FROM addresses;");
        DB::update("SELECT setval(pg_get_serial_sequence('affiliates', 'id'), coalesce(max(id),0) + 1, false) FROM affiliates;");
        DB::update("SELECT setval(pg_get_serial_sequence('announcement_triggers', 'id'), coalesce(max(id),0) + 1, false) FROM announcement_triggers;");
        DB::update("SELECT setval(pg_get_serial_sequence('announcements', 'id'), coalesce(max(id),0) + 1, false) FROM announcements;");
        DB::update("SELECT setval(pg_get_serial_sequence('assignments', 'id'), coalesce(max(id),0) + 1, false) FROM assignments;");
        DB::update("SELECT setval(pg_get_serial_sequence('bills', 'id'), coalesce(max(id),0) + 1, false) FROM bills;");
        DB::update("SELECT setval(pg_get_serial_sequence('business_price_amounts', 'id'), coalesce(max(id),0) + 1, false) FROM business_price_amounts;");
        DB::update("SELECT setval(pg_get_serial_sequence('business_price_detail_wheels', 'id'), coalesce(max(id),0) + 1, false) FROM business_price_detail_wheels;");
        DB::update("SELECT setval(pg_get_serial_sequence('business_price_details', 'id'), coalesce(max(id),0) + 1, false) FROM business_price_details;");
        DB::update("SELECT setval(pg_get_serial_sequence('business_price_item_details', 'id'), coalesce(max(id),0) + 1, false) FROM business_price_item_details;");
        DB::update("SELECT setval(pg_get_serial_sequence('business_price_items', 'id'), coalesce(max(id),0) + 1, false) FROM business_price_items;");
        DB::update("SELECT setval(pg_get_serial_sequence('business_price_orders', 'id'), coalesce(max(id),0) + 1, false) FROM business_price_orders;");
        DB::update("SELECT setval(pg_get_serial_sequence('business_price_purchases', 'id'), coalesce(max(id),0) + 1, false) FROM business_price_purchases;");
        DB::update("SELECT setval(pg_get_serial_sequence('business_prices', 'id'), coalesce(max(id),0) + 1, false) FROM business_prices;");
        DB::update("SELECT setval(pg_get_serial_sequence('claim_details', 'id'), coalesce(max(id),0) + 1, false) FROM claim_details;");
        DB::update("SELECT setval(pg_get_serial_sequence('claims', 'id'), coalesce(max(id),0) + 1, false) FROM claims;");
        DB::update("SELECT setval(pg_get_serial_sequence('codes', 'id'), coalesce(max(id),0) + 1, false) FROM codes;");
        DB::update("SELECT setval(pg_get_serial_sequence('coin_promotion_details', 'id'), coalesce(max(id),0) + 1, false) FROM coin_promotion_details;");
        DB::update("SELECT setval(pg_get_serial_sequence('coin_promotions', 'id'), coalesce(max(id),0) + 1, false) FROM coin_promotions;");
        DB::update("SELECT setval(pg_get_serial_sequence('coin_rates', 'id'), coalesce(max(id),0) + 1, false) FROM coin_rates;");
        DB::update("SELECT setval(pg_get_serial_sequence('coin_rates_details', 'id'), coalesce(max(id),0) + 1, false) FROM coin_rates_details;");
        DB::update("SELECT setval(pg_get_serial_sequence('coin_refunds', 'id'), coalesce(max(id),0) + 1, false) FROM coin_refunds;");
        DB::update("SELECT setval(pg_get_serial_sequence('coins', 'id'), coalesce(max(id),0) + 1, false) FROM coins;");
        DB::update("SELECT setval(pg_get_serial_sequence('companies', 'id'), coalesce(max(id),0) + 1, false) FROM companies;");
        DB::update("SELECT setval(pg_get_serial_sequence('company_details', 'id'), coalesce(max(id),0) + 1, false) FROM company_details;");
        DB::update("SELECT setval(pg_get_serial_sequence('connected_accounts', 'id'), coalesce(max(id),0) + 1, false) FROM connected_accounts;");
        DB::update("SELECT setval(pg_get_serial_sequence('contact_us', 'id'), coalesce(max(id),0) + 1, false) FROM contact_us;");
        DB::update("SELECT setval(pg_get_serial_sequence('contacts', 'id'), coalesce(max(id),0) + 1, false) FROM contacts;");
        DB::update("SELECT setval(pg_get_serial_sequence('conversationables', 'id'), coalesce(max(id),0) + 1, false) FROM conversationables;");
        DB::update("SELECT setval(pg_get_serial_sequence('conversations', 'id'), coalesce(max(id),0) + 1, false) FROM conversations;");
        DB::update("SELECT setval(pg_get_serial_sequence('customer_accounts', 'id'), coalesce(max(id),0) + 1, false) FROM customer_accounts;");
        DB::update("SELECT setval(pg_get_serial_sequence('customer_details', 'id'), coalesce(max(id),0) + 1, false) FROM customer_details;");
        DB::update("SELECT setval(pg_get_serial_sequence('customer_referrer_percents', 'id'), coalesce(max(id),0) + 1, false) FROM customer_referrer_percents;");
        DB::update("SELECT setval(pg_get_serial_sequence('customer_referrers', 'id'), coalesce(max(id),0) + 1, false) FROM customer_referrers;");
        DB::update("SELECT setval(pg_get_serial_sequence('debits', 'id'), coalesce(max(id),0) + 1, false) FROM debits;");
        DB::update("SELECT setval(pg_get_serial_sequence('delivery_orders', 'id'), coalesce(max(id),0) + 1, false) FROM delivery_orders;");
        DB::update("SELECT setval(pg_get_serial_sequence('dividend_percents', 'id'), coalesce(max(id),0) + 1, false) FROM dividend_percents;");
        DB::update("SELECT setval(pg_get_serial_sequence('dividend_points', 'id'), coalesce(max(id),0) + 1, false) FROM dividend_points;");
        DB::update("SELECT setval(pg_get_serial_sequence('documents', 'id'), coalesce(max(id),0) + 1, false) FROM documents;");
        DB::update("SELECT setval(pg_get_serial_sequence('driver_details', 'id'), coalesce(max(id),0) + 1, false) FROM driver_details;");
        DB::update("SELECT setval(pg_get_serial_sequence('drivers', 'id'), coalesce(max(id),0) + 1, false) FROM drivers;");
        DB::update("SELECT setval(pg_get_serial_sequence('employees', 'id'), coalesce(max(id),0) + 1, false) FROM employees;");
        DB::update("SELECT setval(pg_get_serial_sequence('events', 'id'), coalesce(max(id),0) + 1, false) FROM events;");
        DB::update("SELECT setval(pg_get_serial_sequence('exports', 'id'), coalesce(max(id),0) + 1, false) FROM exports;");
        DB::update("SELECT setval(pg_get_serial_sequence('failed_import_rows', 'id'), coalesce(max(id),0) + 1, false) FROM failed_import_rows;");
        DB::update("SELECT setval(pg_get_serial_sequence('failed_jobs', 'id'), coalesce(max(id),0) + 1, false) FROM failed_jobs;");
        DB::update("SELECT setval(pg_get_serial_sequence('favourites', 'id'), coalesce(max(id),0) + 1, false) FROM favourites;");
        DB::update("SELECT setval(pg_get_serial_sequence('feedbacks', 'id'), coalesce(max(id),0) + 1, false) FROM feedbacks;");
        DB::update("SELECT setval(pg_get_serial_sequence('fees', 'id'), coalesce(max(id),0) + 1, false) FROM fees;");
        DB::update("SELECT setval(pg_get_serial_sequence('hero_headers', 'id'), coalesce(max(id),0) + 1, false) FROM hero_headers;");
        DB::update("SELECT setval(pg_get_serial_sequence('histories', 'id'), coalesce(max(id),0) + 1, false) FROM histories;");
        DB::update("SELECT setval(pg_get_serial_sequence('imports', 'id'), coalesce(max(id),0) + 1, false) FROM imports;");
        DB::update("SELECT setval(pg_get_serial_sequence('insurances', 'id'), coalesce(max(id),0) + 1, false) FROM insurances;");
        DB::update("SELECT setval(pg_get_serial_sequence('invoice_orders', 'id'), coalesce(max(id),0) + 1, false) FROM invoice_orders;");
        DB::update("SELECT setval(pg_get_serial_sequence('invoices', 'id'), coalesce(max(id),0) + 1, false) FROM invoices;");
        DB::update("SELECT setval(pg_get_serial_sequence('job_details', 'id'), coalesce(max(id),0) + 1, false) FROM job_details;");
        DB::update("SELECT setval(pg_get_serial_sequence('jobs', 'id'), coalesce(max(id),0) + 1, false) FROM jobs;");
        DB::update("SELECT setval(pg_get_serial_sequence('merchants', 'id'), coalesce(max(id),0) + 1, false) FROM merchants;");
        DB::update("SELECT setval(pg_get_serial_sequence('migrations', 'id'), coalesce(max(id),0) + 1, false) FROM migrations;");
        DB::update("SELECT setval(pg_get_serial_sequence('mission_progresses', 'id'), coalesce(max(id),0) + 1, false) FROM mission_progresses;");
        DB::update("SELECT setval(pg_get_serial_sequence('missions', 'id'), coalesce(max(id),0) + 1, false) FROM missions;");
        DB::update("SELECT setval(pg_get_serial_sequence('order_amounts', 'id'), coalesce(max(id),0) + 1, false) FROM order_amounts;");
        DB::update("SELECT setval(pg_get_serial_sequence('order_contacts', 'id'), coalesce(max(id),0) + 1, false) FROM order_contacts;");
        DB::update("SELECT setval(pg_get_serial_sequence('order_delegations', 'id'), coalesce(max(id),0) + 1, false) FROM order_delegations;");
        DB::update("SELECT setval(pg_get_serial_sequence('order_details', 'id'), coalesce(max(id),0) + 1, false) FROM order_details;");
        DB::update("SELECT setval(pg_get_serial_sequence('orders', 'id'), coalesce(max(id),0) + 1, false) FROM orders;");
        DB::update("SELECT setval(pg_get_serial_sequence('packages', 'id'), coalesce(max(id),0) + 1, false) FROM packages;");
        DB::update("SELECT setval(pg_get_serial_sequence('payment_details', 'id'), coalesce(max(id),0) + 1, false) FROM payment_details;");
        DB::update("SELECT setval(pg_get_serial_sequence('payments', 'id'), coalesce(max(id),0) + 1, false) FROM payments;");
        DB::update("SELECT setval(pg_get_serial_sequence('permits', 'id'), coalesce(max(id),0) + 1, false) FROM permits;");
        DB::update("SELECT setval(pg_get_serial_sequence('personal_access_tokens', 'id'), coalesce(max(id),0) + 1, false) FROM personal_access_tokens;");
        DB::update("SELECT setval(pg_get_serial_sequence('points', 'id'), coalesce(max(id),0) + 1, false) FROM points;");
        DB::update("SELECT setval(pg_get_serial_sequence('post_offices', 'id'), coalesce(max(id),0) + 1, false) FROM post_offices;");
        DB::update("SELECT setval(pg_get_serial_sequence('postcode_zones', 'id'), coalesce(max(id),0) + 1, false) FROM postcode_zones;");
        DB::update("SELECT setval(pg_get_serial_sequence('price_items', 'id'), coalesce(max(id),0) + 1, false) FROM price_items;");
        DB::update("SELECT setval(pg_get_serial_sequence('prices', 'id'), coalesce(max(id),0) + 1, false) FROM prices;");
        DB::update("SELECT setval(pg_get_serial_sequence('product_categories', 'id'), coalesce(max(id),0) + 1, false) FROM product_categories;");
        DB::update("SELECT setval(pg_get_serial_sequence('product_images', 'id'), coalesce(max(id),0) + 1, false) FROM product_images;");
        DB::update("SELECT setval(pg_get_serial_sequence('products', 'id'), coalesce(max(id),0) + 1, false) FROM products;");
        DB::update("SELECT setval(pg_get_serial_sequence('purchases', 'id'), coalesce(max(id),0) + 1, false) FROM purchases;");
        DB::update("SELECT setval(pg_get_serial_sequence('queues', 'id'), coalesce(max(id),0) + 1, false) FROM queues;");
        DB::update("SELECT setval(pg_get_serial_sequence('redeem_points', 'id'), coalesce(max(id),0) + 1, false) FROM redeem_points;");
        DB::update("SELECT setval(pg_get_serial_sequence('redeem_ratios', 'id'), coalesce(max(id),0) + 1, false) FROM redeem_ratios;");
        DB::update("SELECT setval(pg_get_serial_sequence('referrers', 'id'), coalesce(max(id),0) + 1, false) FROM referrers;");
        DB::update("SELECT setval(pg_get_serial_sequence('reloads', 'id'), coalesce(max(id),0) + 1, false) FROM reloads;");
        DB::update("SELECT setval(pg_get_serial_sequence('reviews', 'id'), coalesce(max(id),0) + 1, false) FROM reviews;");
        DB::update("SELECT setval(pg_get_serial_sequence('role_permissions', 'id'), coalesce(max(id),0) + 1, false) FROM role_permissions;");
        DB::update("SELECT setval(pg_get_serial_sequence('route_details', 'id'), coalesce(max(id),0) + 1, false) FROM route_details;");
        DB::update("SELECT setval(pg_get_serial_sequence('routes', 'id'), coalesce(max(id),0) + 1, false) FROM routes;");
        DB::update("SELECT setval(pg_get_serial_sequence('sites', 'id'), coalesce(max(id),0) + 1, false) FROM sites;");
        DB::update("SELECT setval(pg_get_serial_sequence('slips', 'id'), coalesce(max(id),0) + 1, false) FROM slips;");
        DB::update("SELECT setval(pg_get_serial_sequence('subscriptions', 'id'), coalesce(max(id),0) + 1, false) FROM subscriptions;");
        DB::update("SELECT setval(pg_get_serial_sequence('tasks', 'id'), coalesce(max(id),0) + 1, false) FROM tasks;");
        DB::update("SELECT setval(pg_get_serial_sequence('tokens', 'id'), coalesce(max(id),0) + 1, false) FROM tokens;");
        DB::update("SELECT setval(pg_get_serial_sequence('transactions', 'id'), coalesce(max(id),0) + 1, false) FROM transactions;");
        DB::update("SELECT setval(pg_get_serial_sequence('transportation_fees', 'id'), coalesce(max(id),0) + 1, false) FROM transportation_fees;");
        DB::update("SELECT setval(pg_get_serial_sequence('transporter_accounts', 'id'), coalesce(max(id),0) + 1, false) FROM transporter_accounts;");
        DB::update("SELECT setval(pg_get_serial_sequence('transporter_fee_details', 'id'), coalesce(max(id),0) + 1, false) FROM transporter_fee_details;");
        DB::update("SELECT setval(pg_get_serial_sequence('transporter_fees', 'id'), coalesce(max(id),0) + 1, false) FROM transporter_fees;");
        DB::update("SELECT setval(pg_get_serial_sequence('transporter_referrer_percents', 'id'), coalesce(max(id),0) + 1, false) FROM transporter_referrer_percents;");
        DB::update("SELECT setval(pg_get_serial_sequence('transporter_referrers', 'id'), coalesce(max(id),0) + 1, false) FROM transporter_referrers;");
        DB::update("SELECT setval(pg_get_serial_sequence('transporters', 'id'), coalesce(max(id),0) + 1, false) FROM transporters;");
        DB::update("SELECT setval(pg_get_serial_sequence('trip_details', 'id'), coalesce(max(id),0) + 1, false) FROM trip_details;");
        DB::update("SELECT setval(pg_get_serial_sequence('trip_locations', 'id'), coalesce(max(id),0) + 1, false) FROM trip_locations;");
        DB::update("SELECT setval(pg_get_serial_sequence('trip_reasons', 'id'), coalesce(max(id),0) + 1, false) FROM trip_reasons;");
        DB::update("SELECT setval(pg_get_serial_sequence('trip_rejection_reasons', 'id'), coalesce(max(id),0) + 1, false) FROM trip_rejection_reasons;");
        DB::update("SELECT setval(pg_get_serial_sequence('trip_termination_reasons', 'id'), coalesce(max(id),0) + 1, false) FROM trip_termination_reasons;");
        DB::update("SELECT setval(pg_get_serial_sequence('trips', 'id'), coalesce(max(id),0) + 1, false) FROM trips;");
        DB::update("SELECT setval(pg_get_serial_sequence('truck_details', 'id'), coalesce(max(id),0) + 1, false) FROM truck_details;");
        DB::update("SELECT setval(pg_get_serial_sequence('truck_missions', 'id'), coalesce(max(id),0) + 1, false) FROM truck_missions;");
        DB::update("SELECT setval(pg_get_serial_sequence('trucks', 'id'), coalesce(max(id),0) + 1, false) FROM trucks;");
        DB::update("SELECT setval(pg_get_serial_sequence('user_roles', 'id'), coalesce(max(id),0) + 1, false) FROM user_roles;");
        DB::update("SELECT setval(pg_get_serial_sequence('users', 'id'), coalesce(max(id),0) + 1, false) FROM users;");
        DB::update("SELECT setval(pg_get_serial_sequence('whats_app_users', 'id'), coalesce(max(id),0) + 1, false) FROM whats_app_users;");
        DB::update("SELECT setval(pg_get_serial_sequence('withdrawal_details', 'id'), coalesce(max(id),0) + 1, false) FROM withdrawal_details;");
        DB::update("SELECT setval(pg_get_serial_sequence('withdrawals', 'id'), coalesce(max(id),0) + 1, false) FROM withdrawals;");
        DB::update("SELECT setval(pg_get_serial_sequence('zones', 'id'), coalesce(max(id),0) + 1, false) FROM zones;");
    }
}
