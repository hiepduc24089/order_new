<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'phone' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('phone', 'password');
        $remember = $request->filled('remember_me');

        if (Auth::attempt($credentials, $remember)) {
            return redirect()->intended(route('home.index'));
        }

        session()->flash('error', 'Số Điện Thoại hoặc Mật Khẩu không đúng');

        return back()->withErrors([
            'username' => 'Số Điện Thoại hoặc Mật Khẩu không đúng',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }

    public function error()
    {
        $code = request()->code;
        $errors = config('error.'. $code);

        return view('error', compact('errors'));
    }
}
