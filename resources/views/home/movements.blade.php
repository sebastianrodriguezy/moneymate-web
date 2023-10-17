<x-layouts.dashboard :user="$user">

  <x-slot:title>
    {{ __('messages.nav_link_movements') }}
  </x-slot>

  <div class="w-full flex flex-col bg-gray-50 dark:bg-gray-800 p-4 px-6 rounded-md mb-5">
    <h1 class="text-2xl">Aqui el titulo</h1>
  </div>
  
  <x-shared.table>
    <p>Hola que hace</p>
  </x-shared.table>

</x-layouts.dashboard>