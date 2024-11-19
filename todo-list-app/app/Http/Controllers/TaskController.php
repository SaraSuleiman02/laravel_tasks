<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Tag;
use App\Models\User; // Add the User model to fetch users
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    /**
     * Display a listing of the tasks.
     */
    public function index()
    {
        // Get the currently authenticated user
        $user = Auth::user();
        $tags = Tag::all();

        if ($user->role === 'user') {
            // Fetch tasks belonging to the authenticated user
            $tasks = Task::with('tags')->where('user_id', $user->id)->get();

            // Pass tasks and tags to the view
            return view('tasks.index', compact('tasks', 'tags'));
        } elseif ($user->role === 'admin') {
            // Fetch all tasks with their associated tags and users
            $tasks = Task::with('tags', 'user')->get();

            // Fetch all users for the dropdown in the admin view
            $users = User::all();
            return view('dashboard.task', compact('tasks', 'users', 'tags'));
        } else {
            // Optional: Redirect to a default route if the role is neither 'user' nor 'admin'
            return redirect()->route('home')->with('error', 'Unauthorized access.');
        }
    }

    /**
     * Update the status of a task.
     */
    public function update(Request $request, $id)
    {
        $task = Task::where('user_id', Auth::id())->findOrFail($id);
        $task->update(['status' => 'completed']);

        return redirect()->route('tasks.index')->with('success', 'Task marked as completed.');
    }

    /**
     * Store a newly created task in the database.
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $tags = Tag::all();

        if ($user->role === 'user') {
            $validated = $request->validate([
                'title' => 'required|string|max:255',
                'categories' => 'array',
                'categories.*' => 'exists:tags,id',
            ]);

            $task = Task::create([
                'user_id' => Auth::id(),
                'title' => $request->title,
                'priority' => '200',
                'status' => 'in_progress',
            ]);
            if (!empty($validated['categories'])) {
                $task->tags()->attach($validated['categories']);
            }

            return redirect()->route('tasks.index')->with('success', 'Task added successfully!');
        } elseif ($user->role === 'admin') {
            $validated = $request->validate([
                'title' => 'required|string|max:255',
                'user_id' => 'required|exists:users,id',
                'tags' => 'nullable|array',
                'tags.*' => 'exists:tags,id',
                'status' => 'required|in:in_progress,completed,pending',
            ]);

            $task = Task::create([
                'title' => $validated['title'],
                'user_id' => $validated['user_id'],
                'status' => $validated['status'],
            ]);

            // Attach selected tags to the task
            if (!empty($validated['tags'])) {
                $task->tags()->sync($validated['tags']);
            }

            return response()->json(['message' => 'Task added successfully!']);
        }
    }

    /**
     * Remove the specified task from the database.
     */
    public function destroy($id)
    {
        $task = Task::where('user_id', Auth::id())->findOrFail($id);
        $task->tags()->detach();
        $task->delete();

        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully.');
    }
}