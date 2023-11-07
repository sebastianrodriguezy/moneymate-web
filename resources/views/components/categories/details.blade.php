<template x-if="dataDrawer">
  <div class="w-full flex flex-col gap-3 mt-4 leading-4">

    <div class="w-full flex flex-row items-center">
      <p class="text-center font-normal mr-2">ID:</p>
      <p class="text-center font-semibold text-sm" x-text="dataDrawer.id"></p>
    </div>

    <div class="w-full flex flex-row items-center">
      <p class="text-center font-normal mr-2">{{ __('messages.categoriesTableColName') }}:</p>
      <p class="text-center font-semibold text-sm" x-text="dataDrawer.name"></p>
    </div>

    <div class="w-full flex flex-row items-center">
      <p class="text-center font-normal mr-2">{{ __('messages.categoriasTableColColor') }}:</p>
      <div class="flex flex-row items-center">
        <div 
          class="h-4 w-4 rounded-md mr-2"
          :class="transformColorToClass(dataDrawer.color)"
        ></div>
        <span 
          class="text-gray-600 dark:text-gray-300 uppercase text-xs"
          x-text="JSON.parse(dataDrawer.color).name"
        ></span>
      </div>
    </div>

    <div class="w-full flex flex-row items-center">
      <p class="text-center font-normal mr-2">{{ __('messages.movementDateCreated') }}:</p>
      <p class="text-center text-sm" x-text="formatDate(dataDrawer.date, true)"></p>
    </div>

  </div>
</template>