<?php

namespace App\Http\Controllers;

use App\Charts\LastSixMonthsMovementsChart;
use App\Charts\LastSixMonthsRegistersCharts;
use App\Charts\SectionsCountChart;

class ReportsController extends Controller
{
  public function show(
    SectionsCountChart $sectionsChart,
    LastSixMonthsMovementsChart $lastSixMonthsMovementsChart,
    LastSixMonthsRegistersCharts $lastSixMonthsRegistersChart
  ) {
    $user = auth()->user();
    $sectionsChartBuild = $sectionsChart->build($user->user_id);
    $lastSixMonthsMovementsChartBuild = $lastSixMonthsMovementsChart->build();
    $lastSixMonthsRegistersChartBuild = $lastSixMonthsRegistersChart->build();

    return view('reports.index', [
      'user' => $user,
      'sectionsChart' => $sectionsChartBuild,
      'movementsCharts' => $lastSixMonthsMovementsChartBuild,
      'registersCharts' => $lastSixMonthsRegistersChartBuild,
    ]);
  }
}
