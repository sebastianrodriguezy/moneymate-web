<x-partials.base>
  <x-slot:title>
    {{ $title ? $title : 'Login' }}
  </x-slot:title>

  <main class="w-full h-screen flex flex-row items-center justify-center px-4">
    <section class="w-full flex flex-col shadow-lg dark:shadow-xl p-6 rounded-lg max-w-[400px] bg-slate-50 dark:bg-gray-800">
      <figure class="max-w-[150px] w-full mb-2 text-left">
        <img alt="Logo de la aplicación" src="/img/logo.png"  />
      </figure>
      {{ $slot }}
    </section>
    <figure class="max-w-[250px] w-full opacity-75 ml-14 hidden md:block">
      <img alt="Ilustración de persona en registro" src="/img/svg/auth.svg"  />
    </figure>
  </main>

  <div class="bg-pattern w-full h-screen absolute inset-0" />
</x-partials.base>