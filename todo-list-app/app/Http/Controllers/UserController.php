<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('dashboard.user', compact('users'));
    }
    
    /**
     * Store a newly created user in storage.
     */
    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'role' => 'required|string|max:50',
            'password' => 'required|string|min:8', // Default password
        ]);

        // Create the user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'password' => bcrypt($request->password), // Hash the password
        ]);

        // Return a JSON response
        return response()->json([
            'message' => 'User added successfully!',
            'user' => $user, // Optionally include the created user
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'required|string|unique:users,email,|max:255',
            'email' => 'required|email|max:255',
            'role' => 'required|string|max:50',
        ]);

        $user->update($request->all());

        return response()->json(['message' => 'User updated successfully.']);
    }

    /**
     * Remove the specified user from storage.
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        $user->delete();

        // Return a JSON response
        return response()->json([
            'message' => 'User deleted successfully!',
        ]);
    }
}