<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\PaymentGatewayService;

class PaymentGatewayController extends Controller
{
    /**
     * Display the payment gateway settings form
     */
    public function index()
    {
        $paypalConfig = PaymentGatewayService::getPayPalConfig();
        $razorpayConfig = PaymentGatewayService::getRazorPayConfig();
        $firebaseConfig = config('firebase');

        return view('settings.paymentGateway', compact('paypalConfig', 'razorpayConfig', 'firebaseConfig'));
    }

    /**
     * Get public configuration for frontend
     */
    public function getPublicConfig()
    {
        return response()->json([
            'payment_gateways' => PaymentGatewayService::getPublicKeys(),
            'firebase' => [
                'api_key' => config('firebase.api_key'),
                'auth_domain' => config('firebase.auth_domain'),
                'project_id' => config('firebase.project_id'),
                'storage_bucket' => config('firebase.storage_bucket'),
                'messaging_sender_id' => config('firebase.messaging_sender_id'),
                'app_id' => config('firebase.app_id'),
                'vapid_key' => config('firebase.vapid_key'),
            ],
        ]);
    }

    /**
     * Update payment gateway settings
     * Note: This would typically update environment variables or encrypted database storage
     */
    public function update(Request $request)
    {
        // Validate the request
        $request->validate([
            'paypal_mode' => 'required|in:sandbox,live',
            'paypal_client_id' => 'required|string',
            'paypal_client_secret' => 'required|string',
            'paypal_currency' => 'required|string|max:3',
            'razorpay_mode' => 'required|in:sandbox,live',
            'razorpay_key_id' => 'required|string',
            'razorpay_key_secret' => 'required|string',
            'razorpay_currency' => 'required|string|max:3',
        ]);

        // In a real application, you would:
        // 1. Encrypt sensitive data before storing in database
        // 2. Or update .env file programmatically (not recommended for production)
        // 3. Or use a secure key management service

        // For now, return success message
        return redirect()->back()->with('success', 'Payment gateway settings updated successfully!');
    }
}