<div class="w-full max-h-[250px] overflow-y-auto overflow-x-hidden">
  <div class="w-full py-4 text-gray-900 dark:text-white">

    <template x-if="!dataCalc && !isLoadingCalc && errorInCalc">
      <p class="text-center mt-10 px-5">
        {{ __('messages.homeCardsError') }}: <span class="text-red-600 dark:text-red-400" x-text="errorInCalc"></span>
      </p>
    </template>

    <template x-if="dataCalc && !isLoadingCalc && dataCalc.totalRows === 0">
      <p class="text-center mt-10 px-5">{{ __('messages.categoriesCardsNoResults') }}</p>
    </template>

    <template x-for="category in dataCalc?.rows || []">
      <div class="w-full flex flex-row  items-center gap-3 rounded-md bg-slate-100 dark:bg-gray-700 mb-3 p-3">
        <ion-icon name="pricetag" class="mr-2 text-gray-300/50 dark:text-gray-200/50"></ion-icon>
        <span x-text="category.name"></span>

        <span class="ml-auto" x-text="formatDate(category.date)"></span>
      </div>
    </template>
  </div>
</div>
