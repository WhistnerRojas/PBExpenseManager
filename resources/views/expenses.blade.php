@extends('layouts.dashboard')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-10">
        <h6 class="text-end">User Management > <span class="text-primary">Expenses</span></h6>
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
                            <th scope="col">Expenses category</th>
                            <th scope="col">Amount</th>
                            <th scope="col">Entry Date</th>
                            <th scope="col">Created at</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($viewExpenses['expenses'] as $expense)
                            <tr data-bs-toggle="modal" data-bs-target="#updateExpense{{ $expense->expense_id }}" style="cursor:pointer;">
                            <td>{{ $expense->expense_category }}</td>
                            <td>&#8369;{{ $expense->amount }}</td>
                            <td>{{ $expense->entry_date }}</td>
                            <td>{{ $expense->created_at }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="text-end">
            <input type="submit" value="Add Expenses" class="btn btn-outline-success my-4" data-bs-toggle="modal" data-bs-target="#addExpenses"/>
        </div>
    </div>
</div>
<!-- Modal -->
<!-- Add Roles -->
@include('modal.addExpenses', ['viewExpenses' => $viewExpenses['expenseCategory']])
<!-- Update / Delete Roles -->
@include('modal.updateExpenses', ['viewExpenses' => $viewExpenses])
@endsection
