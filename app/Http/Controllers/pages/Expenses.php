<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Expense;
use Illuminate\Support\Facades\Validator;
use App\Models\ExpenseCategories;
use Illuminate\Support\Facades\Auth;

class Expenses extends Controller
{
    public function viewExpenses(){

        $userId = Auth::id();
        $expenses = $this->getExpenses($userId);
        return view('Expenses', ['viewExpenses' => $expenses]);
    }

    public function getExpenses($userId){

        $expenses = Expense::where('user_id', $userId)->get();
        $expenseCategory = $this->getExpenseCategory();
        
        return [
            'expenses' => $expenses,
            'expenseCategory' => $expenseCategory,
        ];

    }

    public function getExpenseCategory(){
        $expenseCatalog = ExpenseCategories::all();
        return $expenseCatalog; 
    }

    public function validateExpenseInput($request){

        $validator = Validator::make($request->all(), [
            'expenseCategory' => 'required|exists:expensecategory,category_name',
            'amount' => 'required|numeric',
            'entryDate' => 'required|date',
            'userId' => 'required|exists:users,id',
        ]);

        if ($validator->fails()) {
            return redirect()->route('viewExpenses')->with('msg', 'failed to add Category');
        }else{
            return false;
        }

    }

    public function addExpenses(Request $request){

        if($this->validateExpenseInput($request) === false){

            $expenses = new Expense;

            $expenses->expense_category = $request->input('expenseCategory');
            $expenses->amount = $request->input('amount');
            $expenses->entry_date = $request->input('entryDate');
            $expenses->created_at = now()->format('Y-m-d');
            $expenses->user_id = $request->input('userId');
            $expenses->save();

            return redirect()->route('viewExpenses')->with('msg', 'Added new Expenses');

        }

    }

    public function updateDeleteExpenses(Request $req){

        $action = $req->input('action');

        if($this->validateExpenseInput($req) === false){
            if ($action === 'Delete') {

                $this->deleteExpenses($req);
                return redirect()->route('viewExpenses')->with('msg', $this->deleteExpenses($req));

            }elseif ($action === 'Update') {

                $this->updateExpenses($req);
                return redirect()->route('viewExpenses')->with('msg', $this->updateExpenses($req));

            }
        }
    }

    public function deleteExpenses($req){
        $id = $req->input('id');
        $expenses = Expense::find($id);

        if ($expenses) {
            $expenses->delete();
        }
        return 'Expense deleted successfully.';
    }
    

    public function updateExpenses($request){

        $id = $request->input('id');
        
        if($this->validateExpenseInput($request) === false){

            $expenses = Expense::find($id);

            if ($expenses) {

                $expenses->expense_category = $request->input('expenseCategory');
                $expenses->amount = $request->input('amount');
                $expenses->entry_date = $request->input('entryDate');
                $expenses->created_at = now()->format('Y-m-d');
                $expenses->user_id = $request->input('userId');
                $expenses->save();

                return 'Updated successfully.';
            }

            // Handle if the role is not found
            return 'Expenses category update failed.';
        }
    }
}
