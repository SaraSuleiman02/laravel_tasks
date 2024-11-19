@extends('dashboard.layouts.app')
@section('title', 'Users Table')

@section('content')
    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8">
                        <h2>User <b>Details</b></h2>
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
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $user)
                        <tr data-id="{{ $user->id }}">
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->role }}</td>
                            <td>
                                {{-- <a class="add" title="Add" data-toggle="tooltip"><i 
                                    class="material-icons"></i></a> --}}
                                <a class="edit" title="Edit" data-toggle="tooltip"><i
                                        class="material-icons">edit</i></a>
                                <a class="delete" title="Delete" data-toggle="tooltip"><i
                                        class="material-icons">delete</i></a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">No users available. Add one above!</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('[data-toggle="tooltip"]').tooltip();

            // Add new user
            $(".add-new").click(function() {
                $(this).attr("disabled", "disabled");
                var row = `
                    <tr>
                        <td>#</td>
                        <td><input type="text" class="form-control" name="name" placeholder="Enter name"></td>
                        <td><input type="email" class="form-control" name="email" placeholder="Enter email"></td>
                        <td><input type="text" class="form-control" name="role" placeholder="Enter role"></td>
                        <td>
                            <a class="add" title="Add" data-toggle="tooltip"><i class="material-icons">check</i></a>
                            <a class="cancel" title="Cancel" data-toggle="tooltip"><i class="material-icons">close</i></a>
                        </td>
                    </tr>`;
                $("table tbody").append(row);
                $('[data-toggle="tooltip"]').tooltip(); // Reinitialize tooltips
            });

            // Save new user
            $(document).on("click", ".add", function() {
                var row = $(this).closest("tr");
                var data = {
                    name: row.find("input[name='name']").val(),
                    email: row.find("input[name='email']").val(),
                    role: row.find("input[name='role']").val(),
                    password: "password123", // Default password
                    _token: '{{ csrf_token() }}'
                };

                $.post("{{ route('users.store') }}", data, function(response) {
                    Swal.fire(
                        "Added!",
                        response.message || "User has been added successfully.",
                        "success"
                    ).then(() => {
                        location.reload(); // Reload the page to update the table
                    });
                }).fail(function(xhr) {
                    let errorMessage = "Error adding user.";
                    if (xhr.responseJSON && xhr.responseJSON.errors) {
                        errorMessage = Object.values(xhr.responseJSON.errors).flat().join("<br>");
                    }
                    Swal.fire("Error!", errorMessage, "error");
                });
            });



            // Cancel adding a new user
            $(document).on("click", ".cancel", function() {
                $(this).closest("tr").remove();
                $(".add-new").removeAttr("disabled");
            });

            // Edit user
            $(document).on("click", ".edit", function() {
                var row = $(this).closest("tr");
                row.find("td:not(:last-child)").each(function(index) {
                    var content = $(this).text();
                    if (index > 0) {
                        $(this).html(`<input type="text" class="form-control" value="${content}">`);
                    }
                });
                row.find(".edit").removeClass("edit").addClass("save").html(
                    '<i class="material-icons">check</i>');
            });

            // Save edited user
            $(document).on("click", ".save", function() {
                var row = $(this).closest("tr");
                var userId = row.data("id");
                var data = {
                    name: row.find("input").eq(0).val(),
                    email: row.find("input").eq(1).val(),
                    role: row.find("input").eq(2).val(),
                    _method: 'PUT',
                    _token: '{{ csrf_token() }}'
                };

                $.ajax({
                    url: "{{ route('users.update', ':id') }}".replace(':id', userId),
                    method: 'PUT',
                    data: data,
                    success: function(response) {
                        Swal.fire(
                            "Updated!",
                            response.message || "User has been updated successfully.",
                            "success"
                        ).then(() => {
                            location.reload(); // Reload the page to update the table
                        });
                    },
                    error: function(xhr) {
                        Swal.fire(
                            "Error!",
                            xhr.responseJSON.message || "Failed to update user.",
                            "error"
                        );
                    }
                });
            });


            // Delete user
            $(document).on("click", ".delete", function() {
                var row = $(this).closest("tr");
                var userId = row.data("id");

                Swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: "{{ route('users.destroy', ':id') }}".replace(':id',
                                userId),
                            method: 'DELETE',
                            data: {
                                _token: '{{ csrf_token() }}'
                            },
                            success: function(response) {
                                Swal.fire(
                                    "Deleted!",
                                    response.message || "User has been deleted.",
                                    "success"
                                );
                                row.remove(); // Remove the row from the table
                            },
                            error: function(xhr) {
                                Swal.fire(
                                    "Error!",
                                    xhr.responseJSON.message ||
                                    "Failed to delete the user.",
                                    "error"
                                );
                            }
                        });
                    }
                });
            });

        });
    </script>
@endsection
