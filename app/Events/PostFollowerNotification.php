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
    public $followers_ids;
    public $user_id;
    public $post;
    public $type;    //post_followers
    public $created_at;
    
    public function __construct($data=[])
    {
        $this->followers_ids=$data['followers_ids'];
        $this->user_id=$data['user_id'];
        $this->post=$data['post'];
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
        foreach ($this->followers_ids as $f) {
            return new Channel('follow-'.$f);   //follow-id
        }
      
    }
    public function broadcastAs()
    {
        return 'postFollowers'; 
    }
}
