<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

public function login(Request $request)
{
    $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required']
    ]);

    $credentials = $request->only('email', 'password');

  if (Auth::attempt($credentials)) {
        $user = Auth::user();
        $role = $user->roles->pluck('name')->first();

        return match ($role) {
            'SuperAdmin' => redirect()->route('superadmin.dashboard'),
            'Admin' => redirect()->route('admin.dashboard'),
            'Member' => redirect()->route('member.dashboard'),
            default => redirect()->route('login')->with('error', 'Unauthorized role.'),
        };
    }


    return back()->withErrors([
        'email' => 'Invalid credentials.',
    ])->onlyInput('email');
}



    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
