<?php

namespace App\Services;

class PaymentGatewayService
{
    /**
     * Get PayPal configuration based on current mode
     */
    public static function getPayPalConfig()
    {
        $mode = config('payment.paypal.mode');
        $config = config("payment.paypal.{$mode}");
        
        return [
            'mode' => $mode,
            'client_id' => $config['client_id'],
            'client_secret' => $config['client_secret'],
            'currency' => config('payment.paypal.currency'),
            'settings' => config('payment.paypal.settings'),
        ];
    }

    /**
     * Get RazorPay configuration based on current mode
     */
    public static function getRazorPayConfig()
    {
        $mode = config('payment.razorpay.mode');
        $config = config("payment.razorpay.{$mode}");
        
        return [
            'mode' => $mode,
            'key_id' => $config['key_id'],
            'key_secret' => $config['key_secret'],
            'currency' => config('payment.razorpay.currency'),
        ];
    }

    /**
     * Get public keys only (safe for frontend)
     */
    public static function getPublicKeys()
    {
        $paypal = self::getPayPalConfig();
        $razorpay = self::getRazorPayConfig();

        return [
            'paypal' => [
                'mode' => $paypal['mode'],
                'client_id' => $paypal['client_id'], // Client ID is safe to expose
                'currency' => $paypal['currency'],
            ],
            'razorpay' => [
                'mode' => $razorpay['mode'],
                'key_id' => $razorpay['key_id'], // Key ID is safe to expose
                'currency' => $razorpay['currency'],
            ],
        ];
    }

    /**
     * Check if gateway is enabled and properly configured
     */
    public static function isPayPalEnabled()
    {
        $config = self::getPayPalConfig();
        return !empty($config['client_id']) && !empty($config['client_secret']);
    }

    public static function isRazorPayEnabled()
    {
        $config = self::getRazorPayConfig();
        return !empty($config['key_id']) && !empty($config['key_secret']);
    }
}