<x-layouts.dashboard :user="$user">

  <x-slot:title>
    {{ __('messages.nav_link_categories') }}
  </x-slot>

  <div
    class="w-full flex flex-col bg-gray-50 dark:bg-gray-800 p-4 px-6 rounded-md mb-5 text-gray-700 dark:text-gray-300">
    <div class="flex flex-row items-center justify-between">
      <h1 class="text-xl font-semibold">{{ __('messages.nav_link_categories') }}</h1>

      <x-shared.modal>
        <x-slot name="trigger">
          <button @click="openModal('new_category')" type="button"
            class="transition text-white bg-brand-500 hover:bg-brand-600 focus:ring-4 focus:ring-brand-300 font-medium rounded-md text-sm px-5 py-2 dark:bg-brand-600 dark:hover:bg-brand-700 focus:outline-none dark:focus:ring-brand-800">
            {{ __('messages.nav_link_new_category') }}
          </button>
        </x-slot>

        <x-categories.form-category></x-categories.form-category>
      </x-shared.modal>

    </div>
  </div>

  <x-shared.table :headings="$tableCols" :endpoint="'/categories'" :title="__('messages.categoriesTableTitle')" :description="__('messages.categoriesTableSubtitle')" :showButtonFilters="false"
    limit="10">
    <x-slot name="filters">
      <template x-if="activeDrawer === 'detail'">
        <x-categories.details></x-categories.details>
      </template>
    </x-slot>

    <x-slot name="tableRows">
      <template x-for="category in rows" :key="category.id">
        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
          <td class="px-6 py-4 text-gray-90/60 whitespace-nowrap dark:text-white/60 flex flex-row items-center">
            <span x-text="category.id"></span>
          </td>
          <td class="px-6 py-4">
            <div class="flex flex-row items-center">
              <ion-icon name="pricetag" class="mr-2 text-gray-200/50 dark:text-gray-200/50"></ion-icon>
              <span x-text="category.name"></span>
            </div>
          </td>
          <td class="px-6 py-4">
            <div class="flex flex-row items-center">
              <div class="h-4 w-4 rounded-md mr-2" :class="transformColorToClass(category.color)"></div>
              <span class="text-gray-600 dark:text-gray-300 uppercase text-xs"
                x-text="JSON.parse(category.color).name"></span>
            </div>
          </td>
          <td class="px-6 py-4">
            <span x-text="formatDate(category.date, true)"></span>
          </td>
          <td class="px-6 py-4 flex items-center justify-center">
            <button @click="openDrawer('detail', category, '{{ __('messages.categoriesDetailTitle') }}')" type="button"
              title="{{ __('messages.buttonSeeDetailsTitle') }}"
              class="text-white bg-brand-500 hover:bg-brand-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm p-2.5 text-center inline-flex items-center dark:focus:ring-blue-800">
              <ion-icon name="eye" class="text-gray-100 h-3 w-3" fill="none" viewBox="0 0 14 10"></ion-icon>
              <span class="sr-only">{{ __('messages.iconDescription') }}</span>
            </button>
          </td>
        </tr>
      </template>
    </x-slot>
  </x-shared.table>

</x-layouts.dashboard>
