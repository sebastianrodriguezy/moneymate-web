<div {{ $attributes }} x-data="drawer">
  {{ $trigger }}
  <div
    class="fixed z-50 inset-0 transition-opacity bg-black bg-opacity-80" 
    aria-hidden="true"
    x-bind="close"
    x-cloak
    x-show="show" 
    x-transition:enter="transition ease-out duration-300 transform"
    x-transition:enter-start="opacity-0" 
    x-transition:enter-end="opacity-100"
    x-transition:leave="transition ease-in duration-200 transform"
    x-transition:leave-start="opacity-100" 
    x-transition:leave-end="opacity-0"
  ></div>
  <div 
    class="fixed z-50 h-screen bg-gray-100 dark:bg-gray-700 w-[380px] text-gray-800 dark:text-gray-200 p-8 right-0 top-0"
    x-cloak
    x-show="show"
    x-transition:enter="transition ease-out duration-300" 
    x-transition:enter-start="translate-x-full"
    x-transition:enter-end="-translate-x-0" 
    x-transition:leave="transition ease-in duration-300 "
    x-transition:leave-start="-translate-x-0" 
    x-transition:leave-end="translate-x-full"
  >
    <div class="w-full flex flex-row justify-between mb-3">
      <h3 class="leading-4 text-lg font-semibold">{{ $title }}</h3>
      <button x-bind="close">
        <ion-icon name="close" class="h-5 w-5"></ion-icon>
      </button>
    </div>
    {{ $slot }}
  </div>
</div>