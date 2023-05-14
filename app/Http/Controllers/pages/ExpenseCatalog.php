<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ExpenseCategories;
use Illuminate\Support\Facades\Validator;

class expenseCatalog extends Controller
{
    public function viewExpenseCatalog(){

        $category = $this->getCategory();
        return view('ExpenseCatalog', ['viewCategory' => $category]);
    }

    public function getCategory(){
        $this->middleware('auth');

        $category = ExpenseCategories::all();

        return $category;
    }

    public function validateExpenseInput($request){

        $validateInput = Validator::make($request->all(), [
            'categoryName' => 'required|string|regex:/^[a-zA-Z0-9\s\-\.\,\']+$/u',
            'description' => 'required|string|regex:/^[a-zA-Z0-9\s\-\.\,\']+$/u'
        ]);

        if ($validateInput->fails()) {
            return redirect()->route('viewExpenseCatalog')->with('msg', 'failed to add Category');
        }else{
            return false;
        }

    }

    public function addCategory(Request $request){

        if($this->validateExpenseInput($request) === false){

            $category = new ExpenseCategories;

            $category->category_name = $request->input('categoryName');
            $category->description = $request->input('description');
            $category->created_at = now()->format('Y-m-d');
            $category->save();

            return redirect()->route('viewExpenseCatalog')->with('msg', 'Added new Category');

        }

    }

    public function updateDeleteCategory(Request $req){

        $action = $req->input('action');

        if($this->validateExpenseInput($req) === false){
            if ($action === 'Delete') {

                $this->deleteCategory($req);
                return redirect()->route('viewExpenseCatalog')->with('msg', $this->deleteCategory($req));

            }elseif ($action === 'Update') {

                $this->updateCategory($req);
                return redirect()->route('viewExpenseCatalog')->with('msg', $this->updateCategory($req));

            }
        }
    }

    public function deleteCategory($req){
        $id = $req->input('id');
        $category = ExpenseCategories::find($id);

        if ($category) {
            $category->delete();
        }
        return 'Expense category deleted successfully.';
    }
    

    public function updateCategory($req){

        $id = $req->input('id');
        
        if($this->validateExpenseInput($req) === false){

            $category = ExpenseCategories::find($id);

            if ($category) {
                $category->category_name = $req->input('categoryName');
                $category->description = $req->input('description');
                $category->save();

                return 'Updated successfully.';
            }

            // Handle if the role is not found
            return 'Expenses category update failed.';
        }
    }

}
