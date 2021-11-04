<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class FollowingNotification  implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public $following_id;
    public $user;
    public $type;    //follow_request
    public $created_at;
    
    public function __construct($data=[])
    {
        $this->following_id=$data['following_id'];
        $this->user=$data['user'];
        $this->type=$data['type'];
        $this->created_at=$data['created_at'];
    
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('follow-'.$this->following_id);   //follow-id
    }
    public function broadcastAs()
    {
        return 'userFollow'; 
    }
}
