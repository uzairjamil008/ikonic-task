<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use App\Models\Vote;

class VoteController extends Controller
{
    public function vote(Feedback $feedback)
    {
        $user = auth()->user()->id;
        $existingVote = Vote::where('feedback_id', $feedback->id)
            ->where('user_id', $user)
            ->where('vote', 1)
            ->first();
        if (!$existingVote) {
            $vote = new Vote;
            $vote->feedback_id = $feedback->id;
            $vote->user_id = $user;
            $vote->vote = 1;
            $vote->save();
            return redirect()->back()->with('message', 'Vote Added Successfully!');
        }

        return redirect()->back()->with('message', 'You have already Voted this feedback.');
    }
}
