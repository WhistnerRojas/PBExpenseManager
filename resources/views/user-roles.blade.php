@extends('layouts.dashboard')

@if(auth()->user()->role !== 'Administrator')
    @php
        header('Location: /');
        exit;
    @endphp
@endif

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <h6 class="text-end">User Management > <span class="text-primary">Roles</span></h6>
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
                            <th scope="col">Display Name</th>
                            <th scope="col">Description</th>
                            <th scope="col">Created at</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($viewRoles as $role)
                            <tr data-bs-toggle="modal" data-bs-target="#updateRoles{{ $role->roles_id }}" style="cursor:pointer;">
                                <td>{{ $role->display_name }}</td>
                                <td>{{ $role->description }}</td>
                                <td>{{ $role->created_at }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="text-end">
            <input type="submit" value="Add Role" class="btn btn-outline-success my-4" data-bs-toggle="modal" data-bs-target="#addRoles"/>
        </div>
    </div>
</div>
<!-- Modal -->
<!-- Add Roles -->
@include('modal.addRoles', ['viewRoles' => $viewRoles])
<!-- Update / Delete Roles -->
@include('modal.updateRoles', ['viewRoles' => $viewRoles])
@endsection