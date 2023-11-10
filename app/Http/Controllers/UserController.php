<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $query = User::query();
        $users = $query->get();

        $currentId = auth()->user()->id;

        return view('pages.users.index', compact('users', 'currentId'));
    }

    public function create()
    {
        return view('pages.users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email|min:5|max:255',
            'password' => 'required|confirmed|min:5|max:255',
        ]);

        User::create([
            'name' => $request->name,
            'role' => 'admin',
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return redirect()->route('users.index')->withSuccess('User successfully added!');
    }

    public function edit($id)
    {
        $user = User::find($id);
        abort_if(!$user, 400, 'User not found');

        return view('pages.users.edit', compact('user'));
    }

    public function update($id, Request $request)
    {
        $user = User::find($id);
        abort_if(!$user, 400, 'User not found');

        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id . '|min:5|max:255',
            'password' => 'nullable|confirmed|min:5|max:255',
        ]);

        if ($request->password_confirmation && !$request->password) {
            return back()->withError('New password does not match!');
        }

        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->password) {
            $user->password = bcrypt($request->password);
        }
        $user->save();

        return redirect()->route('users.index')->withSuccess('User successfully updated!');
    }

    public function destroy($id)
    {
        $user = User::find($id);
        abort_if(!$user, 400, 'User not found');

        $user->delete();

        return redirect()->route('users.index')->withSuccess('User successfully deleted!');
    }
}
