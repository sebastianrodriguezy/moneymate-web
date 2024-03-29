<div class="flex flex-col justify-center w-full">
  <p class="label-base">{{ $label }}</p>
  <div x-data="dropdown({{ $catalog }}, {{ $onSelect }})" x-on:keydown.escape.prevent.stop="closeDropdown($refs.button)"
    x-on:focusin.window="!$refs.panel.contains($event.target) && closeDropdown()"
    x-id="['dropdown-button-{{ $id }}']" class="relative w-full">

    <button x-ref="button" x-on:click="isLoadingDropdown ? null : toggleDropdown()" :aria-expanded="openDropdown"
      :aria-controls="$id('dropdown-button-{{ $id }}')" type="button"
      class="flex items-center justify-between bg-gray-200 dark:bg-gray-700 px-5 py-2 rounded-md w-full">
      <template x-if="valueDropdown">
        <span x-text="valueDropdown.label"></span>
      </template>
      <template x-if="!valueDropdown">
        <span>{{ $placeholder }}</span>
      </template>
      <template x-if="openDropdown && !isLoadingDropdown">
        <ion-icon name="chevron-up" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor"></ion-icon>
      </template>
      <template x-if="!openDropdown && !isLoadingDropdown">
        <ion-icon name="chevron-down" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor"></ion-icon>
      </template>
      <template x-if="isLoadingDropdown">
        <div role="status">
          <svg aria-hidden="true"
            class="inline w-4 h-4 mr-2 text-gray-200 animate-spin dark:text-gray-600 fill-brand-600"
            viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
              d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
              fill="currentColor" />
            <path
              d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
              fill="currentFill" />
          </svg>
          <span class="sr-only">{{ __('messages.loading') }}</span>
        </div>
      </template>
    </button>

    <ul x-ref="panel" x-show="openDropdown" x-transition.origin.top.left
      x-on:click.outside="closeDropdown($refs.button)" :id="$id('dropdown-button-{{ $id }}')"
      style="display: none;"
      class="absolute left-0 mt-2 rounded-md bg-gray-200 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 shadow-md w-full z-50 max-h-[200px] overflow-y-auto">
      <template x-for="option in optionsDropdown" :key="option.id">
        <li @click="onClickOptionDropdown(option)"
          class="cursor-pointer flex items-center gap-2 w-full first-of-type:rounded-t-md last-of-type:rounded-b-md px-4 py-2.5 text-left text-sm hover:bg-gray-300/30 disabled:text-gray-500">
          <span x-text="option.label"></span>
        </li>
      </template>
    </ul>

  </div>
</div>
