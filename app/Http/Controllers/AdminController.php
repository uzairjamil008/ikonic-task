<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function usersData()
    {
        $users = User::get();
        return view("users.user_data", compact('users'));
    }
    public function destroy($id)
    {
        $users = User::find($id)->delete();
        return redirect()->back()->with('message', 'User Deleted Successfully!');
    }

    public function edit($id)
    {
        $users = User::find($id);
        return view("users.edit", compact('users'));
    }

    public function update(Request $request)
    {
        $data = User::find($request->id);
        $data->role = $request->role;
        $data->update();
        return redirect('user_data')->with('message', 'Role Updated Successfully!');
    }

    public function feedbackList()
    {
        $feedbacks = Feedback::get();
        return view("feedback.feedback_list", compact('feedbacks'));
    }
    public function updateStatus(Request $request)
    {
        $feedbackId = $request->feedback_id;
        $isEnable = $request->input('is_enable');
        $feedback = Feedback::find($feedbackId);
        if ($feedback) {
            $feedback->update(['is_enable' => $isEnable]);
        }
        return redirect()->back()->with('message', 'Comments Status Updated Successfully!');

    }
}
