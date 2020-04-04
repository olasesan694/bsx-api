<?php

namespace App\Events;

use App\Message;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast; // interface

class NewMessage implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    // set the message as a public property of this class os we can use it down there
    public $message;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Message $message)
    {
        //
        $this->message = $message;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        // only the user that we are sending the message to is only going to listen on this channel.
        return new PrivateChannel('messages.' . $this->message->to);
    }

    // validate each user that wants to join this PRIVATE channel will need to 
    // send their user id and we will validate if they are authorized to use this channel
    public function broadcastWith()
    {
        return ["message" => $this->message]; // Adds a key of message | Added to our event and sent as data to our component.
    }

    // public function broadcastAs()
    // {
    //     return 'NewMessage';
    // }
}
