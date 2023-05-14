@extends('layouts.dashboard')

@if(auth()->user()->role !== 'Administrator')
    @php
        header('Location: /');
        exit;
    @endphp
@endif

@section('content')
<div class="row justify-content-center">
    <div class="col-md-9">
        <h6 class="text-end">User Management > <span class="text-primary">Expense Category</span></h6>
        <div class="card">
            <div class="card-header">Expense Category</div>
            <div class="card-body tableOverflow">

                <table class="table table-striped table-hover">
                    @if(session('msg'))
                        <div class="alert alert-success">
                            {{ session('msg') }}
                        </div>
                    @endif
                    <thead>
                        <tr>
                            <th scope="col">Category Name</th>
                            <th scope="col">Description</th>
                            <th scope="col">Created at</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($viewCategory as $category)
                            <tr data-bs-toggle="modal" data-bs-target="#updateCatalog{{ $category->category_id }}" style="cursor:pointer;">
                                <td>{{ $category->category_name }}</td>
                                <td>{{ $category->description }}</td>
                                <td>{{ $category->created_at }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="text-end">
            <input type="submit" value="Add Category" class="btn btn-outline-success my-4" data-bs-toggle="modal" data-bs-target="#addCategory"/>
        </div>
    </div>
</div>
<!-- Modal -->
<!-- Add Roles -->
@include('modal.addCatalog')
<!-- Update / Delete Roles -->
@include('modal.updateCatalog', ['viewCategory' => $viewCategory])
@endsection
