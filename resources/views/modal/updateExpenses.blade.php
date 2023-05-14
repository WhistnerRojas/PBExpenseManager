@foreach ($viewExpenses['expenses'] as $expense)
    <div class="modal fade" id="updateExpense{{$expense->expense_id}}" tabindex="-1" aria-labelledby="updateExpense" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="updateExpense">Update Expenses</h1>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{route('expenses.updateDeleteExpenses')}}">
                        @csrf
                        <input type="number" class="d-none" name="userId" value="{{ Auth::user()->id }}">
                        <input type="number" class="d-none" name="id" value="{{$expense->expense_id}}">
                        <div class="md-3 mb-2">
                            
                            <label for="expenseCategory" class="form-label">Expense Category</label>
                            <select name="expenseCategory" class="form-select">
                            <option value="{{$expense->expense_category	}}" selected>{{$expense->expense_category}}</option>
                            @foreach ($viewExpenses['expenseCategory'] as $category)
                                <option value="{{ $category->category_name }}">{{ $category->category_name }}</option>
                            @endforeach
                            </select>

                            @if (isset($errors) && $errors->has('expenses_category'))
                                <div class="alert alert-danger">
                                    {{ $errors->first('expenses_category') }}
                                </div>
                            @endif
                        </div>

                        <div class="md-3 mb-2">

                            <label for="amount" class="form-label">Amount</label>
                            <input type="number" class="form-control" value="{{$expense->amount}}" id="amount" name="amount" autocomplete="off">

                            @if (isset($errors) && $errors->has('amount'))
                                <div class="alert alert-danger">
                                    {{ $errors->first('amount') }}
                                </div>
                            @endif
                        </div>

                        <div class="md-3 mb-2">

                            <label for="entryDate" class="form-label">Entry Date</label>
                            <input type="date" class="form-control" value="{{$expense->entry_date}}" id="entryDate" name="entryDate" autocomplete="off">

                            @if (isset($errors) && $errors->has('entry_date'))
                                <div class="alert alert-danger">
                                    {{ $errors->first('entry_date') }}
                                </div>
                            @endif
                        </div>

                        <div class="modal-footer d-flex">


                            <button type="submit" name="action" value="Delete" class="btn btn-outline-danger me-auto">
                                Delete
                            </button>

                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                Cancel
                            </button>

                            <input type="submit" name="action" value="Update" class="btn btn-primary" />

                        </div>
                        
                    </form>

                </div>
            </div>
        </div>
    </div>
@endforeach