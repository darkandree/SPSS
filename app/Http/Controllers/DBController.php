<?php

namespace App\Http\Controllers;

use App\Charts\Chart;
use Illuminate\Http\Request;

class DBController extends Controller
{
    //

    public function index(Chart $chart)
    {
        
        $chart_options = [
            'chart_title' => 'Users by months',
            'report_type' => 'group_by_date',
            'model' => 'App\Models\User',
            'group_by_field' => 'created_at',
            'group_by_period' => 'month',
            'chart_type' => 'bar',
        ];
      //  $chart1 = new LaravelChart($chart_options);



        return view('dashboard', ['chart' => $chart->build()]);   
    }
}
