<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Tag;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    /**
     * Display a listing of the tasks.
     */
    public function index()
    {
        // Check the authenticated user's role
        $user = Auth::user(); // Get the currently authenticated user

        if ($user->role === 'user') {
            // For users with role 'user', fetch tasks belonging to them
            $tasks = Task::where('user_id', $user->id)->get();
            $tags = Tag::all(); // Get all tags for the dropdown

            return view('tasks.index', compact('tasks', 'tags'));
        } elseif ($user->role === 'admin') {
            // For users with role 'admin', fetch all tasks with their tags
            $tasks = Task::with('tags')->get(); // Assuming Task has a tags relationship

            return view('dashboard.task', compact('tasks'));
        } else {
            // Optional: Redirect to a default route if the role is neither 'user' nor 'admin'
            return redirect()->route('home')->with('error', 'Unauthorized access.');
        }
    }

    /**
     * Store a newly created task in the database.
     */
    public function store(Request $request)
    {
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