<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;
use Carbon\Carbon;

class LastSixMonthsMovementsChart
{
  protected $chart;

  public function __construct(LarapexChart $chart)
  {
    $this->chart = $chart;
  }

  public function build(): \ArielMejiaDev\LarapexCharts\LineChart
  {
    $data = $this->getMovementsData();

    return $this->chart->lineChart()
      ->setTitle(__('messages.chartMovementsTitle'))
      ->setSubtitle(__('messages.chartMovementsIncomeLabel') . ' vs ' . __('messages.chartMovementsDischargeLabel'))
      ->addData(__('messages.chartMovementsIncomeLabel'), $data['income'])
      ->addData(__('messages.chartMovementsDischargeLabel'), $data['discharge'])
      ->setXAxis($data['months']);
  }

  private function getMovementsData()
  {
    $now = Carbon::now();
    $sixMonthsAgo = $now->subMonths(6);

    $movements = \App\Models\Movement::where('created_at', '>=', $sixMonthsAgo)->get();

    $monthsWithYear = [];
    $incomeArray = [];
    $dischargeArray = [];

    for ($i = 5; $i >= 0; $i--) {
      $carbonNow = Carbon::now();
      $carbonNow->subMonths($i);

      $month = $carbonNow->format('F');
      $year = $carbonNow->format('Y');

      $monthsWithYear[] = $month . ' ' . $year;

      $incomeArray[$month . ' ' . $year] = 0;
      $dischargeArray[$month . ' ' . $year] = 0;
    }

    foreach ($movements as $movement) {
      $type = $movement->type;
      $carbonMovement = Carbon::parse($movement->created_at);

      $month = $carbonMovement->format('F');
      $year = $carbonMovement->format('Y');

      $monthWithYear = $month . ' ' . $year;

      if ($type == 'income') {
        $incomeArray[$monthWithYear]++;
      } elseif ($type == 'discharge') {
        $dischargeArray[$monthWithYear]++;
      }
    }

    return [
      'months' => $monthsWithYear,
      'income' => array_values($incomeArray),
      'discharge' => array_values($dischargeArray),
    ];
  }
}
