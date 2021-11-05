<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class PostNotification implements ShouldBroadcast
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
    public $type;    //reaction
    public $n_id;
    
    public function __construct($data=[])
    {
      $this->owner_id=$data['owner_id'];
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
        return new Channel('post-react-'.$this->owner_id);    //postOwner
    }
    public function broadcastAs()
    {
        return 'postReact';
    }
}
