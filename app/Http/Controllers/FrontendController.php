<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Doctor;
use App\Enums\UserRole;
use App\Models\Consultation;
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

    public function formConsul($id)
    {
        $doctor = Doctor::find($id);
        abort_if(!$doctor, 404, 'Dokter tidak ditemukan!');
        return view('frontend.form-consul', compact('doctor'));
    }
    public function doneSending()
    {
        return view('frontend.done-send');
    }

    public function storeFormConsul(Request $request)
    {
        $request->validate([
            'doctor_id' => 'required|max:255',
            'user_id' => 'required|max:255',
            'description' => 'required|min:5',
        ]);

        Consultation::create($request->all());
        $doctor = Doctor::find($request->doctor_id);

        if ($doctor) {
            $doctor->update(['status' => 'busy']);
        }
        return dd('test');
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

        return redirect()->back()->with('error', 'Email and password do not match!');
    }

    public function processRegister(Request $request)
    {
       // dd($request->all()); 
       $request->validate(
        [
            'name' => 'required|string|min:5',
            'email' => 'required|email|unique:users',
            'phone' => 'required|min:10',
            'password' => 'required|min:8',
             
        ],
        [
            'name.required' => 'Fullname harus diisi',
            'name.min' => 'Fullname harus berisi minimal 5',
            'email.required' => 'Email harus diisi',
            'email.unique' => 'Email sudah digunakan',
            'email.email' => 'Email harus berbentuk email',
            'phone.unique' => 'Phone sudah digunakan',
            'phone.required' => 'Phone harus diisi',
            'phone.min' => 'Phone harus berisi minimal 10',
            'password.required' => 'Password harus diisi',
            'password.min' => 'Password harus berisi minimal 8',
             
        ]
    );
    
         

        $user = User::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => UserRole::Consultan,
        ]);
        Auth::loginUsingId($user->id);
        return redirect()->route('frontend.index');
    }

    public function list(Request $request)
    {
        $query = Doctor::query();

        if ($request->has('query')) {
            $query->where(function ($query) use ($request) {
                $query->where('name', 'LIKE', '%' . $request->input('query') . '%')
                    ->orWhereHas('specialist', function ($subQuery) use ($request) {
                        $subQuery->where('name', 'LIKE', '%' . $request->input('query') . '%');
                    });
            });
        }

        $doctors = $query->get();

        return view('frontend.list_doctor', compact('doctors'));
    }
}