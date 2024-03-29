<x-partials.base>
  <x-slot:title>
    {{ $title ? $title : 'Home' }}
  </x-slot:title>

  <main class="w-full h-screen overflow-hidden flex flex-row p-0" x-data="drawer">
    <x-shared.sidebar :user></x-shared.sidebar>
    <section class="w-full h-screen p-6 overflow-y-auto flex-1" x-data="modal">
      {{ $slot }}
    </section>
  </main>

  <div class="bg-pattern w-full h-screen absolute inset-0"></div>
</x-partials.base>
