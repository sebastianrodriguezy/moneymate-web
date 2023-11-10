<div class="w-full flex flex-row gap-4">
  <div class="flex-1 flex flex-col">
    <div class="mb-3">
      <x-shared.dropdown catalog="'types'" :label="__('messages.movementsTableColType')" :placeholder="__('messages.selectTypePlaceholder')" id="type"
        onSelect="(value) => updateModalData('type', value.id)"></x-shared.dropdown>
      <template x-if="modalErrors?.type">
        <p class="mt-0.5 text-sm text-red-600 dark:text-red-500" x-text="modalErrors?.type"></p>
      </template>
    </div>
    <div class="mb-3">
      <x-shared.dropdown catalog="'categories'" :label="__('messages.movementsTableColCategory')" :placeholder="__('messages.selectCategoryPlaceholder')" id="category"
        onSelect="(value) => updateModalData('category_id', value.id)"></x-shared.dropdown>
      <template x-if="modalErrors?.fk_category_id">
        <p class="mt-0.5 text-sm text-red-600 dark:text-red-500" x-text="modalErrors?.fk_category_id"></p>
      </template>
    </div>
    <div class="mb-3">
      <x-shared.dropdown catalog="'persons'" :label="__('messages.movementsTableColPerson')" :placeholder="__('messages.selectPersonPlaceholder')" id="person"
        onSelect="(value) => updateModalData('person_id', value.id)"></x-shared.dropdown>
      <template x-if="modalErrors?.fk_person_id">
        <p class="mt-0.5 text-sm text-red-600 dark:text-red-500" x-text="modalErrors?.fk_person_id"></p>
      </template>
    </div>
  </div>

  <div class="flex-1 flex flex-col">
    <div class="mb-3">
      <label for="amount" class="label-base">{{ __('messages.movementsTableColQuantity') }}</label>
      <input type="text" id="amount" name="amount" class="input-base" x-mask:dynamic="$money($input)"
        placeholder="1,000" x-model="modalData.amount" required />
      <template x-if="modalErrors?.amount">
        <p class="mt-0.5 text-sm text-red-600 dark:text-red-500" x-text="modalErrors?.amount"></p>
      </template>
    </div>
    <div class="mb-3">
      <label for="movement_date" class="label-base">{{ __('messages.movementDateMoment') }}</label>
      <input type="text" id="movement_date" name="movement_date" class="input-base" x-mask="99/99/9999"
        placeholder="DD/MM/YYYY" x-model="modalData.movement_date" required />
      <template x-if="modalErrors?.movement_date">
        <p class="mt-0.5 text-sm text-red-600 dark:text-red-500" x-text="modalErrors?.movement_date"></p>
      </template>
    </div>
    <div class="mb-3">
      <label for="comments" class="label-base">{{ __('messages.movementComments') }}</label>
      <textarea id="comments" name="comments" rows="4" x-model="modalData.comments"
        class="focus:!outline-none block resize-none p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-md border border-gray-300 focus:ring-brand-500 focus:border-brand-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-brand-500 dark:focus:border-brand-500"
        placeholder="Comentarios adicionales..."></textarea>
      <template x-if="modalErrors?.comments">
        <p class="mt-0.5 text-sm text-red-600 dark:text-red-500" x-text="modalErrors?.comments"></p>
      </template>
    </div>
  </div>
</div>
