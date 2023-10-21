<template x-if="dataDrawer">
  <div class="w-full flex flex-col gap-3 p-4 mt-4 leading-4 border dark:border-gray-700 rounded-md">

    <div class="w-full flex flex-row items-center">
      <p class="text-center font-normal mr-2">ID:</p>
      <p class="text-center font-semibold text-sm" x-text="dataDrawer.id"></p>
    </div>

    <div class="w-full flex flex-row items-center">
      <p class="text-center font-normal mr-2">{{ __('messages.movementsTableColType') }}:</p>
      <template x-if="dataDrawer.type === 'discharge'">
        <span>{{ __('messages.discharge') }}</span>
      </template>
      <template x-if="dataDrawer.type === 'income'">
        <span>{{ __('messages.income') }}</span>
      </template>
    </div>

    <div class="w-full flex flex-row items-center">
      <p class="text-center font-normal mr-2">{{ __('messages.movementsTableColQuantity') }}:</p>
      <span 
        class="font-lato tracking-wider text-center text-sm"
        :class="dataDrawer.type === 'income' ? 'text-green-600 dark:text-green-400' : 'text-red-600 dark:text-red-400'"
        x-text="formatStringToMoney(dataDrawer.amount, '')"
      ></span>
    </div>

    <div class="w-full flex flex-row items-center">
      <p class="text-center font-normal mr-2">{{ __('messages.movementsTableColCategory') }}:</p>
      <div 
        class="text-xs font-medium px-2.5 py-0.5 rounded-full flex flex-row items-center w-max"
        :class="transformColorToClass(dataDrawer.category.color)"
      >
        <ion-icon 
          name="pricetag"
          class="mr-2 text-gray-200/50 dark:text-gray-200/50" 
        ></ion-icon>
        <span 
          class="text-gray-100 dark:text-gray-200"
          x-text="dataDrawer.category.name"
        ></span>
      </div>
    </div>

    <div class="w-full flex flex-row items-center">
      <p class="text-center font-normal mr-2">{{ __('messages.movementsTableColPerson') }}:</p>
      <span 
        class="bg-gray-100 text-gray-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full dark:bg-gray-700 dark:text-gray-300"
        x-text="dataDrawer.person ? dataDrawer.person : '{{ __('messages.notSpecified') }}'"
      >
      </span>
    </div>

    <div class="w-full flex flex-row items-center">
      <p class="text-center font-normal mr-2">{{ __('messages.movementComments') }}:</p>
      <p class="text-center text-sm" x-text="dataDrawer.comments"></p>
    </div>

    <div class="w-full flex flex-row items-center">
      <p class="text-center font-normal mr-2">{{ __('messages.movementDateMoment') }}:</p>
      <p class="text-center text-sm" x-text="formatDate(dataDrawer.movement_date, false)"></p>
    </div>

    <div class="w-full flex flex-row items-center">
      <p class="text-center font-normal mr-2">{{ __('messages.movementDateCreated') }}:</p>
      <p class="text-center text-sm" x-text="formatDate(dataDrawer.date, true)"></p>
    </div>

  </div>
</template>