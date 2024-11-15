<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ScoreUpdated
{

    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $teamA_score;
    public $teamB_score;

    // Constructor to pass the data to broadcast
    public function __construct($teamA_score, $teamB_score)
    {
        $this->teamA_score = $teamA_score;
        $this->teamB_score = $teamB_score;
    }


    /**
     * Get the channels the event should broadcast on. PrivateChannel means that it req
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('scoreboard');
    }
        // Customizes the event name on the front-end as score-updated
        public function broadcastAs()
        {
            return 'score-updated';
        }
}
