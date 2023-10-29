<div class="w-full mt-2">
  <x-shared.dropdown
    catalog="'categories'"
    label="Categorias"
    placeholder="Selecciona una categoria"
    id="category"
    onSelect="(value) => updateFilters('category_id', value.id)"
  ></x-shared.dropdown>
  <x-shared.dropdown
    catalog="'persons'"
    label="Personas"
    placeholder="Selecciona una persona"
    id="person"
    onSelect="(value) => updateFilters('person_id', value.id)"
  ></x-shared.dropdown>
  <x-shared.dropdown
    catalog="'types'"
    label="Tipo"
    placeholder="Selecciona un tipo"
    id="type"
    onSelect="(value) => updateFilters('type', value.label)"
  ></x-shared.dropdown>

  <div class="w-full mt-6 flex flex-row gap-2 items-center justify-end">
    <button
      type="button" 
      class="transition text-white bg-brand-500 hover:bg-brand-600 focus:ring-4 focus:ring-brand-300 font-medium rounded-md text-sm px-5 py-2.5 dark:bg-brand-600 dark:hover:bg-brand-700 focus:outline-none dark:focus:ring-brand-800"
      @click="() => { 
        closeDrawer(); 
        clearFilters();
      }"
    >
      Eliminar filtros
    </button>
    <button
      type="button" 
      class="transition text-white bg-brand-500 hover:bg-brand-600 focus:ring-4 focus:ring-brand-300 font-medium rounded-md text-sm px-5 py-2.5 dark:bg-brand-600 dark:hover:bg-brand-700 focus:outline-none dark:focus:ring-brand-800"
      @click="() => { 
        closeDrawer(); 
        applyFilters();
      }"
    >
      Aplicar filtros
    </button>
  </div>
</div>