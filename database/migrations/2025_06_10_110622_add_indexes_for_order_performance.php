<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIndexesForOrderPerformance extends Migration
{
    public function up(): void
    {
        // orders
        Schema::table('orders', function (Blueprint $table) {
            $table->index('user_id');
            $table->index('status');
            $table->index(['user_id', 'status'], 'idx_orders_user_status');
        });

        // order_details
        Schema::table('order_details', function (Blueprint $table) {
            $table->index('order_id');
            $table->index(['order_id', 'created_at', 'id'], 'idx_order_details_order_created_id');
        });

        // jobs
        Schema::table('jobs', function (Blueprint $table) {
            $table->index('order_id');
        });

        // job_details
        Schema::table('job_details', function (Blueprint $table) {
            $table->index('job_id');
            $table->index(['job_id', 'created_at', 'id'], 'idx_job_details_job_created_id');
        });

        // trips
        Schema::table('trips', function (Blueprint $table) {
            $table->index('job_id');
            $table->index(['job_id', 'status'], 'idx_trips_job_status');
        });

        // users (usually id is already a PK, but safe fallback)
        Schema::table('users', function (Blueprint $table) {
            $table->index('id');
        });

        // address_details
        Schema::table('address_details', function (Blueprint $table) {
            $table->index('address_id');
            $table->index(['address_id', 'created_at', 'id'], 'idx_address_details_created');
        });

        // product_images
        Schema::table('product_images', function (Blueprint $table) {
            $table->index(['product_id', 'featured'], 'idx_product_images_product_featured');
        });

        // order_delegations
        Schema::table('order_delegations', function (Blueprint $table) {
            $table->index('order_detail_id');
        });

        // products
        Schema::table('products', function (Blueprint $table) {
            $table->index('product_category_id');
        });

        // product_categories
        Schema::table('product_categories', function (Blueprint $table) {
            $table->index('id');
        });
    }

    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropIndex(['user_id']);
            $table->dropIndex(['status']);
            $table->dropIndex('idx_orders_user_status');
        });

        Schema::table('order_details', function (Blueprint $table) {
            $table->dropIndex(['order_id']);
            $table->dropIndex('idx_order_details_order_created_id');
        });

        Schema::table('jobs', function (Blueprint $table) {
            $table->dropIndex(['order_id']);
        });

        Schema::table('job_details', function (Blueprint $table) {
            $table->dropIndex(['job_id']);
            $table->dropIndex('idx_job_details_job_created_id');
        });

        Schema::table('trips', function (Blueprint $table) {
            $table->dropIndex(['job_id']);
            $table->dropIndex('idx_trips_job_status');
        });

        Schema::table('users', function (Blueprint $table) {
            $table->dropIndex(['id']);
        });

        Schema::table('address_details', function (Blueprint $table) {
            $table->dropIndex(['address_id']);
            $table->dropIndex('idx_address_details_created');
        });

        Schema::table('product_images', function (Blueprint $table) {
            $table->dropIndex('idx_product_images_product_featured');
        });

        Schema::table('order_delegations', function (Blueprint $table) {
            $table->dropIndex(['order_detail_id']);
        });

        Schema::table('products', function (Blueprint $table) {
            $table->dropIndex(['product_category_id']);
        });

        Schema::table('product_categories', function (Blueprint $table) {
            $table->dropIndex(['id']);
        });
    }
}
