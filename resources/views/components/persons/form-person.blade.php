<div class="w-full flex flex-col gap-3">

  <div class="mb-3">
    <label for="name" class="label-base">{{ __('messages.personsTableColName') }}</label>
    <input type="text" id="name" name="name" class="input-base"
      placeholder="{{ __('messages.personsTableColName') }}" x-model="modalData.name" required />
    <template x-if="modalErrors?.name">
      <p class="mt-0.5 text-sm text-red-600 dark:text-red-500" x-text="modalErrors?.name"></p>
    </template>
  </div>

</div>
