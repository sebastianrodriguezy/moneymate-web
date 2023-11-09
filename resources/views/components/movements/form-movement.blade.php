<div class="w-full flex flex-row gap-4">
  <div class="flex-1 flex flex-col">
    <x-shared.dropdown catalog="'types'" :label="__('messages.movementsTableColType')" :placeholder="__('messages.selectTypePlaceholder')" id="type"
      onSelect="(value) => updateModalData('type', value.id)"></x-shared.dropdown>
    <x-shared.dropdown catalog="'categories'" :label="__('messages.movementsTableColCategory')" :placeholder="__('messages.selectCategoryPlaceholder')" id="category"
      onSelect="(value) => updateModalData('category_id', value.id)"></x-shared.dropdown>
    <x-shared.dropdown catalog="'persons'" :label="__('messages.movementsTableColPerson')" :placeholder="__('messages.selectPersonPlaceholder')" id="person"
      onSelect="(value) => updateModalData('person_id', value.id)"></x-shared.dropdown>
  </div>

  <div class="flex-1 flex flex-col">
    <div class="mb-3">
      <label for="amount" class="label-base">{{ __('messages.movementsTableColQuantity') }}</label>
      <input type="text" id="amount" name="amount" class="input-base" x-mask:dynamic="$money($input)"
        placeholder="1,000" x-model="modalData.amount" required />
    </div>
    <div class="mb-3">
      <label for="movment_date" class="label-base">{{ __('messages.movementDateMoment') }}</label>
      <input type="text" id="movment_date" name="movment_date" class="input-base" x-mask="99/99/9999"
        placeholder="DD/MM/YYYY" x-model="modalData.movement_date" required />
    </div>
    <div class="mb-3">
      <label for="comments" class="label-base">{{ __('messages.movementComments') }}</label>
      <textarea id="comments" name="comments" rows="4" x-model="modalData.comments"
        class="focus:!outline-none block resize-none p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-md border border-gray-300 focus:ring-brand-500 focus:border-brand-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-brand-500 dark:focus:border-brand-500"
        placeholder="Comentarios adicionales..."></textarea>
    </div>
  </div>
</div>
