<x-layouts.dashboard :user="$user">

  <x-slot:title>
    {{ __('messages.nav_link_movements') }}
    <p x-text="activeDrawer"></p>
  </x-slot>

  <div class="w-full flex flex-col bg-gray-50 dark:bg-gray-800 p-4 px-6 rounded-md mb-5">
    <h1 class="text-2xl">Aqui el titulo</h1>
  </div>
  
  <x-shared.table 
    :headings="$tableCols" 
    :endpoint="'/movements'"
    :title="__('messages.movementsTableTitle')"
    :description="__('messages.movementsTableDesc')"
  >
    <x-slot name="filters">
      <template x-if="activeDrawer === 'filters'">
        <h1 class="text-2xl">Aqui el titulo</h1>
      </template>
      
      <template x-if="activeDrawer === 'detail'">
        <h1>Aqui van los detalles</h1>
      </template>
    </x-slot>
    <x-slot name="tableRows">
      <template x-for="movement in rows" :key="movement.id">
        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
          <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white flex flex-row items-center">
            <ion-icon 
              :name="movement.type === 'income' ? 'arrow-up' : 'arrow-down'" 
              :class="movement.type === 'income' ? 'text-green-500' : 'text-red-500'"
              class="mr-2" 
            ></ion-icon>
            <span 
              class="font-lato tracking-wider" 
              x-text="formatStringToMoney(movement.amount, movement.type)"
            ></span>
          </th>
          <td class="px-6 py-4">
            <template x-if="movement.type === 'discharge'">
              <span>{{ __('messages.discharge') }}</span>
            </template>
            <template x-if="movement.type === 'income'">
              <span>{{ __('messages.income') }}</span>
            </template>
          </td>
          <td class="px-6 py-4">
            <div 
              class="text-xs font-medium px-2.5 py-0.5 rounded-full flex flex-row items-center w-max"
              :class="transformColorToClass(movement.category.color)"
            >
              <ion-icon 
                name="pricetag"
                class="mr-2 text-gray-200/50 dark:text-gray-200/50" 
              ></ion-icon>
              <span 
                class="text-gray-100 dark:text-gray-200"
                x-text="movement.category.name"
              ></span>
            </div>
          </td>
          <td class="px-6 py-4">
            <template x-if="movement.person">
              <span 
                class="bg-gray-100 text-gray-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full dark:bg-gray-700 dark:text-gray-300"
                x-text="movement.person"
              >
              </span>
            </template>
          </td>
          <td class="px-6 py-4">
            <span x-text="formatDate(movement.movement_date)"></span>
          </td>
          <td class="px-6 py-4">
            <span x-text="formatDate(movement.date, true)"></span>
          </td>
          <td class="px-6 py-4 flex items-center justify-center">
            <button 
              @click="openDrawer('detail', movement, '{{ __('messages.movementDetailsDrawerTitle') }}')" 
              type="button" 
              title="{{ __('messages.buttonSeeDetailsTitle') }}" 
              class="text-white bg-brand-500 hover:bg-brand-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm p-2.5 text-center inline-flex items-center dark:focus:ring-blue-800"
            >
              <ion-icon name="eye" class="text-gray-100 h-3 w-3" fill="none" viewBox="0 0 14 10"></ion-icon>
              <span class="sr-only">{{ __('messages.iconDescription') }}</span>
            </button>
          </td>
        </tr>
      </template>
    </x-slot>
  </x-shared.table>

</x-layouts.dashboard>