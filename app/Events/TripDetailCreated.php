<?php

namespace App\Events;

use App\Models\Job;
use App\Models\Trip;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class TripDetailCreated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * The order instance.
     *
     * @var \App\Models\TripDetail
     */
    public $trip_detail;

    /**
     * Create a new event instance.
     */
    public function __construct($trip_detail)
    {
        $this->trip_detail = $trip_detail;

        $_job = Job::jobEvent()
            ->find($trip_detail->trip->job_id);
        JobUpdated::dispatch($_job);

        $database = app('firebase.database');

        $_trip = Trip::tripEvent()
            ->find($trip_detail->trip_id);
        $_trip->driver_id = $_trip->latest->assignment->driver_id;
        $_trip->status = $_trip->latest->status;
        $_trip->save();
        $_trip->status_driver = $_trip->latest->status . '_' . $_trip->latest->assignment->driver_id;

        $database->getReference('trips/' . $trip_detail->trip_id)
            ->set($_trip);
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
