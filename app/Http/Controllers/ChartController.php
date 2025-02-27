<?php

namespace App\Http\Controllers;

use App\Charts\Chart;

class ChartController extends Controller
{
    public function index(Chart $chart){
        return view('chart.chart',['chart'=> $chart->build()]);
    }
}
