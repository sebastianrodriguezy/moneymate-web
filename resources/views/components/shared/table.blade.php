<div {{ $attributes }}
  class="relative overflow-x-auto rounded-md w-full bg-gray-50 dark:bg-gray-800 text-gray-700 dark:text-gray-300"
  x-data="table('{{ $endpoint }}')">

  <div class="w-full p-5 flex flex-row items-center">

    <div class="flex flex-col leading-4">
      <div class="flex flex-row items-center gap-2">
        <h2 class="text-lg font-semibold">{{ $title }}</h2>
        <template x-if="loading">
          <div role="status">
            <svg aria-hidden="true"
              class="inline w-4 h-4 mr-2 text-gray-200 animate-spin dark:text-gray-600 fill-brand-600"
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
      <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">{{ $description }}</p>
    </div>

    <x-shared.drawer class="ml-auto">
      <x-slot:trigger>
        @if ($showButtonFilters)
          <button @click="openDrawer('filters', null, '{{ __('messages.filtersDrawerTitle') }}')" type="button"
            class="transition text-brand-500 hover:text-white border border-brand-600 hover:bg-brand-500 focus:ring-4 focus:outline-none focus:ring-brand-300 font-medium rounded-md text-sm px-5 py-2 text-center dark:border-brand-500 dark:text-brand-500 dark:hover:text-white dark:hover:bg-brand-500 dark:focus:ring-brand-800">
            <ion-icon name="filter" class="w-3.5 h-3.5 mr-2" aria-hidden="true"></ion-icon>
            {{ __('messages.filtersTitle') }}
          </button>
        @endif
      </x-slot:trigger>

      {{ $filters }}
    </x-shared.drawer>

  </div>

  <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
    <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
      <tr>
        @if (count($headings) > 0)
          @foreach ($headings as $heading)
            <th scope="col" class="px-6 py-3">
              {{ $heading }}
            </th>
          @endforeach
        @endif
        <th scope="col" class="px-6 py-3 text-center">
          Acciones
        </th>
      </tr>
    </thead>
    <tbody>

      <template x-if="rows.length === 0 && !loading">
        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
          <th colspan="7" class="px-6 py-4 font-normal text-gray-900 whitespace-nowrap dark:text-white text-center">
            {{ __('messages.tableResultsNotFound') }}
          </th>
        </tr>
      </template>

      <template x-if="rows.length === 0 && loading">
        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
          <th colspan="7" class="px-6 py-4 font-normal text-gray-900 whitespace-nowrap dark:text-white text-center">
            <div class="w-full flex flex-row items-center justify-center">
              <div role="status" class="mr-2">
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
              <span>Obteniendo resultados</span>
            </div>
          </th>
        </tr>
      </template>

      {{ $tableRows }}

    </tbody>
  </table>

  <nav class="flex items-center justify-between p-5" aria-label="Table navigation">
    <span class="text-sm font-normal text-gray-500 dark:text-gray-400">
      {{ __('messages.paginationShowing') }}
      <span class="font-semibold text-gray-900 dark:text-white">
        <span x-text="rowsShowing"></span> - <span x-text="totalRowsShowing"></span>
      </span>
      {{ __('messages.paginationOf') }}
      <span class="font-semibold text-gray-900 dark:text-white" x-text="count"></span>
    </span>
    <ul class="inline-flex -space-x-px text-sm h-8">
      <li>
        <button
          class="flex items-center justify-center px-3 h-8 ml-0 leading-tight bg-white border border-gray-300 rounded-l-lg dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400"
          :class="page === 1 ? 'text-gray-300 dark:text-gray-500 cursor-default' :
              'text-gray-500 dark:hover:bg-gray-700 dark:hover:text-white hover:bg-gray-100 hover:text-gray-700'"
          @click="changePage(page - 1)">
          {!! __('pagination.previous') !!}
        </button>
      </li>
      <template x-for="item in paginate({ current: page, max: totalPages }).items">
        <li>
          <button
            :class="[
                (!item ? 'text-gray-300 dark:text-gray-500' :
                    'text-gray-500 bg-white hover:bg-gray-100 dark:bg-gray-800 dark:text-gray-400 hover:text-gray-700 dark:hover:bg-gray-700 dark:hover:text-white'
                ),
                (page === item ?
                    '!text-brand-600 !bg-brand-100 hover:!text-brand-700 hover:!bg-brand-200 dark:!text-brand-400 dark:!bg-brand-800 hover:dark:!bg-brand-900 hover:dark:!text-brand-500' :
                    '')
            ]"
            class="flex items-center justify-center px-3 h-8 leading-tight border border-gray-300 dark:border-gray-700"
            x-text="item ? item : '...'" x-bind:disabled="!item" @click="changePage(item)"></button>
        </li>
      </template>
      <li>
        <button
          class="flex items-center justify-center px-3 h-8 leading-tight bg-white border border-gray-300 rounded-r-lg dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400"
          :class="page === totalPages ? 'text-gray-300 dark:text-gray-500 cursor-default' :
              'text-gray-500 dark:hover:bg-gray-700 dark:hover:text-white hover:bg-gray-100 hover:text-gray-700'"
          @click="changePage(page + 1)">
          {!! __('pagination.next') !!}
        </button>
      </li>
    </ul>
  </nav>

</div>
