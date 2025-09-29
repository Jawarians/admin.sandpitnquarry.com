<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Log;
use Kreait\Firebase\Factory;
use Kreait\Firebase\Auth;

class FirebaseServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Register Firebase services
        $this->app->singleton('firebase.auth', function ($app) {
            try {
                // Create service account credentials array from environment variables
                $serviceAccount = [
                    'type' => 'service_account',
                    'project_id' => env('FIREBASE_PROJECT_ID'),
                    'private_key_id' => env('FIREBASE_PRIVATE_KEY_ID'),
                    'private_key' => env('FIREBASE_PRIVATE_KEY'),
                    'client_email' => env('FIREBASE_CLIENT_EMAIL'),
                    'client_id' => env('FIREBASE_CLIENT_ID'),
                    'auth_uri' => 'https://accounts.google.com/o/oauth2/auth',
                    'token_uri' => 'https://oauth2.googleapis.com/token',
                    'auth_provider_x509_cert_url' => 'https://www.googleapis.com/oauth2/v1/certs',
                    'client_x509_cert_url' => env('FIREBASE_CLIENT_X509_CERT_URL'),
                    'universe_domain' => 'googleapis.com',
                ];
                
                // Alternative: use base64 encoded credentials if available
                if (env('FIREBASE_CREDENTIALS_BASE64')) {
                    $decoded = base64_decode(env('FIREBASE_CREDENTIALS_BASE64'));
                    if ($decoded) {
                        $serviceAccount = json_decode($decoded, true);
                    }
                }
                
                $firebase = (new Factory)
                    ->withServiceAccount($serviceAccount)
                    ->withDatabaseUri(env('FIREBASE_DATABASE_URL'));
                
                return $firebase->createAuth();
            } catch (\Exception $e) {
                // Log the error but don't crash the application
                Log::warning('Firebase Auth initialization error: ' . $e->getMessage());
                
                return new class {
                    public function __call($method, $args)
                    {
                        // Log the method call for debugging
                        Log::warning('Firebase Auth method called but not initialized: ' . $method);
                        return null;
                    }
                };
            }
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
