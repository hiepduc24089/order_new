<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
    public function show()
    {
        return view('auth.change_password');
    }

    public function update(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|string|min:8|confirmed',
        ]);

        $user = Auth::user();

        $passwordMatch = Hash::check($request->current_password, $user->password);
        $OldPasswordMatch = $request->current_password === $user->password;

        if (!$passwordMatch && !$OldPasswordMatch) {
            return back()->withErrors(['current_password' => 'Your current password is wrong.']);
        }

        $user->password = Hash::make($request->new_password);

        $user->save();

        session()->flash('success', 'Your password has been changed successfully.');

        return redirect()->route('home.index');
    }
}
