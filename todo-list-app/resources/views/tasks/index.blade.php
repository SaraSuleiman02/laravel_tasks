@extends('layouts.app')

@section('title', 'Todo App')

@section('content')
    <div class="app-container d-flex align-items-center justify-content-center flex-column my-5">
        <h3>To-do App</h3>

        {{-- Add Task Form --}}
        <form method="POST" action="{{ route('tasks.store') }}">
            @csrf
            <div class="form-group d-flex gap-3">
                <input name="title" type="text" class="form-control" placeholder="Enter a task here" required />

                <button type="submit" class="btn btn-primary mt-2">Save</button>
            </div>
        </form>


        {{-- Task List --}}
        <div class="table-wrapper">
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>To-do item</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($tasks as $index => $task)
                        <tr class="{{ $task->status === 'completed' ? 'table-success' : 'table-light' }}">
                            <td>{{ $index + 1 }}</td>
                            <td class="{{ $task->status === 'completed' ? 'text-decoration-line-through' : '' }}">
                                {{ $task->title }}
                            </td>
                            <td>{{ ucfirst($task->status) }}</td>
                            <td>
                                @if ($task->status === 'in_progress')
                                    {{-- Mark as Completed --}}
                                    <form action="{{ route('tasks.update', $task->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="btn btn-success btn-sm">Mark Completed</button>
                                    </form>
                                @endif

                                {{-- Delete Task --}}
                                <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">No tasks available. Add one above!</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

    </div>
@endsection
