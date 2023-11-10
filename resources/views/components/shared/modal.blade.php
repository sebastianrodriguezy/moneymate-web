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
          <div class="flex flex-row items-center gap-3">
            <h2 class="text-xl font-medium text-gray-800 dark:text-gray-200" x-text="titleModal"></h2>
            <template x-if="isSendingData">
              <div role="status">
                <svg aria-hidden="true"
                  class="inline w-4 h-4 text-gray-200 animate-spin dark:text-gray-600 fill-brand-600"
                  viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path
                    d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                    fill="currentColor" />
                  <path
                    d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                    fill="currentFill" />
                </svg>
                <span class="sr-only">{{ __('messages.loading') }}</span>
              </div>
            </template>
          </div>

          <button @click="closeModal()">
            <ion-icon name="close" class="h-5 w-5"></ion-icon>
          </button>
        </div>

        <p class="mt-2 text-sm text-gray-500 dark:text-gray-300" x-text="subtitleModal"></p>

        <div class="mt-5">
          {{ $slot }}
        </div>

        <div class="flex flex-row items-center justify-end mt-6">
          <button @click="sendData()" type="button"
            :class="isSendingData ?
                'text-white bg-brand-400 dark:bg-brand-500 cursor-not-allowed font-medium rounded-md text-sm px-5 py-2 text-center mr-3 flex flex-row items-center gap-2' :
                'text-white bg-brand-500 hover:bg-brand-600 focus:ring-4 focus:ring-brand-300 font-medium rounded-md text-sm px-5 py-2 mr-3 dark:bg-brand-600 dark:hover:bg-brand-700 focus:outline-none dark:focus:ring-brand-800 flex flex-row items-center gap-2'">
            <template x-if="!isSendingData">
              <ion-icon name="save" class="h-4 w-4"></ion-icon>
            </template>

            <template x-if="isSendingData">
              <div role="status" class="inline-flex">
                <svg aria-hidden="true" class="inline w-4 h-4 text-gray-200 animate-spin fill-gray-200"
                  viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path
                    d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                    fill="currentColor" />
                  <path
                    d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                    fill="currentFill" />
                </svg>
                <span class="sr-only">{{ __('messages.loading') }}</span>
              </div>
            </template>
            <span>{{ __('messages.modalSaveButton') }}</span>
          </button>
          <button @click="closeModal()" type="button"
            :class="isSendingData ?
                'text-gray-900 bg-gray-100 dark:bg-gray-700 cursor-not-allowed font-medium rounded-md text-sm px-5 py-2 text-center' :
                'text-gray-900 bg-gray-50 border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-md text-sm px-5 py-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700'">{{ __('messages.modalCancelButton') }}</button>
        </div>

      </div>
    </div>
  </div>
</div>
