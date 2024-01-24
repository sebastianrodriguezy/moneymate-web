<div class="w-full max-h-[280px] overflow-y-auto overflow-x-hidden">
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
      <div
        class="w-full flex flex-row  items-center gap-3 rounded-t-md hover:bg-slate-100 border-b dark:border-b-gray-700 dark:hover:bg-gray-700 p-3">
        <ion-icon name="pricetag" class="mr-2 text-teal-500/80"></ion-icon>
        <span x-text="category.name"></span>

        <span class="ml-auto" x-text="formatDate(category.date)"></span>
      </div>
    </template>
  </div>
</div>
