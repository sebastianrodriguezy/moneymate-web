<div {{ $attributes }}>
  {{ $trigger }}

  <div x-show="showModal" class="fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title" role="dialog"
    aria-modal="true">
    <div class="flex items-center justify-center min-h-screen px-4 text-center sm:p-0">
      <div x-cloak @click="closeModal()" x-show="showModal" x-transition:enter="transition ease-out duration-300 transform"
        x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-200 transform" x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0" class="fixed inset-0 transition-opacity bg-black bg-opacity-80"
        aria-hidden="true"></div>

      <div x-cloak x-show="showModal" x-transition:enter="transition ease-out duration-300 transform"
        x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
        x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
        x-transition:leave="transition ease-in duration-200 transform"
        x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
        x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
        class="w-full p-5 overflow-hidden text-left transition-all transform bg-gray-50 dark:bg-gray-800 rounded-md shadow-xl 2xl:max-w-2xl"
        :class="modalSize === '2xl' ? 'max-w-2xl' : 'max-w-md'">
        <div class="flex items-center justify-between space-x-4">
          <h2 class="text-xl font-medium text-gray-800 dark:text-gray-200" x-text="titleModal"></h2>

          <button @click="closeModal()">
            <ion-icon name="close" class="h-5 w-5"></ion-icon>
          </button>
        </div>

        <p class="mt-2 text-sm text-gray-500 dark:text-gray-300" x-text="subtitleModal"></p>

        <div class="mt-5">
          {{ $slot }}
        </div>

        <div class="flex flex-row items-center justify-end mt-6">
          <button type="button"
            class="text-white bg-brand-500 hover:bg-brand-600 focus:ring-4 focus:ring-brand-300 font-medium rounded-md text-sm px-5 py-2 mr-3 dark:bg-brand-600 dark:hover:bg-brand-700 focus:outline-none dark:focus:ring-brand-800 flex flex-row items-center gap-2">
            <ion-icon name="save" class="h-4 w-4"></ion-icon>
            <span>Guardar</span>
          </button>
          <button @click="closeModal()" type="button"
            class="text-gray-900 bg-gray-50 border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-md text-sm px-5 py-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">{{ __('messages.modalCancelButton') }}</button>
        </div>

      </div>
    </div>
  </div>
</div>
