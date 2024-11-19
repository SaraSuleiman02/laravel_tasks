<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;


class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::all();
        return view('dashboard.tag', compact('tags'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:tags',
        ]);

        $tag = Tag::create($validated);

        return response()->json([
            'message' => 'User added successfully!',
            'user' => $tag, // Optionally include the created user
        ]);
    }

    public function update(Request $request, $id)
    {
        $user = Tag::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255|unique:tags',
        ]);

        $user->update($request->all());

        return response()->json(['message' => 'User updated successfully.']);
    }

    /**
     * Remove the specified user from storage.
     */
    public function destroy($id)
    {
        $user = Tag::findOrFail($id);

        $user->delete();

        // Return a JSON response
        return response()->json([
            'message' => 'User deleted successfully!',
        ]);
    }
}