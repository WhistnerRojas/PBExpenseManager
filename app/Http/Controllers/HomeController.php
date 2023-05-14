<?php

namespace App\Http\Controllers;

use App\Http\Controllers\charts\laravelCharts;
use Illuminate\Http\Request;
use App\Http\Controllers\pages\Expenses;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        
        $chartData = $this->getExpenses();
        
        return view('home', ['viewExpenses' => $chartData]);
    }

    public function getExpenses(){
        $expenses= new Expenses();
        $userId = Auth::id();
        // Call a method from the OtherClass
        $result = $expenses->getExpenses($userId);

        // Use the result as needed
        return $result;
    }
}
