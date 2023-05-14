<?php

namespace App\Http\Controllers\charts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;

class laravelCharts extends Controller
{
    public function chartData(){
        $chart_options = [
            'chart_title' => 'Users by months',
            'report_type' => 'group_by_date',
            'model' => 'App\Models\User',
            'group_by_field' => 'created_at',
            'group_by_period' => 'month',
            'chart_type' => 'pie',
        ];
        $chart1 = new LaravelChart($chart_options);
        
        return $chart1;
    }
}
