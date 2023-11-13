<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use App\Models\User;
use App\Models\Vote;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function feedback()
    {
        $feedbacks = Feedback::get();
        $feedbacks->each(function ($feedback) {
            $feedback->voteCount = Vote::where('feedback_id', $feedback->id)->distinct('user_id')->count('user_id');
        });
        return view("feedback.feedback", compact('feedbacks'));
    }

    public function store(Request $request)
    {
        $user = auth()->user();
        $feedback = new Feedback();
        $feedback->title = $request->input('title');
        $feedback->description = $request->input('description');
        $feedback->category = $request->input('category');
        $feedback->user_id = $user->id;
        $feedback->save();
        return redirect()->back()->with('message', 'Data Added Successfully!');
    }
}
