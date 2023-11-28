<?php

namespace App\Http\Controllers;

use App\Enums\UserRole;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|max:255',
            'password' => 'required|max:255',
        ]);

        $user = User::where('email', $request->email)
            ->where('role', '!=', UserRole::Consultan)
            ->first();

        if (!$user) {
            return redirect('loginadmin')->with('error', 'Email and password do not match!');
        }

        if (Hash::check($request->password, $user->password)) {
            Auth::loginUsingId($user->id);
            return redirect()->intended('dashboard')->withSuccess("Welcome, {$user->name}!");
        }

        return redirect('loginadmin')->with('error', 'Email and password do not match!');
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();

        return redirect()->route('frontend.index')->withSuccess('Logout!');
    }
}