<?php

namespace App\Charts;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class Chart
{
    protected $chart;

    public function __construct(LarapexChart $chart){
        $this->chart = $chart;
    }

    public function build(){
        // return (new LarapexChart)->setTitle('Posts')
        //         ->setDataset([150,120])
        //         ->setLabels(['Published', 'No Publisahed']);

        // return $this->chart->barChart()
        //     ->setTitle('Just a test')
        //     ->setSubtitle('Ya')
        //     ->addData('data',[10, 20, 30]) 
        //     ->setLabels(['user 1', 'user 2', 'user 3']);
  
        
    //     return $this->chart->barChart()           
    //         ->addData('Sales', [100, 200, 300, 400])
    //         ->setLabels(['January', 'February', 'March', 'April'])
    //         ->setTitle('ada');

        return $this->chart->radialChart()
            ->setTitle('Passing effectiveness.')
            ->setSubtitle('Barcelona city vs Madrid sports.')
            ->addData([75, 60])
            ->setLabels(['Barcelona city', 'Madrid sports'])
            ->setColors(['#D32F2F', '#03A9F4']);
    }

    
}
