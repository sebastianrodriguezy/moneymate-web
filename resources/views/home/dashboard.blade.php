<x-layouts.dashboard :user="$user">

  <x-slot:title>
    Inicio
  </x-slot>

  <div
    class="w-full flex flex-col bg-gray-50 dark:bg-gray-800 p-4 px-6 rounded-md mb-5 text-gray-700 dark:text-gray-300">
    <div class="flex flex-row items-center justify-between">
      <div class="flex flex-col">
        <h1 class="text-xl font-semibold">{{ __('messages.home_title') }}</h1>
        <p class="text-xs mt-1 text-gray-400">
          {{ __('messages.userCreatedAtTitle') }}: <span x-text="formatDate('{{ $user->created_at }}')"></span>
        </p>
      </div>
      <div class="flex flex-row items-start ml-auto">
        <span
          class="bg-gray-100 text-gray-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-gray-300">
          {{ app()->getLocale() === 'es' ? 'Español' : 'English' }}
        </span>
        <span
          class="bg-brand-100 text-brand-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded dark:bg-brand-900 dark:text-brand-300">
          {{ __('messages.themeTitle') }}: <span
            x-text="$store.darkMode.on ? '{{ __('messages.themeDark') }}' : '{{ __('messages.themeLigth') }}'"></span>
        </span>
      </div>
    </div>
  </div>

  <div class="w-full min-h-full h-full grid grid-cols-2 grid-rows-2 gap-5">
    <x-dashboard.box :title="__('messages.totalsHomeTitle')" :subtitle="__('messages.totalsHomeSubtitle')" x-data="homeCalcs('totals')">
      <x-movements.totals></x-movements.totals>
    </x-dashboard.box>
    <x-dashboard.box :title="__('messages.movementsHomeTitle')" :subtitle="__('messages.movementsHomeSubtitle')" x-data="homeCalcs('movements')">
      <x-movements.movement-card></x-movements.movement-card>
    </x-dashboard.box>
    <x-dashboard.box :title="__('messages.categoriesHomeTitle')" :subtitle="__('messages.categoriesHomeSubtitle')" x-data="homeCalcs('categories')">
      <x-categories.category-card></x-categories.category-card>
    </x-dashboard.box>
    <x-dashboard.box :title="__('messages.personsHomeTitle')" :subtitle="__('messages.personsHomeSubtitle')" x-data="homeCalcs('persons')">
      <x-persons.person-card></x-persons.person-card>
    </x-dashboard.box>
  </div>

</x-layouts.dashboard>
