<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View; 
use App\Models\Price;
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
         if (env('APP_ENV') === 'production') {
        URL::forceScheme('https');
    }
        // Register morph map to ensure consistent model resolution
        // Map the string 'transportation' directly to TransportationFee model
        Schema::defaultStringLength(191); 
        Relation::enforceMorphMap([
            'account' => 'App\Models\Account',
            'account_details' => 'App\Models\AccountDetail',
            'bonus' => 'App\Models\Bonus',
            'business' => 'App\Models\BusinessPriceItemDetail',
            'business_price' => 'App\Models\BusinessPrice',
            'button' => 'App\Models\WhatsAppButton',
            'code' => 'App\Models\Code',
            'coin_refund' => 'App\Models\CoinRefund',            
            'customer' => 'App\Models\Customer',
            'customer_account'=> 'App\Models\CustomerAccount',
            'claim' => 'App\Models\Claim',
            'customer_referrer' => 'App\Models\CustomerReferrer',
            'driver' => 'App\Models\Driver',
            'employee' => 'App\Models\Employee',
            'image' => 'App\Models\WhatsAppImage',
            'invoice' => 'App\Models\Invoice',
            'job' => 'App\Models\Job',
            'material' => 'App\Models\BusinessPriceItemDetail',
            'message' => 'App\Models\WhatsAppMessage',
            'order' => 'App\Models\Order',
            'payment' => 'App\Models\Payment',
            'purchase' => 'App\Models\Purchase',
            'reaction' => 'App\Models\WhatsAppReaction',
            'refund' => 'App\Models\Transaction',
            'rejection' => 'App\Models\TripRejectionReason',
            'reload' => 'App\Models\Reload',
            'retail' => 'App\Models\RetailPrice',
            'route' => 'App\Models\RouteDetail',
            'service_charge' => 'App\Models\ServiceCharge', 
            'site' => 'App\Models\Site',
            'sticker' => 'App\Models\WhatsAppSticker',
            'surcharge' => 'App\Models\Surcharge',
            'termination' => 'App\Models\TripTerminationReason',
            'text' => 'App\Models\WhatsAppText',
            'tonnage' => 'App\Models\TonnageProductPrice',
            'transaction' => 'App\Models\Transaction',
            'transportation' => 'App\Models\TransportationFee',
            'transporter' => 'App\Models\Transporter',
            'transporter_referrer' => 'App\Models\TransporterReferrer',
            'trip' => 'App\Models\Trip',
            'trip_detail' => 'App\Models\TripDetail',
            'truck' => 'App\Models\Truck',
            'user' => 'App\Models\User',
            'video' => 'App\Models\WhatsAppVideo',
            'wheel_price' => 'App\Models\WheelPrice',
            'withdrawal' => 'App\Models\Withdrawal',
            'zone' => 'App\Models\Zone',
            'tonne_refund' => 'App\Models\TonneRefund',
            'waiting_charges' => 'App\Models\WaitingCharges',
        ]);
         // make $prices available to the sidebar view
        View::composer('components.sidebar', function ($view) {
            $view->with('prices', Price::orderBy('name')->get());
        });
    }
}
