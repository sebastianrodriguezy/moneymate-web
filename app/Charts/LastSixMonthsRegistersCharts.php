<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;
use Carbon\Carbon;

class LastSixMonthsRegistersCharts
{
  protected $chart;

  public function __construct(LarapexChart $chart)
  {
    $this->chart = $chart;
  }

  public function build(): \ArielMejiaDev\LarapexCharts\BarChart
  {
    $data = $this->getData();

    return $this->chart->barChart()
      ->setTitle(__('messages.chartRegistersTitle'))
      ->setSubtitle(__('messages.chartRegistersSubtitle'))
      ->addData(__('messages.nav_link_movements'), $data['movements'])
      ->addData(__('messages.nav_link_categories'), $data['categories'])
      ->addData(__('messages.nav_link_persons'), $data['persons'])
      ->setXAxis($data['months']);
  }

  private function getData()
  {
    $now = Carbon::now();
    $sixMonthsAgo = $now->subMonths(6);

    $movements = \App\Models\Movement::where('created_at', '>=', $sixMonthsAgo)->get();
    $categories = \App\Models\Category::where('created_at', '>=', $sixMonthsAgo)->get();
    $persons = \App\Models\Person::where('created_at', '>=', $sixMonthsAgo)->get();

    $monthsWithYear = [];
    $movementsArray = [];
    $categoriesArray = [];
    $personsArray = [];

    for ($i = 5; $i >= 0; $i--) {
      $carbonNow = Carbon::now();
      $carbonNow->subMonths($i);

      $month = $carbonNow->format('F');
      $year = $carbonNow->format('Y');

      $monthsWithYear[] = $month . ' ' . $year;

      $movementsArray[$month . ' ' . $year] = 0;
      $categoriesArray[$month . ' ' . $year] = 0;
      $personsArray[$month . ' ' . $year] = 0;
    }

    foreach ($movements as $movement) {
      $carbonMovement = Carbon::parse($movement->created_at);

      $month = $carbonMovement->format('F');
      $year = $carbonMovement->format('Y');

      $monthWithYear = $month . ' ' . $year;

      $movementsArray[$monthWithYear]++;
    }

    foreach ($categories as $category) {
      $carbonCategory = Carbon::parse($category->created_at);

      $month = $carbonCategory->format('F');
      $year = $carbonCategory->format('Y');

      $monthWithYear = $month . ' ' . $year;

      $categoriesArray[$monthWithYear]++;
    }

    foreach ($persons as $person) {
      $carbonPerson = Carbon::parse($person->created_at);

      $month = $carbonPerson->format('F');
      $year = $carbonPerson->format('Y');

      $monthWithYear = $month . ' ' . $year;

      $personsArray[$monthWithYear]++;
    }

    return [
      'months' => $monthsWithYear,
      'movements' => array_values($movementsArray),
      'categories' => array_values($categoriesArray),
      'persons' => array_values($personsArray),
    ];
  }
}
