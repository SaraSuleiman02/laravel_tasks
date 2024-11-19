@extends('dashboard.layouts.app')
@section('title', 'Tasks Table')

@section('content')
    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8">
                        <h2>Tasks <b>Management</b></h2>
                    </div>
                    <div class="col-sm-4">
                        <button type="button" class="btn btn-info add-new"><i class="fa fa-plus"></i> Add New</button>
                    </div>
                </div>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Task Title</th>
                        <th>User</th>
                        <th>Tags</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($tasks as $task)
                        <tr data-id="{{ $task->id }}">
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $task->title }}</td>
                            <td>{{ $task->user->name ?? 'No user assigned' }}</td>
                            <td>
                                @if ($task->tags->isNotEmpty())
                                    <ul>
                                        @foreach ($task->tags as $tag)
                                            <li>{{ $tag->name }}</li>
                                        @endforeach
                                    </ul>
                                @else
                                    No tags assigned
                                @endif
                            </td>
                            <td>{{ $task->status }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">No tasks available.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            // Add new task
            $(".add-new").click(function() {
                $(this).attr("disabled", "disabled");
                var usersOptions = @json($users->map(fn($user) => ['id' => $user->id, 'name' => $user->name]));
                var tagsOptions = @json($tags->map(fn($tag) => ['id' => $tag->id, 'name' => $tag->name]));
                var usersDropdown = usersOptions.map(user => `<option value="${user.id}">${user.name}</option>`).join('');
                var tagsDropdown = tagsOptions.map(tag => `<option value="${tag.id}">${tag.name}</option>`).join('');
                var row = `
                    <tr>
                        <td>#</td>
                        <td><input type="text" class="form-control" name="title" placeholder="Enter task title"></td>
                        <td>
                            <select class="form-control" name="user_id">
                                <option value="" disabled selected>Select user</option>
                                ${usersDropdown}
                            </select>
                        </td>
                        <td>
                            <select class="form-control" name="tags[]" multiple>
                                ${tagsDropdown}
                            </select>
                        </td>
                        <td>
                            <select class="form-control" name="status">
                                <option value="in_progress">In Progress</option>
                                <option value="completed">Completed</option>
                                <option value="pending">Pending</option>
                            </select>
                        </td>
                        <td>
                            <a class="add" title="Add" data-toggle="tooltip"><i class="material-icons">check</i></a>
                            <a class="cancel" title="Cancel" data-toggle="tooltip"><i class="material-icons">close</i></a>
                        </td>
                    </tr>`;
                $("table tbody").append(row);
                $('[data-toggle="tooltip"]').tooltip(); // Reinitialize tooltips
            });

            // Cancel adding a new task
            $(document).on("click", ".cancel", function() {
                $(this).closest("tr").remove();
                $(".add-new").removeAttr("disabled");
            });

            // Save new task
            $(document).on("click", ".add", function() {
                var row = $(this).closest("tr");
                var data = {
                    title: row.find("input[name='title']").val(),
                    user_id: row.find("select[name='user_id']").val(),
                    tags: row.find("select[name='tags[]']").val(),
                    status: row.find("select[name='status']").val(),
                    _token: '{{ csrf_token() }}'
                };

                $.post("{{ route('tasks.store') }}", data, function(response) {
                    Swal.fire(
                        "Added!",
                        response.message || "Task has been added successfully.",
                        "success"
                    ).then(() => {
                        location.reload(); // Reload the page to update the table
                    });
                }).fail(function(xhr) {
                    let errorMessage = "Error adding task.";
                    if (xhr.responseJSON && xhr.responseJSON.errors) {
                        errorMessage = Object.values(xhr.responseJSON.errors).flat().join("<br>");
                    }
                    Swal.fire("Error!", errorMessage, "error");
                });
            });
        });
    </script>
@endsection
