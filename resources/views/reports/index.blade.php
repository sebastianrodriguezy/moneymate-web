<x-layouts.dashboard :user="$user">

  <x-slot:title>
    {{ __('messages.nav_link_reports') }}
  </x-slot>

  <div
    class="w-full flex flex-col bg-gray-50 dark:bg-gray-800 p-4 px-6 rounded-md mb-5 text-gray-700 dark:text-gray-300">
    <div class="flex flex-row items-center justify-between">
      <h1 class="text-xl font-semibold">{{ __('messages.nav_link_reports') }}</h1>
    </div>
  </div>

  <div class="w-full flex flex-row gap-4 items-center mb-5">
    <div
      class="max-w-1/2 w-full flex items-center justify-center flex-1 self-stretch rounded-md bg-gray-50 dark:bg-gray-800 p-4 text-gray-700 dark:text-gray-300">
      <div class="w-full dark:bg-gray-400 rounded-md">{!! $sectionsChart->container() !!}</div>
    </div>
    <div
      class="max-w-1/2 w-full flex items-center justify-center flex-1 self-stretch rounded-md bg-gray-50 dark:bg-gray-800 p-4 text-gray-700 dark:text-gray-300">
      <div class="w-full dark:bg-gray-400 rounded-md">{!! $registersCharts->container() !!}</div>
    </div>
  </div>

  <div class="w-full rounded-md bg-gray-50 dark:bg-gray-800 p-4 text-gray-700 dark:text-gray-300">
    <div class="w-full dark:bg-gray-400 rounded-md">{!! $movementsCharts->container() !!}</div>
  </div>

  <script src="{{ $sectionsChart->cdn() }}"></script>
  <script src="{{ $movementsCharts->cdn() }}"></script>
  <script src="{{ $registersCharts->cdn() }}"></script>

  {{ $sectionsChart->script() }}
  {{ $movementsCharts->script() }}
  {{ $registersCharts->script() }}

</x-layouts.dashboard>
