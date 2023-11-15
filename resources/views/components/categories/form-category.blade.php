<div class="w-full flex flex-col gap-3">


  <div class="mb-3">
    <label for="name" class="label-base">{{ __('messages.categoriesTableColName') }}</label>
    <input type="text" id="name" name="name" class="input-base"
      placeholder="{{ __('messages.categoriesTableColName') }}" x-model="modalData.name" required />
    <template x-if="modalErrors?.name">
      <p class="mt-0.5 text-sm text-red-600 dark:text-red-500" x-text="modalErrors?.name"></p>
    </template>
  </div>

  <div class="mb-3">
    <label for="color" class="label-base">{{ __('messages.categoriesTableColColor') }}</label>
    <div class="flex flex-row items-center gap-3 flex-wrap">
      <template x-for="color in getColorsToSelect()" :key="color.name">
        <button @click="updateModalData('color', color.jsonObject)"
          class="h-10 w-10 rounded-md border-none transition hover:scale-105 hover:ring-4 hover:ring-gray-800 dark:hover:ring-gray-300"
          :class="[color.class, color.jsonObject?.name === modalData.color?.name ? 'ring-4 ring-gray-800 dark:ring-gray-300' :
              ''
          ]"></button>
      </template>
    </div>
  </div>

</div>
