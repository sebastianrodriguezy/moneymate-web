<div class="w-full max-h-[280px] overflow-y-auto overflow-x-hidden">
  <div class="w-full py-4 text-gray-900 dark:text-white">

    <template x-if="!dataCalc && !isLoadingCalc && errorInCalc">
      <p class="text-center mt-10 px-5">
        {{ __('messages.homeCardsError') }}: <span class="text-red-600 dark:text-red-400" x-text="errorInCalc"></span>
      </p>
    </template>

    <template x-if="dataCalc && !isLoadingCalc && dataCalc.totalRows === 0">
      <p class="text-center mt-10 px-5">{{ __('messages.movementsCardsNoResults') }}</p>
    </template>

    <template x-for="movement in dataCalc?.rows || []">
      <div
        class="w-full flex flex-row items-center gap-3 rounded-t-md hover:bg-slate-100 border-b dark:border-b-gray-700 dark:hover:bg-gray-700 p-3">
        <ion-icon x-bind:name="movement.type === 'income' ? 'arrow-up' : 'arrow-down'"
          x-bind:class="movement.type === 'income' ? 'text-green-500' : 'text-red-500'"></ion-icon>
        <span class="font-lato tracking-wider" x-text="formatStringToMoney(movement.amount, movement.type)"></span>

        <template x-if="movement.type === 'discharge'">
          <span class="ml-auto">{{ __('messages.discharge') }}</span>
        </template>
        <template x-if="movement.type === 'income'">
          <span class="ml-auto">{{ __('messages.income') }}</span>
        </template>

        <span class="ml-3" x-text="formatDate(movement.movement_date)"></span>
      </div>
    </template>
  </div>
</div>
