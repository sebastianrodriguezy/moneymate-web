<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;

class SectionsCountChart
{
  protected $chart;

  public function __construct(LarapexChart $chart)
  {
    $this->chart = $chart;
  }

  public function build(string $userId): \ArielMejiaDev\LarapexCharts\DonutChart
  {
    $countMovements = \App\Models\Movement::where('fk_user_id', $userId)->count();
    $countCategories = \App\Models\Category::where('fk_user_id', $userId)->count();
    $countPersons = \App\Models\Person::where('fk_user_id', $userId)->count();

    return $this->chart->donutChart()
      ->setTitle(__('messages.chartSectionsTitle'))
      ->addData([$countMovements, $countCategories, $countPersons])
      ->setLabels([
        __('messages.nav_link_movements'),
        __('messages.nav_link_categories'),
        __('messages.nav_link_persons')
      ]);
  }
}
