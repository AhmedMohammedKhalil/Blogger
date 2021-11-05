<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class PostFollowerNotification  implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public $follower_id;
    public $user;
    public $post_id;
    public $type;    //post_followers
    public $n_id;

    public function __construct($data=[])
    {
        $this->follower_id=$data['follower_id'];
        $this->user=$data['user'];
        $this->post_id=$data['post_id'];
        $this->type=$data['type'];
        $this->n_id=$data['n_id'];

    
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
            return new Channel('post-follower-'.$this->follower_id);   //follow-id
      
    }
    public function broadcastAs()
    {
        return 'postFollowers'; 
    }
}
