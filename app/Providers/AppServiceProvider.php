<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Register morph map to ensure consistent model resolution
        // Map the string 'transportation' directly to TransportationFee model
        Relation::morphMap([
            'transportation' => \App\Models\TransportationFee::class,
        ]);
    }
}
