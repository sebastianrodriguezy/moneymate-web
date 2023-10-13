<x-layouts.dashboard :user="$user">

  <x-slot:title>
    Inicio
  </x-slot>

  <h1>Hola que hace</h1>
  <p>Locale: {{ app()->getLocale() }}</p>

</x-layouts.dashboard>