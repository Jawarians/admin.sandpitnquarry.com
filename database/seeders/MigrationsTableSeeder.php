<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MigrationsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        DB::table('migrations')->delete();
        
        DB::table('migrations')->insert(array (
            0 => 
            array (
                'id' => 1,
                'migration' => '0001_01_01_000001_create_cache_table',
                'batch' => 1,
            ),
            1 => 
            array (
                'id' => 2,
                'migration' => '2014_10_12_000000_create_users_table',
                'batch' => 1,
            ),
            2 => 
            array (
                'id' => 3,
                'migration' => '2014_10_12_100000_create_password_reset_tokens_table',
                'batch' => 1,
            ),
            3 => 
            array (
                'id' => 4,
                'migration' => '2014_10_12_200000_add_two_factor_columns_to_users_table',
                'batch' => 1,
            ),
            4 => 
            array (
                'id' => 5,
                'migration' => '2019_08_19_000000_create_failed_jobs_table',
                'batch' => 1,
            ),
            5 => 
            array (
                'id' => 6,
                'migration' => '2019_12_14_000001_create_personal_access_tokens_table',
                'batch' => 1,
            ),
            6 => 
            array (
                'id' => 7,
                'migration' => '2020_12_22_000000_create_connected_accounts_table',
                'batch' => 1,
            ),
            7 => 
            array (
                'id' => 8,
                'migration' => '2022_12_31_010000_add_super_admin_to_users_table',
                'batch' => 1,
            ),
            8 => 
            array (
                'id' => 9,
                'migration' => '2023_01_01_000000_create_countries_table',
                'batch' => 1,
            ),
            9 => 
            array (
                'id' => 10,
                'migration' => '2023_01_01_010000_add_default_value_to_countries_table',
                'batch' => 1,
            ),
            10 => 
            array (
                'id' => 11,
                'migration' => '2023_04_01_010000_create_wheels_table',
                'batch' => 1,
            ),
            11 => 
            array (
                'id' => 12,
                'migration' => '2023_04_01_020000_add_default_value_to_wheels_table',
                'batch' => 1,
            ),
            12 => 
            array (
                'id' => 13,
                'migration' => '2023_04_10_010001_add_demo_columns_to_users_table',
                'batch' => 1,
            ),
            13 => 
            array (
                'id' => 14,
                'migration' => '2023_04_10_010002_add_phone_columns_to_users_table',
                'batch' => 1,
            ),
            14 => 
            array (
                'id' => 15,
                'migration' => '2023_04_10_010003_create_affiliates_table',
                'batch' => 1,
            ),
            15 => 
            array (
                'id' => 16,
                'migration' => '2023_04_10_010004_update_super_admin_phone_number',
                'batch' => 1,
            ),
            16 => 
            array (
                'id' => 17,
                'migration' => '2023_04_10_020000_create_company_types_table',
                'batch' => 1,
            ),
            17 => 
            array (
                'id' => 18,
                'migration' => '2023_04_10_020001_add_default_value_to_company_types_table',
                'batch' => 1,
            ),
            18 => 
            array (
                'id' => 19,
                'migration' => '2023_04_10_021815_create_sessions_table',
                'batch' => 1,
            ),
            19 => 
            array (
                'id' => 20,
                'migration' => '2023_04_10_030000_create_address_types_table',
                'batch' => 1,
            ),
            20 => 
            array (
                'id' => 21,
                'migration' => '2023_04_10_033000_add_default_value_to_address_types_table',
                'batch' => 1,
            ),
            21 => 
            array (
                'id' => 22,
                'migration' => '2023_04_10_036000_create_contact_types_table',
                'batch' => 1,
            ),
            22 => 
            array (
                'id' => 23,
                'migration' => '2023_04_10_040000_add_default_value_to_contact_types_table',
                'batch' => 1,
            ),
            23 => 
            array (
                'id' => 24,
                'migration' => '2023_04_10_040701_create_address_states_table',
                'batch' => 1,
            ),
            24 => 
            array (
                'id' => 25,
                'migration' => '2023_04_10_040816_create_cities_table',
                'batch' => 1,
            ),
            25 => 
            array (
                'id' => 26,
                'migration' => '2023_04_10_040820_create_postcodes_table',
                'batch' => 1,
            ),
            26 => 
            array (
                'id' => 27,
                'migration' => '2023_04_10_040833_create_post_offices_table',
                'batch' => 1,
            ),
            27 => 
            array (
                'id' => 28,
                'migration' => '2023_04_10_043349_create_product_categories_table',
                'batch' => 1,
            ),
            28 => 
            array (
                'id' => 29,
                'migration' => '2023_04_10_043400_create_products_table',
                'batch' => 1,
            ),
            29 => 
            array (
                'id' => 30,
                'migration' => '2023_04_10_064829_create_merchants_table',
                'batch' => 1,
            ),
            30 => 
            array (
                'id' => 31,
                'migration' => '2023_04_10_075809_create_sites_table',
                'batch' => 1,
            ),
            31 => 
            array (
                'id' => 32,
                'migration' => '2023_04_10_083456_create_packages_table',
                'batch' => 1,
            ),
            32 => 
            array (
                'id' => 33,
                'migration' => '2023_04_10_200000_create_banks_table',
                'batch' => 1,
            ),
            33 => 
            array (
                'id' => 34,
                'migration' => '2023_04_10_203000_add_default_value_to_banks_table',
                'batch' => 1,
            ),
            34 => 
            array (
                'id' => 35,
                'migration' => '2023_04_11_020000_create_transporters_table',
                'batch' => 1,
            ),
            35 => 
            array (
                'id' => 36,
                'migration' => '2023_04_11_023000_add_default_value_to_transporters_table',
                'batch' => 1,
            ),
            36 => 
            array (
                'id' => 37,
                'migration' => '2023_04_11_030000_create_transporter_accounts_table',
                'batch' => 1,
            ),
            37 => 
            array (
                'id' => 38,
                'migration' => '2023_04_11_033000_add_default_value_to_transporter_accounts_table',
                'batch' => 1,
            ),
            38 => 
            array (
                'id' => 39,
                'migration' => '2023_04_11_072456_create_drivers_table',
                'batch' => 1,
            ),
            39 => 
            array (
                'id' => 40,
                'migration' => '2023_04_11_080000_create_driver_statuses_table',
                'batch' => 1,
            ),
            40 => 
            array (
                'id' => 41,
                'migration' => '2023_04_11_090000_add_default_value_to_driver_statuses_table',
                'batch' => 1,
            ),
            41 => 
            array (
                'id' => 42,
                'migration' => '2023_04_11_100000_create_driver_details_table',
                'batch' => 1,
            ),
            42 => 
            array (
                'id' => 43,
                'migration' => '2023_04_11_102620_create_trucks_table',
                'batch' => 1,
            ),
            43 => 
            array (
                'id' => 44,
                'migration' => '2023_04_11_120000_create_truck_statuses_table',
                'batch' => 1,
            ),
            44 => 
            array (
                'id' => 45,
                'migration' => '2023_04_11_150000_add_default_value_to_truck_statuses_table',
                'batch' => 1,
            ),
            45 => 
            array (
                'id' => 46,
                'migration' => '2023_04_11_180000_create_truck_details_table',
                'batch' => 1,
            ),
            46 => 
            array (
                'id' => 47,
                'migration' => '2023_04_12_000000_create_assignments_table',
                'batch' => 1,
            ),
            47 => 
            array (
                'id' => 48,
                'migration' => '2023_04_12_041543_create_addresses_table',
                'batch' => 1,
            ),
            48 => 
            array (
                'id' => 49,
                'migration' => '2023_04_12_042000_create_address_statuses_table',
                'batch' => 1,
            ),
            49 => 
            array (
                'id' => 50,
                'migration' => '2023_04_12_042300_add_default_value_to_address_statuses_table',
                'batch' => 1,
            ),
            50 => 
            array (
                'id' => 51,
                'migration' => '2023_04_12_043000_create_address_details_table',
                'batch' => 1,
            ),
            51 => 
            array (
                'id' => 52,
                'migration' => '2023_04_12_050000_create_contacts_table',
                'batch' => 1,
            ),
            52 => 
            array (
                'id' => 53,
                'migration' => '2023_04_13_022258_create_codes_table',
                'batch' => 1,
            ),
            53 => 
            array (
                'id' => 54,
                'migration' => '2023_04_19_010635_create_fees_table',
                'batch' => 1,
            ),
            54 => 
            array (
                'id' => 55,
                'migration' => '2023_05_01_010000_create_morphs_table',
                'batch' => 1,
            ),
            55 => 
            array (
                'id' => 56,
                'migration' => '2023_05_01_030000_add_default_value_to_morphs_table',
                'batch' => 1,
            ),
            56 => 
            array (
                'id' => 57,
                'migration' => '2023_05_02_035345_create_companies_table copy',
                'batch' => 1,
            ),
            57 => 
            array (
                'id' => 58,
                'migration' => '2023_05_02_090000_create_companies_details_table',
                'batch' => 1,
            ),
            58 => 
            array (
                'id' => 59,
                'migration' => '2023_05_02_090250_create_slips_table',
                'batch' => 1,
            ),
            59 => 
            array (
                'id' => 60,
                'migration' => '2023_05_02_105520_create_subscriptions_table',
                'batch' => 1,
            ),
            60 => 
            array (
                'id' => 61,
                'migration' => '2023_05_03_021511_create_reloads_table',
                'batch' => 1,
            ),
            61 => 
            array (
                'id' => 62,
                'migration' => '2023_05_03_095806_create_coins_table',
                'batch' => 1,
            ),
            62 => 
            array (
                'id' => 63,
                'migration' => '2023_05_05_014440_create_queues_table',
                'batch' => 1,
            ),
            63 => 
            array (
                'id' => 64,
                'migration' => '2023_05_09_044403_create_product_images_table',
                'batch' => 1,
            ),
            64 => 
            array (
                'id' => 65,
                'migration' => '2023_05_15_144044_create_invoices_table',
                'batch' => 1,
            ),
            65 => 
            array (
                'id' => 66,
                'migration' => '2023_05_15_171600_create_order_units_table',
                'batch' => 1,
            ),
            66 => 
            array (
                'id' => 67,
                'migration' => '2023_05_15_171630_add_default_value_to_order_units_table',
                'batch' => 1,
            ),
            67 => 
            array (
                'id' => 68,
                'migration' => '2023_05_15_190000_create_order_statuses_table',
                'batch' => 1,
            ),
            68 => 
            array (
                'id' => 69,
                'migration' => '2023_05_15_193000_add_default_value_to_order_statuses_table',
                'batch' => 1,
            ),
            69 => 
            array (
                'id' => 70,
                'migration' => '2023_05_18_141704_create_trip_statuses_table',
                'batch' => 1,
            ),
            70 => 
            array (
                'id' => 71,
                'migration' => '2023_05_18_141720_create_job_statuses_table',
                'batch' => 1,
            ),
            71 => 
            array (
                'id' => 72,
                'migration' => '2023_05_18_141730_add_default_value_to_job_statuses_table',
                'batch' => 1,
            ),
            72 => 
            array (
                'id' => 73,
                'migration' => '2023_05_31_122022_create_hero_headers_table',
                'batch' => 1,
            ),
            73 => 
            array (
                'id' => 74,
                'migration' => '2023_05_31_200000_create_coin_refunds_table',
                'batch' => 1,
            ),
            74 => 
            array (
                'id' => 75,
                'migration' => '2023_06_01_100000_create_missions_table',
                'batch' => 1,
            ),
            75 => 
            array (
                'id' => 76,
                'migration' => '2023_06_09_094437_create_permits_table',
                'batch' => 1,
            ),
            76 => 
            array (
                'id' => 77,
                'migration' => '2023_06_09_094546_create_insurances_table',
                'batch' => 1,
            ),
            77 => 
            array (
                'id' => 78,
                'migration' => '2023_07_26_163610_create_whats_app_phone_numbers_table',
                'batch' => 1,
            ),
            78 => 
            array (
                'id' => 79,
                'migration' => '2023_07_26_163758_create_whats_app_users_table',
                'batch' => 1,
            ),
            79 => 
            array (
                'id' => 80,
                'migration' => '2023_07_26_163824_create_whats_app_messages_table',
                'batch' => 1,
            ),
            80 => 
            array (
                'id' => 81,
                'migration' => '2023_07_26_163833_create_whats_app_images_table',
                'batch' => 1,
            ),
            81 => 
            array (
                'id' => 82,
                'migration' => '2023_07_26_163840_create_whats_app_documents_table',
                'batch' => 1,
            ),
            82 => 
            array (
                'id' => 83,
                'migration' => '2023_07_26_163851_create_whats_app_conversations_table',
                'batch' => 1,
            ),
            83 => 
            array (
                'id' => 84,
                'migration' => '2023_07_27_141118_create_whats_app_buttons_table',
                'batch' => 1,
            ),
            84 => 
            array (
                'id' => 85,
                'migration' => '2023_07_27_141138_create_whats_app_texts_table',
                'batch' => 1,
            ),
            85 => 
            array (
                'id' => 86,
                'migration' => '2023_07_27_141152_create_whats_app_interactives_table',
                'batch' => 1,
            ),
            86 => 
            array (
                'id' => 87,
                'migration' => '2023_07_27_141206_create_whats_app_stickers_table',
                'batch' => 1,
            ),
            87 => 
            array (
                'id' => 88,
                'migration' => '2023_07_27_141212_create_whats_app_systems_table',
                'batch' => 1,
            ),
            88 => 
            array (
                'id' => 89,
                'migration' => '2023_07_27_141223_create_whats_app_videos_table',
                'batch' => 1,
            ),
            89 => 
            array (
                'id' => 90,
                'migration' => '2023_07_27_142518_create_whats_app_audio_table',
                'batch' => 1,
            ),
            90 => 
            array (
                'id' => 91,
                'migration' => '2023_07_28_113936_create_whats_app_reactions_table',
                'batch' => 1,
            ),
            91 => 
            array (
                'id' => 92,
                'migration' => '2023_08_01_091428_create_trip_rejection_reasons_table',
                'batch' => 1,
            ),
            92 => 
            array (
                'id' => 93,
                'migration' => '2023_08_01_091528_create_trip_terminations_reasons_table',
                'batch' => 1,
            ),
            93 => 
            array (
                'id' => 94,
                'migration' => '2023_09_27_104928_create_contact_us_table',
                'batch' => 1,
            ),
            94 => 
            array (
                'id' => 95,
                'migration' => '2023_09_27_104928_create_feedbacks_table',
                'batch' => 1,
            ),
            95 => 
            array (
                'id' => 96,
                'migration' => '2023_10_05_193428_create_referrers_table',
                'batch' => 1,
            ),
            96 => 
            array (
                'id' => 97,
                'migration' => '2023_10_09_080000_create_account_statuses_table',
                'batch' => 1,
            ),
            97 => 
            array (
                'id' => 98,
                'migration' => '2023_10_09_083000_add_default_value_to_account_statuses_table',
                'batch' => 1,
            ),
            98 => 
            array (
                'id' => 99,
                'migration' => '2023_10_09_083028_create_accounts_table',
                'batch' => 1,
            ),
            99 => 
            array (
                'id' => 100,
                'migration' => '2023_10_09_084000_create_account_details_table',
                'batch' => 1,
            ),
            100 => 
            array (
                'id' => 101,
                'migration' => '2023_10_09_087000_create_account_detail_items_table',
                'batch' => 1,
            ),
            101 => 
            array (
                'id' => 102,
                'migration' => '2023_10_09_091000_create_business_price_statuses_table',
                'batch' => 1,
            ),
            102 => 
            array (
                'id' => 103,
                'migration' => '2023_10_09_091500_add_default_value_to_business_price_statuses_table',
                'batch' => 1,
            ),
            103 => 
            array (
                'id' => 104,
                'migration' => '2023_10_09_092000_create_business_price_types_table',
                'batch' => 1,
            ),
            104 => 
            array (
                'id' => 105,
                'migration' => '2023_10_09_092500_add_default_value_to_business_price_types_table',
                'batch' => 1,
            ),
            105 => 
            array (
                'id' => 106,
                'migration' => '2023_10_09_093000_create_business_prices_table',
                'batch' => 1,
            ),
            106 => 
            array (
                'id' => 107,
                'migration' => '2023_10_09_095000_create_business_price_details_table',
                'batch' => 1,
            ),
            107 => 
            array (
                'id' => 108,
                'migration' => '2023_10_09_097000_create_business_price_detail_wheels_table',
                'batch' => 1,
            ),
            108 => 
            array (
                'id' => 109,
                'migration' => '2023_10_09_099000_create_business_price_items_table',
                'batch' => 1,
            ),
            109 => 
            array (
                'id' => 110,
                'migration' => '2023_10_09_100000_create_business_price_item_details_table',
                'batch' => 1,
            ),
            110 => 
            array (
                'id' => 111,
                'migration' => '2023_10_09_110028_create_agents_table',
                'batch' => 1,
            ),
            111 => 
            array (
                'id' => 112,
                'migration' => '2023_10_09_140000_create_transporter_referrer_percents_table',
                'batch' => 1,
            ),
            112 => 
            array (
                'id' => 113,
                'migration' => '2023_10_09_150000_create_customer_referrer_percents_table',
                'batch' => 1,
            ),
            113 => 
            array (
                'id' => 114,
                'migration' => '2023_10_09_160428_create_redeem_ratios_table',
                'batch' => 1,
            ),
            114 => 
            array (
                'id' => 115,
                'migration' => '2023_10_09_160528_create_dividend_percents_table',
                'batch' => 1,
            ),
            115 => 
            array (
                'id' => 116,
                'migration' => '2023_10_09_160628_create_points_table',
                'batch' => 1,
            ),
            116 => 
            array (
                'id' => 117,
                'migration' => '2023_10_09_160728_create_dividend_points_table',
                'batch' => 1,
            ),
            117 => 
            array (
                'id' => 118,
                'migration' => '2023_10_09_160828_create_redeem_points_table',
                'batch' => 1,
            ),
            118 => 
            array (
                'id' => 119,
                'migration' => '2023_10_09_170000_create_transporter_referrers_table',
                'batch' => 1,
            ),
            119 => 
            array (
                'id' => 120,
                'migration' => '2023_10_09_173000_create_customer_referrers_table',
                'batch' => 1,
            ),
            120 => 
            array (
                'id' => 121,
                'migration' => '2023_10_09_190000_create_mission_progresses_table',
                'batch' => 1,
            ),
            121 => 
            array (
                'id' => 122,
                'migration' => '2023_10_09_193000_create_truck_missions_table',
                'batch' => 1,
            ),
            122 => 
            array (
                'id' => 123,
                'migration' => '2023_10_10_104740_create_notifications_table',
                'batch' => 1,
            ),
            123 => 
            array (
                'id' => 124,
                'migration' => '2023_10_18_090000_create_debits_table',
                'batch' => 1,
            ),
            124 => 
            array (
                'id' => 125,
                'migration' => '2023_10_23_090000_create_withdrawals_table',
                'batch' => 1,
            ),
            125 => 
            array (
                'id' => 126,
                'migration' => '2023_10_24_010000_create_transactions_table',
                'batch' => 1,
            ),
            126 => 
            array (
                'id' => 127,
                'migration' => '2023_11_17_090000_create_conversations_table',
                'batch' => 1,
            ),
            127 => 
            array (
                'id' => 128,
                'migration' => '2023_11_17_090001_create_conversationables_table',
                'batch' => 1,
            ),
            128 => 
            array (
                'id' => 129,
                'migration' => '2023_11_17_100000_create_histories_table',
                'batch' => 1,
            ),
            129 => 
            array (
                'id' => 130,
                'migration' => '2023_11_20_080000_create_bills_table',
                'batch' => 1,
            ),
            130 => 
            array (
                'id' => 131,
                'migration' => '2023_11_20_090000_add_default_bill_to_bills_table',
                'batch' => 1,
            ),
            131 => 
            array (
                'id' => 132,
                'migration' => '2023_11_24_010000_create_payments_table',
                'batch' => 1,
            ),
            132 => 
            array (
                'id' => 133,
                'migration' => '2023_11_24_020000_create_payment_statuses_table',
                'batch' => 1,
            ),
            133 => 
            array (
                'id' => 134,
                'migration' => '2023_11_24_030000_add_default_value_to_payment_statuses_table',
                'batch' => 1,
            ),
            134 => 
            array (
                'id' => 135,
                'migration' => '2023_11_24_050000_create_payment_details_table',
                'batch' => 1,
            ),
            135 => 
            array (
                'id' => 136,
                'migration' => '2023_11_24_100000_create_documents_table',
                'batch' => 1,
            ),
            136 => 
            array (
                'id' => 137,
                'migration' => '2023_12_18_010000_create_roles_table',
                'batch' => 1,
            ),
            137 => 
            array (
                'id' => 138,
                'migration' => '2023_12_18_020000_add_default_value_to_roles_table',
                'batch' => 1,
            ),
            138 => 
            array (
                'id' => 139,
                'migration' => '2023_12_18_090000_create_user_roles_table',
                'batch' => 1,
            ),
            139 => 
            array (
                'id' => 140,
                'migration' => '2023_12_19_120000_create_permissions_table',
                'batch' => 1,
            ),
            140 => 
            array (
                'id' => 141,
                'migration' => '2023_12_19_180000_create_role_permissions_table',
                'batch' => 1,
            ),
            141 => 
            array (
                'id' => 142,
                'migration' => '2024_01_03_100000_create_announcements_table',
                'batch' => 1,
            ),
            142 => 
            array (
                'id' => 143,
                'migration' => '2024_01_10_100000_create_tokens_table',
                'batch' => 1,
            ),
            143 => 
            array (
                'id' => 144,
                'migration' => '2024_01_12_104928_create_favourites_table',
                'batch' => 1,
            ),
            144 => 
            array (
                'id' => 145,
                'migration' => '2024_01_17_090000_create_transporter_fees_table',
                'batch' => 1,
            ),
            145 => 
            array (
                'id' => 146,
                'migration' => '2024_01_17_093000_create_transporter_fee_details_table',
                'batch' => 1,
            ),
            146 => 
            array (
                'id' => 147,
                'migration' => '2024_01_17_140000_create_coin_promotions_table',
                'batch' => 1,
            ),
            147 => 
            array (
                'id' => 148,
                'migration' => '2024_01_17_160000_create_coin_promotions_details_table',
                'batch' => 1,
            ),
            148 => 
            array (
                'id' => 149,
                'migration' => '2024_01_17_180000_create_coin_rates_table',
                'batch' => 1,
            ),
            149 => 
            array (
                'id' => 150,
                'migration' => '2024_01_17_200000_create_coin_rates_details_table',
                'batch' => 1,
            ),
            150 => 
            array (
                'id' => 151,
                'migration' => '2024_01_18_150000_create_events_table',
                'batch' => 1,
            ),
            151 => 
            array (
                'id' => 152,
                'migration' => '2024_02_19_090000_create_triggers_table',
                'batch' => 1,
            ),
            152 => 
            array (
                'id' => 153,
                'migration' => '2024_02_20_090000_create_announcement_triggers_table',
                'batch' => 1,
            ),
            153 => 
            array (
                'id' => 154,
                'migration' => '2024_02_21_090000_create_tasks_table',
                'batch' => 1,
            ),
            154 => 
            array (
                'id' => 155,
                'migration' => '2024_02_23_010001_add_remark_column_to_account_details_table',
                'batch' => 1,
            ),
            155 => 
            array (
                'id' => 156,
                'migration' => '2024_03_19_010000_add_remark_column_to_business_price_details_table',
                'batch' => 1,
            ),
            156 => 
            array (
                'id' => 157,
                'migration' => '2024_03_26_090000_create_routes_table',
                'batch' => 1,
            ),
            157 => 
            array (
                'id' => 158,
                'migration' => '2024_03_27_090000_create_purchases_table',
                'batch' => 1,
            ),
            158 => 
            array (
                'id' => 159,
                'migration' => '2024_03_28_090000_create_route_details_table',
                'batch' => 1,
            ),
            159 => 
            array (
                'id' => 160,
                'migration' => '2024_03_29_090000_create_transportation_fees_table',
                'batch' => 1,
            ),
            160 => 
            array (
                'id' => 161,
                'migration' => '2024_03_30_150000_create_prices_table',
                'batch' => 1,
            ),
            161 => 
            array (
                'id' => 162,
                'migration' => '2024_03_31_120000_create_zones_table',
                'batch' => 1,
            ),
            162 => 
            array (
                'id' => 163,
                'migration' => '2024_04_01_150000_create_price_items_table',
                'batch' => 1,
            ),
            163 => 
            array (
                'id' => 164,
                'migration' => '2024_04_03_090000_create_postcode_zones_table',
                'batch' => 1,
            ),
            164 => 
            array (
                'id' => 165,
                'migration' => '2024_04_04_090000_create_orders_table',
                'batch' => 1,
            ),
            165 => 
            array (
                'id' => 166,
                'migration' => '2024_04_05_200000_create_order_details_table',
                'batch' => 1,
            ),
            166 => 
            array (
                'id' => 167,
                'migration' => '2024_04_06_090000_create_order_amounts_table',
                'batch' => 1,
            ),
            167 => 
            array (
                'id' => 168,
                'migration' => '2024_04_07_090000_create_order_contacts_table',
                'batch' => 1,
            ),
            168 => 
            array (
                'id' => 169,
                'migration' => '2024_04_08_140000_create_jobs_table',
                'batch' => 1,
            ),
            169 => 
            array (
                'id' => 170,
                'migration' => '2024_04_09_140000_create_job_details_table',
                'batch' => 1,
            ),
            170 => 
            array (
                'id' => 171,
                'migration' => '2024_04_10_140000_create_trips_table',
                'batch' => 1,
            ),
            171 => 
            array (
                'id' => 172,
                'migration' => '2024_04_11_090000_create_trip_details_table',
                'batch' => 1,
            ),
            172 => 
            array (
                'id' => 173,
                'migration' => '2024_04_12_090000_create_trip_reasons_table',
                'batch' => 1,
            ),
            173 => 
            array (
                'id' => 174,
                'migration' => '2024_04_13_160000_create_trip_locations_table',
                'batch' => 1,
            ),
            174 => 
            array (
                'id' => 175,
                'migration' => '2024_04_14_100000_create_debit_surcharges_table',
                'batch' => 1,
            ),
            175 => 
            array (
                'id' => 176,
                'migration' => '2024_04_15_100000_create_delivery_orders_table',
                'batch' => 1,
            ),
            176 => 
            array (
                'id' => 177,
                'migration' => '2024_04_20_090000_create_business_price_orders_table',
                'batch' => 1,
            ),
            177 => 
            array (
                'id' => 178,
                'migration' => '2024_04_21_090000_create_business_price_orders_amounts_table',
                'batch' => 1,
            ),
            178 => 
            array (
                'id' => 179,
                'migration' => '2024_04_22_090000_create_business_price_purchases_table',
                'batch' => 1,
            ),
            179 => 
            array (
                'id' => 180,
                'migration' => '2024_04_30_090000_create_invoice_orders_table',
                'batch' => 1,
            ),
            180 => 
            array (
                'id' => 181,
                'migration' => '2024_06_13_145226_create_job_batches_table',
                'batch' => 1,
            ),
            181 => 
            array (
                'id' => 182,
                'migration' => '2024_06_13_150417_create_imports_table',
                'batch' => 1,
            ),
            182 => 
            array (
                'id' => 183,
                'migration' => '2024_06_13_150418_create_exports_table',
                'batch' => 1,
            ),
            183 => 
            array (
                'id' => 184,
                'migration' => '2024_06_13_150419_create_failed_import_rows_table',
                'batch' => 1,
            ),
            184 => 
            array (
                'id' => 185,
                'migration' => '2024_06_24_110000_add_version_and_device_info_columns_to_trip_details_table',
                'batch' => 1,
            ),
            185 => 
            array (
                'id' => 186,
                'migration' => '2024_06_25_100000_add_ip_address_columns_to_trip_details_table',
                'batch' => 1,
            ),
            186 => 
            array (
                'id' => 187,
                'migration' => '2024_06_27_090000_add_color_column_to_trip_statuses_table',
                'batch' => 1,
            ),
            187 => 
            array (
                'id' => 188,
                'migration' => '2024_06_27_100000_add_status_and_driver_id_columns_to_trips_table',
                'batch' => 1,
            ),
            188 => 
            array (
                'id' => 189,
                'migration' => '2024_06_27_210000_add_user_id_column_to_referrers_table',
                'batch' => 1,
            ),
            189 => 
            array (
                'id' => 190,
                'migration' => '2024_07_03_120000_add_state_column_to_zones_table',
                'batch' => 1,
            ),
            190 => 
            array (
                'id' => 191,
                'migration' => '2024_07_04_150000_add_deleted_at_column_to_zones_table',
                'batch' => 1,
            ),
            191 => 
            array (
                'id' => 192,
                'migration' => '2024_07_18_000000_add_id_and_phone_columns_to_contact_us_table',
                'batch' => 1,
            ),
            192 => 
            array (
                'id' => 193,
                'migration' => '2024_07_18_000100_drop_rating_columns_in_feedbacks_table',
                'batch' => 1,
            ),
            193 => 
            array (
                'id' => 194,
                'migration' => '2024_07_18_000200_add_phone_column_to_feedbacks_table',
                'batch' => 1,
            ),
            194 => 
            array (
                'id' => 195,
                'migration' => '2024_07_18_000300_create_reviews_table',
                'batch' => 1,
            ),
            195 => 
            array (
                'id' => 196,
                'migration' => '2024_07_18_000400_add_phone_and_rating_columns_to_reviews_table',
                'batch' => 1,
            ),
            196 => 
            array (
                'id' => 197,
                'migration' => '2024_07_18_000500_drop_feedback_column_in_feedbacks_table',
                'batch' => 1,
            ),
            197 => 
            array (
                'id' => 198,
                'migration' => '2024_07_18_000600_add_content_column_to_feedbacks_table',
                'batch' => 1,
            ),
            198 => 
            array (
                'id' => 199,
                'migration' => '2024_07_18_000700_add_approve_column_to_reviews_table',
                'batch' => 1,
            ),
            199 => 
            array (
                'id' => 200,
                'migration' => '2024_07_26_104800_add_address_id_column_to_user_table',
                'batch' => 1,
            ),
            200 => 
            array (
                'id' => 201,
                'migration' => '2024_07_30_090000_create_employees_table',
                'batch' => 1,
            ),
            201 => 
            array (
                'id' => 202,
                'migration' => '2024_07_30_130000_create_customers_table',
                'batch' => 1,
            ),
            202 => 
            array (
                'id' => 203,
                'migration' => '2024_07_30_133000_create_users_customers_table',
                'batch' => 1,
            ),
            203 => 
            array (
                'id' => 204,
                'migration' => '2024_07_30_134000_create_users_drivers_table',
                'batch' => 1,
            ),
            204 => 
            array (
                'id' => 205,
                'migration' => '2024_07_30_135000_create_users_transporters_table',
                'batch' => 1,
            ),
            205 => 
            array (
                'id' => 206,
                'migration' => '2024_07_30_140000_create_users_employees_table',
                'batch' => 1,
            ),
        ));
        
        
    }
}