<?php

namespace App\Http\Controllers;

use App\Enums\UserRole;
use App\Models\Doctor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class FrontendController extends Controller
{
    public function index()
    {
        return view('frontend.index');
    }


    public function login()
    {
        return view('frontend.login');
    }

    public function register()
    {
        return view('frontend.register');
    }

    public function processLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|max:255',
            'password' => 'required|max:255',
        ]);

        $user = User::where('email', $request->email)
            ->where('role', '=', UserRole::Consultan)
            ->first();

        if (!$user) {
            return redirect('login')->with('error', 'Email and password do not match!');
        }

        if (Hash::check($request->password, $user->password)) {
            Auth::loginUsingId($user->id);
            return redirect()->route('frontend.index');
        }

        return redirect('login')->with('error', 'Email and password do not match!');
    }

    public function processRegister(Request $request){
        $request->validate([
            'fullname' => 'required|string|min:5',
            'email' => 'required|email|unique:users',
            'phone' => 'required|min:10',
            'password' => 'required|min:8'
        ],
        [
            'fullname.required' => 'Fullname harus diisi',
            'fullname.min' => 'Fullname harus berisi minimal 5',
            'email.required' => 'Email harus diisi',
            'email.unique' => 'Email sudah digunakan',
            'phone.unique' => 'Phone sudah digunakan',
            'phone.required' => 'Phone harus diisi',
            'phone.min' => 'Phone harus berisi minimal 10',
            'email.email' => 'Email harus berbentuk email',
            'password.required' => 'Password harus diisi',
            'password.min' => 'Password harus berisi minimal 8'
        ]);

        $user = User::create([
            'name' => $request->fullname,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => UserRole::Consultan,
        ]);
            Auth::loginUsingId($user->id);
            return redirect()->route('frontend.index');
    }

    public function list()
    {
    $doctors = Doctor::get();

    return view('frontend.list_doctor', compact('doctors'));
    }
}
