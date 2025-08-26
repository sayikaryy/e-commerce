<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all(); // fetch all users
        return view('admin.users.index', compact('users'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }

    public function update($id)
    {
        $user = User::findOrFail($id);
        $data = request()->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'is_admin' => 'nullable|boolean',
        ]);
        $user->update($data);
        return redirect()->route('admin.users.index')->with('success', 'User updated!');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('admin.users.index')->with('success', 'User deleted!');
    }
}
