<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => ['required','email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($request->only('email', 'password'), $request->filled('remember'))) {
            $request->session()->regenerate();
            return redirect()->intended($this->redirectTo);
        }

        return back()->withErrors(['email' => 'Invalid Credentials'])->withInput($request->only('email'));
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }

    // public function showLoginForm() {
    //     return view('user.auth.login');
    // }

    // public function login(Request $request) {
    //     if (Auth::guard('admin')->attempt($request->only('email', 'password'))) {
    //         return redirect()->route('user.dashboard');
    //     }
    //     return back()->withErrors(['email' => 'Invalid Credentials']);
    // }
}
