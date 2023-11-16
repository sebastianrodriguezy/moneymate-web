<div class="absolute top-0 right-0 z-50 pt-4 pr-4 max-w-[350px] w-full" x-data="alert">
  <div x-cloak x-show="showAlert" x-transition:enter="transition ease-out duration-300 transform"
    x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
    x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
    x-transition:leave="transition ease-in duration-200 transform"
    x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
    x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
    @notify.window="dispatchAlert($event.detail.type, $event.detail.message)"
    class="flex items-center w-full p-4 mb-4 rounded-md shadow transition-all transform"
    :class="[
        alertType === 'success' ? 'bg-green-100 dark:bg-green-300 text-green-600 dark:text-green-700' : '',
        alertType === 'error' ? 'bg-red-100 dark:bg-red-300 text-red-600 dark:text-red-700' : '',
    ]"
    role="alert">
    <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8"
      :class="[
          alertType === 'success' ? 'text-green-500 bg-green-100 dark:bg-green-300 dark:text-green-700' : '',
          alertType === 'error' ? 'text-red-500 bg-red-100 dark:bg-red-300 dark:text-red-700' : '',
      ]">
      <template x-if="alertType === 'success'">
        <ion-icon name="checkmark-circle" class="h-5 w-5"></ion-icon>
      </template>
      <template x-if="alertType === 'error'">
        <ion-icon name="close-circle" class="h-5 w-5"></ion-icon>
      </template>
      <span class="sr-only">Alert Icon</span>
    </div>
    <div class="ms-3 text-sm font-medium">
      <span x-text="alertTitle"></span>
    </div>
  </div>
</div>
