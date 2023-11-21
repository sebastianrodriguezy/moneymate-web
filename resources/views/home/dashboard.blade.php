<x-layouts.dashboard :user="$user">

  <x-slot:title>
    Inicio
  </x-slot>

  <div
    class="w-full flex flex-col bg-gray-50 dark:bg-gray-800 p-4 px-6 rounded-md mb-5 text-gray-700 dark:text-gray-300">
    <div class="flex flex-row items-center justify-between">
      <div class="flex flex-col">
        <h1 class="text-xl font-semibold">Dashboard</h1>
        <p class="text-xs mt-1 text-gray-400">Usuario creado el: {{ $user->created_at }}</p>
      </div>
      <div class="flex flex-col items-start ml-auto rounded-md border-gray-200 p-2 border dark:border-gray-600">
        <p class="mr-2">
          Idioma: <span class="font-medium">{{ app()->getLocale() === 'es' ? 'Español' : 'Ingles' }}</span>
        </p>
        <p>
          Tema: <span class="font-medium">Oscuro</span>
        </p>
      </div>
    </div>
  </div>

  <div class="w-full min-h-full h-full grid grid-cols-2 grid-rows-2 gap-5">
    <x-dashboard.box title="Resumen de totales" subtitle="Ultimos 100 registros calculados"></x-dashboard.box>
    <x-dashboard.box title="Movimientos recientes" subtitle="Ultimos 5 movimientos registrados"></x-dashboard.box>
    <x-dashboard.box title="Categorias recientes" subtitle="Ultimas 5 categorias registradas"></x-dashboard.box>
    <x-dashboard.box title="Personas recientes" subtitle="Ultimas 5 personas registradas"></x-dashboard.box>
  </div>

</x-layouts.dashboard>
