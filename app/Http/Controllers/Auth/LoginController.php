<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function registration()
    {
        return view("auth.registration");
    }

    public function login()
    {
        return view("auth.login");
    }

    public function adminDashboard()
    {

        if (auth()->check()) {
            $user = auth()->user();
            return view("admin_dashboard", compact('user'));
        } else {
            return redirect('login');
        }
    }

    public function signUp(Request $request)
    {
        $existingUser = User::where('email', $request->input('email'))->first();

        if ($existingUser) {
            return back()->with('fail', 'This email is already in use. Please use another email address.');
        }

        $user = new User();
        $user->role = 'User';
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $result = $user->save();

        if ($result) {
            return back()->with('success', 'Your registration is successfully completed!');
        } else {
            return back()->with('fail', 'Registration failed. Please try again.');
        }
    }

    public function userLogin(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->with('fail', 'This Email is Not Registered!');
        }

        if (Hash::check($request->password, $user->password)) {
            auth()->login($user);
            // Check the user's role and redirect accordingly
            if ($user->role == 'Admin' || $user->role == 'Super Admin') {
                return redirect('admin_dashboard');
            } else {
                return redirect('dashboard');
            }
        } else {
            return back()->with('fail', 'Your Password is Not Matched!');
        }
    }

    public function dashboard()
    {
        if (auth()->check()) {
            $user = auth()->user();
            return view("dashboard", compact('user'));
        } else {
            return redirect('login');
        }
    }

    public function logout()
    {
        auth()->logout();
        return redirect('login');
    }
}
