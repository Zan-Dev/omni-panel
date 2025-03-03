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

        $pieChart = $this->chart->pieChart()
                        ->setTitle('Top 3 scorers of the tema')
                        ->setSubtitle('Sesason 2021.')
                        ->addData([20,40,30])
                        ->setLabels(['Player 1', 'Player 2', 'Player 3']);

        
        $donutChart = $this->chart->donutChart()
                        ->setTitle('Top 3 scorers of the team')
                        ->setSubtitle('Season 2021.')
                        ->addData([20,40,30])
                        ->setLabels(['Player 7', 'Player 10', 'Player 11']);
        
        $radialChart = $this->chart->radialChart()
                        ->setTitle('Passing effectivitiess')
                        ->setSubtitle('Barcelona city vs Madrid sports')
                        ->addData([75, 60])
                        ->setLabels(['Bacelona city', 'Madrid sports'])
                        ->setColors(['#D32F2F', '#03A9F4']);
        
        $polarChart = $this->chart->polarAreaChart()
                        ->setTitle('Top 3 scorers of the team')    
                        ->setSubtitle('Season 201')
                        ->addData([20,40.30])
                        ->setLabels(['Player 7', 'Player 2', 'Player 4']);
        
        $lineChart = $this->chart->lineChart()
                        ->setTitle('Sales during 2021')
                        ->setSubtitle('Physical sales vs Digital sales')
                        ->addData('physical sales', [30,40,20,40,20,30])
                        ->addData('physical sales', [50,40,60,70,20,60])
                        ->setXAxis(['January', 'February', 'March', 'April', 'May', 'June']);

        $areaChart = $this->chart->areaChart()
                        ->setTitle('Sales during 2021.')
                        ->setSubtitle('Physical sales vs Digital sales.')
                        ->addData('Physical sales', [40, 93, 35, 42, 18, 82])
                        ->addData('Digital sales', [70, 29, 77, 28, 55, 45])
                        ->setXAxis(['January', 'February', 'March', 'April', 'May', 'June']);

        $barChart = $this->chart->barChart()
                        ->setTitle('San Francisco vs Boston.')
                        ->setSubtitle('Wins during season 2021.')
                        ->addData('San Francisco', [6, 9, 3, 4, 10, 8])
                        ->addData('Boston', [7, 3, 8, 2, 6, 4])
                        ->setXAxis(['January', 'February', 'March', 'April', 'May', 'June']);

        $horizontalChart = $this->chart->horizontalBarChart()
                        ->setTitle('Los Angeles vs Miami.')
                        ->setSubtitle('Wins during season 2021.')
                        ->setColors(['#FFC107', '#D32F2F'])
                        ->addData('San Francisco', [6, 9, 3, 4, 10, 8])
                        ->addData('Boston', [7, 3, 8, 2, 6, 4])
                        ->setXAxis(['January', 'February', 'March', 'April', 'May', 'June']);

        $heatmapChart = $this->chart->heatMapChart()
                        ->setTitle('Basic radar chart')
                        ->addData('Sales', [80, 50, 30, 40, 100, 20])
                        ->addHeat('Income', [70, 10, 80, 20, 60, 40])
                        ->setMarkers(['#FFA41B', '#4F46E5'], 7, 10)
                        ->setXAxis(['January', 'February', 'March', 'April', 'May', 'June']);

        $radarChart = $this->chart->radarChart()
                        ->setTitle('Individual Player Stats.')
                        ->setSubtitle('Season 2021.')
                        ->addData('Stats', [70, 93, 78, 97, 50, 90])
                        ->setXAxis(['Pass', 'Dribble', 'Shot', 'Stamina', 'Long shots', 'Tactical'])
                        ->setMarkers(['#303F9F'], 7, 10);
               
        $chart = [$pieChart, $donutChart, $radialChart, $polarChart, $lineChart, $areaChart, $barChart, $horizontalChart, $heatmapChart, $radarChart];

        return $chart;
    }

    
}
