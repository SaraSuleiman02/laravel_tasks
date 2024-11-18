<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;


class TagController extends Controller
{
    public function index()
{
    $tags = Tag::all();
    return view('tags.index', compact('tags'));
}

public function store(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255|unique:tags',
    ]);

    Tag::create($validated);

    return redirect()->back()->with('success', 'Tag added successfully!');
}

}