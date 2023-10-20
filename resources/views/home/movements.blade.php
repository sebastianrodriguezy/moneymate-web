<x-layouts.dashboard :user="$user">

  <x-slot:title>
    {{ __('messages.nav_link_movements') }}
  </x-slot>

  <div class="w-full flex flex-col bg-gray-50 dark:bg-gray-800 p-4 px-6 rounded-md mb-5">
    <h1 class="text-2xl">Aqui el titulo</h1>
  </div>
  
  <x-shared.table :headings="$tableCols" :endpoint="'/movements'">
    <x-slot name="filters">
      <p>Hola que hace</p>
    </x-slot>
    <x-slot name="tableRows">
      <template x-for="row in rows">
        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
          <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white flex flex-row items-center">
            <ion-icon name="arrow-up" class="text-green-500 mr-2"></ion-icon>
            <span class="font-lato tracking-wider" x-text="'$' + row.amount"></span>
          </th>
          <td class="px-6 py-4">
            <template x-if="row.type === 'discharge'"><span>Egreso</span></template>
            <template x-if="row.type === 'income'"><span>Ingreso</span></template>
          </td>
          <td class="px-6 py-4">
            <span class="bg-blue-100 text-blue-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full dark:bg-blue-900 dark:text-blue-300">Abonos</span>
          </td>
          <td class="px-6 py-4">
            <span class="bg-gray-100 text-gray-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full dark:bg-gray-700 dark:text-gray-300">Viviana</span>
          </td>
          <td class="px-6 py-4">
            16/06/2023 - 10:59
          </td>
          <td class="px-6 py-4 flex items-center justify-center">
            <button type="button" title="Ver detalles" class="text-white bg-brand-600 hover:bg-brand-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm p-2.5 text-center inline-flex items-center dark:focus:ring-blue-800">
              <ion-icon name="eye" class="text-gray-100 h-3 w-3" fill="none" viewBox="0 0 14 10"></ion-icon>
              <span class="sr-only">Icon description</span>
            </button>
          </td>
        </tr>
      </template>
    </x-slot>
  </x-shared.table>

</x-layouts.dashboard>