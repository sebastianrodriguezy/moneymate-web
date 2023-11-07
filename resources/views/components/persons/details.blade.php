<template x-if="dataDrawer">
  <div class="w-full flex flex-col gap-3 mt-4 leading-4">

    <div class="w-full flex flex-row items-center">
      <p class="text-center font-normal mr-2">ID:</p>
      <p class="text-center font-semibold text-sm" x-text="dataDrawer.id"></p>
    </div>

    <div class="w-full flex flex-row items-center">
      <p class="text-center font-normal mr-2">{{ __('messages.personsTableColName') }}:</p>
      <p class="text-center font-semibold text-sm" x-text="dataDrawer.name"></p>
    </div>

    <div class="w-full flex flex-row items-center">
      <p class="text-center font-normal mr-2">{{ __('messages.movementDateCreated') }}:</p>
      <p class="text-center text-sm" x-text="formatDate(dataDrawer.date, true)"></p>
    </div>

  </div>
</template>