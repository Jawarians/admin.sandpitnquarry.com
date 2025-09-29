<?php

namespace App\Traits;

use Illuminate\Support\Facades\Log;

trait PushNotification
{
    /**
     * Send a push notification. This is a lightweight stub used in the admin UI
     * to avoid fatal errors when the real push service is not available in dev.
     *
     * @param string|null $deviceToken
     * @param string $title
     * @param string $body
     * @param array $data
     * @return bool
     */
    public static function sendNotification($deviceToken, string $title, string $body, array $data = []): bool
    {
        try {
            // In production this would call FCM/APNs. For now just log the payload.
            Log::info('PushNotification.send', [
                'device_token' => $deviceToken,
                'title' => $title,
                'body' => $body,
                'data' => $data,
            ]);
            return true;
        } catch (\Throwable $e) {
            // Never break the application flow because push failed in dev.
            Log::error('PushNotification.send.failed', ['error' => $e->getMessage()]);
            return false;
        }
    }
}
