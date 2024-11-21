@extends('dashboard.layouts.navbar')

@section('content')
<div class="content">
    <div class="row py-5">
        <div class="col-12 d-flex justify-content-between align-items-center">
            <h2>User <b>Details</b></h2>
            {{-- <button type="button" class="btn btn-info add-new"><i class="fa fa-plus"></i> Add New</button> --}}
            <button type="button" class="btn btn-primary add-new">Add New</button>
        </div>
    </div>
    
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
                <th scope="col">DOB</th>
                <th scope="col">Partner Name</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td scope="row">1</td>
                <td>Lucia</td>
                <td>lucia@gmail.com</td>
                <td>0795894363</td>
                <td>17/4/2002</td>
                <td>Andreh</td>
                {{-- <td>
                    <label class="switch switch-primary switch-pill form-control-label ">
                        <input type="checkbox" class="switch-input form-check-input" value="on" checked>
                        <span class="switch-label"></span>
                        <span class="switch-handle"></span>
                    </label>
                </td> --}}
                <td style="font-size: 20px;">
                    {{-- <a class="add" title="Add" data-toggle="tooltip"><i 
                        class="material-icons"></i></a> --}}
                    <a class="edit" title="Edit" data-toggle="tooltip"><span class="mdi mdi-pencil-box"></span></a>
                    <a class="delete" title="Delete" data-toggle="tooltip"><span class="mdi mdi-delete"></span></a>
                </td>
            </tr>
        </tbody>
    </table>
</div>
@endsection