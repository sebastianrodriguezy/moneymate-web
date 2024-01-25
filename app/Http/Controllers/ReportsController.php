<?php

namespace App\Http\Controllers;

use App\Charts\LastSixMonthsMovementsChart;
use App\Charts\SectionsCountChart;
use App\Charts\TestChart;
use Illuminate\Http\Request;

class ReportsController extends Controller
{
  public function show(SectionsCountChart $sectionsChart, LastSixMonthsMovementsChart $lastSixMonthsMovementsChart)
  {
    $user = auth()->user();
    $sectionsChartBuild = $sectionsChart->build($user->user_id);
    $lastSixMonthsMovementsChartBuild = $lastSixMonthsMovementsChart->build();

    return view('reports.index', [
      'user' => $user,
      'sectionsChart' => $sectionsChartBuild,
      'movementsCharts' => $lastSixMonthsMovementsChartBuild
    ]);
  }
}
