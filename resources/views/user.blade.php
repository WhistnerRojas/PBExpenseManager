@extends('layouts.dashboard')

@if(auth()->user()->role !== 'Administrator')
    @php
        header('Location: /');
        exit;
    @endphp
@endif

@section('content')
<div class="row justify-content-center">
    <div class="col-md-11">
        <h6 class="text-end">User Management > <span class="text-primary">Users</span></h6>
        <div class="card">
            <div class="card-header">Roles</div>
            <div class="card-body tableOverflow">

                <table class="table table-striped table-hover">
                    @if(session('msg'))
                        <div class="alert alert-success">
                            {{ session('msg') }}
                        </div>
                    @endif
                    <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Password</th>
                            <th scope="col">Role</th>
                            <th scope="col">Created at</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($viewUsers['users'] as $User)
                            <tr data-bs-toggle="modal" data-bs-target="#updateUser{{ $User->id }}" style="cursor:pointer;">
                                <td>{{ $User->name }}</td>
                                <td>{{ $User->email }}</td>
                                <td>{{ $User->password }}</td>
                                <td>{{ $User->role }}</td>
                                <td>{{ date('Y-m-d', strtotime($User->created_at)) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="text-end">
            <input type="submit" value="Add User" class="btn btn-outline-success my-4" data-bs-toggle="modal" data-bs-target="#addUser"/>
        </div>
    </div>
</div>
<!-- Modal -->
<!-- Add User -->
@include('modal.addUser', ['viewRoles' => $viewUsers])
<!-- Update / Delete User -->
@include('modal.updateUser', ['viewRoles' => $viewUsers])
@endsection