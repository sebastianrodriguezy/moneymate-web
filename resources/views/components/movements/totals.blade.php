<div class="flex flex-col w-full max-h-full h-full items-center justify-center overflow-y-auto gap-4">
  <div class="flex flex-col items-center justify-center -mt-10">
    <div class="flex flex-row items-center justify-center">
      <ion-icon name="arrow-up" class="text-green-500 h-10 w-10 mr-4"></ion-icon>
      <p class="text-3xl text-gray.800 dark:text-gray-300" x-text="formatToReadableNumber(dataCalc?.totalIncome || 0)">
      </p>
    </div>
    <p class="text-gray-600 dark:text-gray-400 text-sm">{{ __('messages.totalsHomeIncome') }}</p>
  </div>
  <div class="flex flex-col items-center justify-center">
    <div class="flex flex-row items-center justify-center">
      <ion-icon name="arrow-down" class="text-red-500 h-10 w-10 mr-4"></ion-icon>
      <p class="text-3xl text-gray.800 dark:text-gray-300"
        x-text="formatToReadableNumber(dataCalc?.totalDischarge || 0)"></p>
    </div>
    <p class="text-gray-600 dark:text-gray-400 text-sm">{{ __('messages.totalsHomeDischarge') }}</p>
  </div>
</div>
