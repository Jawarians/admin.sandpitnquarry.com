<?php

namespace App\Events;

use App\Models\Job;
use App\Models\Order;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class JobUpdated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * The order instance.
     *
     * @var \App\Models\Job
     */
    public $job;

    /**
     * Create a new event instance.
     */
    public function __construct($job)
    {
        $order = Order::orderEvent()
            ->find($job->order_id);
        OrderUpdated::dispatch($order);

        $database = app('firebase.database');

        $_job = Job::jobEvent()
            ->find($job->id);

        $database->getReference('jobs/' . $job->id)
            ->set($_job);
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('channel-name'),
        ];
    }
}
