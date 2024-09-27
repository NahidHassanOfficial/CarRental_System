<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function manageUsers()
    {
        $users = User::all();
        return view('components.admin-dash.users', compact('users'));
    }

    public function editUserPage($id)
    {
        $user = User::find($id);
        return view('components.admin-dash.user-update-form', compact('user'));
    }

    public function editUser($id, Request $request)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        $validatedData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email,' . $id,
            'role' => 'required|string|in:admin,customer',
        ]);

        $user->update($validatedData);

        noty()->success('User updated successfully');
        return redirect()->route('dashboard.users');

    }

    public function deleteUser($id)
    {
        $user = User::find($id);
        $user->delete();
        noty()->success('Car deleted successfully');
        return redirect()->back();
    }
}
