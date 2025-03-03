<?php

namespace App\Http\Controllers;

use App\Charts\Chart;

class ChartController extends Controller
{
    public function index(Chart $chart){
        $charts = $chart->build();
        return view('chart.chart',compact('charts'));

    }
}
