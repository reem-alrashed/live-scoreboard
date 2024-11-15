<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
            return response()->json([
                'message' => 'Score updated successfully',
            ]);
        }
}
