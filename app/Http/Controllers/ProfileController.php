<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        return view('profile.index', compact('user'));
    }

    public function update(Request $request)
    {
        $user = auth()->user();

        $request->validate([
            'name' => 'required|max:255|min:5',
            'photo' => 'nullable|image|max:2048',
            'email' => 'required|email|unique:users,email,' . $user->id . '|min:5|max:255',
            'password' => 'nullable|confirmed|min:5|max:255',
            'old_password' => 'required|required_with:password|max:255',
        ]);


        if ($request->hasFile('photo') && !empty($request->photo)) {
            $file = $request->file('photo');
            $fileName = Str::random(20) . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/avatars', $fileName);

            $user->photo = "avatars/{$fileName}";
        }

        if ($request->old_password) {
            if (!Hash::check($request->old_password, $user->password)) {
                return back()->withError('Old password is incorrect!');
            }
        }

        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->password) {
            $user->password = bcrypt($request->password);
        }
        $user->save();

        return redirect()->route('profile.index')->withSuccess('Profile successfully updated!');
    }
}