<?php

namespace App\Charts;

use App\Models\Voiture;
use App\Models\Tarification;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class VoituresChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\BarChart
    {
      $T = Tarification::all();
      $V = Voiture::all();
        return $this->chart->barChart()
        ->setTitle('CAR EXPRESS')
        ->setSubtitle('Diagramme Kilometrage')
        ->addData('Toyota Camry' , [70, 13, 36, 94])
        ->addData('Hyndai Veloster',[50, 60, 70, 30])
        ->addData('Nissan Kicks',[50, 60, 70, 30])
        ->setXAxis(['Kilometrage','Kilometrage','Kilometrage','Kilometrage']);
      }
}
