<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class CommantNotification implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public $owner_id;
    public $post_id;
    public $user;
    public $type;    //comment
    public $created_at;
    
    public function __construct($data=[])
    {
        $this->owner_id=$data['owner_id'];
        $this->post_id=$data['post_id'];
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
        return new Channel('post-comment-'.$this->owner_id);   //comment-id owner
    }
    public function broadcastAs()
    {
        return 'postComment';
    }
}
