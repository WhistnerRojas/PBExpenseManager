<?php

namespace App\Http\Controllers;

use App\Http\Controllers\charts\laravelCharts;
use Illuminate\Http\Request;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;

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
        $chart = new laravelCharts();
        $chartData = $chart->chartData();
        
        return view('home')->with('chart1', $chartData);
    }
}
