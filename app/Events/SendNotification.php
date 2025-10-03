<?php

namespace App\Events;

use App\Models\CustomerNotification;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class SendNotification implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $notification;

    public function __construct(CustomerNotification $notification)
    {
        $this->notification = $notification;
    }

    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('user-channel.' . $this->notification->receiver_id)
        ];
    }

    public function broadcastWith(): array
    {
        return [
            'notification_type' => $this->notification->notification_type,
            'title' => $this->notification->title,
            'description' => $this->notification->description,
            'image_url' => $this->notification->image_url ?? null,
            'cta_link' => $this->notification->cta_link ?? null,
            'cta_text' => $this->notification->cta_text ?? null,
        ];
    }
}
