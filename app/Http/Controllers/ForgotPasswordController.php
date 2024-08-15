<?php

namespace App\Http\Controllers;

use App\Mail\ResetPasswordMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class ForgotPasswordController extends Controller
{
    public function show()
    {
        return view('auth.reset_password');
    }
    public function sendResetLinkEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $email = $request->input('email');
        $user = User::where('email', $email)->first();

        if (!$user) {
            return back()->withErrors(['email' => 'We can\'t find a user with that email address.']);
        }

        $resetPassword = Str::random(8);

        // Update user with a new default password
        $user->password = Hash::make($resetPassword);
        $user->save();

        Mail::to($user->email)->send(new ResetPasswordMail($resetPassword));

        return redirect()->route('login.index')->with('success', 'We have emailed your password reset instructions!');
    }
}
