<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\ScoreUpdated;  // Import the ScoreUpdated event

class GameController extends Controller
{
    //
        // This is the method that will handle the score update
        public function updateScore(Request $request)
        {
            // Validate the incoming request data
            $request->validate([
                'teamA_score' => 'required|integer',
                'teamB_score' => 'required|integer',
            ]);
    
            // Broadcast the score update event
            broadcast(new ScoreUpdated($request->teamA_score, $request->teamB_score));
    
            // Return a response (optional)
        // Return the updated scores in the response
        return response()->json([
            'message' => 'Score updated successfully',
            'teamA_score' => $request->teamA_score,
            'teamB_score' => $request->teamB_score,
        ]);
        }
}
