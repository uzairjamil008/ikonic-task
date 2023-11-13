<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Feedback;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $feedbackId = $request->feedback_id;
        $comment = new Comment();
        $comment->username = auth()->user()->name;
        $comment->date = Carbon::now();
        $comment->content = $request->input('content');
        $comment->feedback_id = $feedbackId;
        $comment->save();
        return redirect()->back()->with('message', 'Comment Added Successfully!');
    }

    public function viewComments(Feedback $feedback)
    {
        $comments = Comment::where('feedback_id', $feedback->id)->get();
        return view("comments.viewcomments", compact('comments', 'feedback'));
    }
}
