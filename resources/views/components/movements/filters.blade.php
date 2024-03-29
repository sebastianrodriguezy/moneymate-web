<div class="w-full mt-2 flex flex-col gap-3">
  <x-shared.dropdown catalog="'categories'" :label="__('messages.movementsTableColCategory')" :placeholder="__('messages.selectCategoryPlaceholder')" id="category"
    onSelect="(value) => updateFilters('category_id', value.id)"></x-shared.dropdown>
  <x-shared.dropdown catalog="'persons'" :label="__('messages.movementsTableColPerson')" :placeholder="__('messages.selectPersonPlaceholder')" id="person"
    onSelect="(value) => updateFilters('person_id', value.id)"></x-shared.dropdown>
  <x-shared.dropdown catalog="'types'" :label="__('messages.movementsTableColType')" :placeholder="__('messages.selectTypePlaceholder')" id="type"
    onSelect="(value) => updateFilters('type', value.id)"></x-shared.dropdown>

  <div class="w-full mt-6 flex flex-row gap-2 items-center justify-end">
    <button type="button"
      class="transition text-gray-900 bg-gray-100 border border-gray-300 focus:outline-none hover:bg-gray-200 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700"
      @click="() => { 
        closeDrawer(); 
        clearFilters();
      }">
      {{ __('messages.eraseFiltersButton') }}
    </button>
    <button type="button"
      class="transition text-white bg-brand-500 hover:bg-brand-600 focus:ring-4 focus:ring-brand-300 font-medium rounded-md text-sm px-5 py-2.5 dark:bg-brand-600 dark:hover:bg-brand-700 focus:outline-none dark:focus:ring-brand-800"
      @click="() => { 
        closeDrawer(); 
        applyFilters();
      }">
      {{ __('messages.filtersDrawerTitle') }}
    </button>
  </div>
</div>
