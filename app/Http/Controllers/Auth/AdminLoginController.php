<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    protected $redirectTo = '/admin/dashboard';

    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }

    public function showLoginForm()
    {
        return view('auth.admin-login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => ['required','email'],
            'password' => ['required'],
        ]);

        if (Auth::guard('admin')->attempt($request->only('email', 'password'), $request->filled('remember'))) {
            $request->session()->regenerate();
            return redirect()->intended($this->redirectTo);
        }

        return back()->withErrors(['email' => 'Invalid Credentials'])->withInput($request->only('email'));
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        return redirect('/admin/login');
    }

    // public function showLoginForm() {
    //     return view('admin.auth.login');
    // }

    // public function login(Request $request) {
    //     if (Auth::guard('admin')->attempt($request->only('email', 'password'))) {
    //         return redirect()->route('admin.dashboard');
    //     }
    //     return back()->withErrors(['email' => 'Invalid Credentials']);
    // }
}
