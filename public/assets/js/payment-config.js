/**
 * Secure Payment Gateway Configuration Handler
 * 
 * This file handles payment gateway configurations securely by:
 * 1. Fetching configuration from backend API
 * 2. Only exposing public keys to frontend
 * 3. Hiding sensitive credentials
 */

class PaymentGatewayConfig {
    constructor() {
        this.config = null;
        this.isLoaded = false;
    }

    /**
     * Load configuration from backend API
     */
    async loadConfig() {
        try {
            const response = await fetch('/settings/payment-config');
            
            if (!response.ok) {
                throw new Error('Failed to load payment configuration');
            }
            
            this.config = await response.json();
            this.isLoaded = true;
            
            return this.config;
        } catch (error) {
            console.error('Error loading payment configuration:', error);
            throw error;
        }
    }

    /**
     * Get PayPal configuration (public keys only)
     */
    getPayPalConfig() {
        if (!this.isLoaded) {
            throw new Error('Configuration not loaded. Call loadConfig() first.');
        }
        
        return this.config.payment_gateways.paypal;
    }

    /**
     * Get RazorPay configuration (public keys only)
     */
    getRazorPayConfig() {
        if (!this.isLoaded) {
            throw new Error('Configuration not loaded. Call loadConfig() first.');
        }
        
        return this.config.payment_gateways.razorpay;
    }

    /**
     * Get Firebase configuration (public keys only)
     */
    getFirebaseConfig() {
        if (!this.isLoaded) {
            throw new Error('Configuration not loaded. Call loadConfig() first.');
        }
        
        return this.config.firebase;
    }

    /**
     * Initialize PayPal SDK with secure configuration
     */
    async initializePayPal() {
        const paypalConfig = this.getPayPalConfig();
        
        if (!paypalConfig.client_id) {
            throw new Error('PayPal client ID not configured');
        }

        // Initialize PayPal SDK (example)
        return window.paypal.Buttons({
            createOrder: function(data, actions) {
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: '10.00',
                            currency_code: paypalConfig.currency
                        }
                    }]
                });
            },
            onApprove: function(data, actions) {
                return actions.order.capture().then(function(details) {
                    console.log('Transaction completed by ' + details.payer.name.given_name);
                });
            }
        });
    }

    /**
     * Initialize RazorPay with secure configuration
     */
    async initializeRazorPay(amount, orderId) {
        const razorpayConfig = this.getRazorPayConfig();
        
        if (!razorpayConfig.key_id) {
            throw new Error('RazorPay key ID not configured');
        }

        const options = {
            key: razorpayConfig.key_id,
            amount: amount * 100, // Amount in paise
            currency: razorpayConfig.currency,
            order_id: orderId,
            name: 'Your Company Name',
            description: 'Payment Description',
            handler: function(response) {
                console.log('Payment successful:', response);
                // Handle successful payment
            },
            prefill: {
                name: 'Customer Name',
                email: 'customer@example.com',
                contact: '9999999999'
            },
            theme: {
                color: '#3399cc'
            }
        };

        const rzp = new Razorpay(options);
        return rzp;
    }

    /**
     * Initialize Firebase with secure configuration
     */
    async initializeFirebase() {
        const firebaseConfig = this.getFirebaseConfig();
        
        const config = {
            apiKey: firebaseConfig.api_key,
            authDomain: firebaseConfig.auth_domain,
            projectId: firebaseConfig.project_id,
            storageBucket: firebaseConfig.storage_bucket,
            messagingSenderId: firebaseConfig.messaging_sender_id,
            appId: firebaseConfig.app_id
        };

        // Initialize Firebase
        if (typeof firebase !== 'undefined') {
            firebase.initializeApp(config);
            
            // Initialize messaging if vapid key is available
            if (firebaseConfig.vapid_key && firebase.messaging.isSupported()) {
                const messaging = firebase.messaging();
                
                // Set VAPID key
                messaging.usePublicVapidKey(firebaseConfig.vapid_key);
                
                return messaging;
            }
        }
        
        return null;
    }
}

// Export for use
window.PaymentGatewayConfig = PaymentGatewayConfig;

// Usage example:
/*
const paymentConfig = new PaymentGatewayConfig();

// Load configuration when page loads
document.addEventListener('DOMContentLoaded', async function() {
    try {
        await paymentConfig.loadConfig();
        console.log('Payment configuration loaded successfully');
        
        // Initialize payment gateways
        // const paypal = await paymentConfig.initializePayPal();
        // const firebase = await paymentConfig.initializeFirebase();
        
    } catch (error) {
        console.error('Failed to initialize payment configuration:', error);
    }
});
*/