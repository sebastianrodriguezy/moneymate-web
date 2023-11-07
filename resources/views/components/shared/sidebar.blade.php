<aside class="w-full max-w-[280px] bg-gray-50 dark:bg-gray-800 p-6 flex flex-col text-gray-700 dark:text-gray-100">
  
  <input type="hidden" name="user_id" id="user_id" value="{{ $user->user_id }}">
  <input type="hidden" name="user_token" id="user_token" value="{{ request()->cookie('auth_token') }}">
  
  <a href="home" title="{{ __('messages.home_title') }}" class="flex w-full justify-center">
    <figure class="max-w-[150px] w-full mb-2 text-left">
      <img id="logo" alt="{{ __('messages.alt_logo') }}" x-data x-bind:src="$store.darkMode.logo"  />
    </figure>
  </a>

  <form class="flex items-center my-4">
    @csrf
    <label for="search-categories" class="sr-only">{{ __('messages.search_category_sr') }}</label>
    <div class="relative w-full">
      <div class="absolute inset-y-0 left-0 flex items-center pl-2 pointer-events-none">
        <ion-icon name="albums" class="text-gray-600 dark:text-gray-300"></ion-icon>
      </div>
      <input type="search" id="search-categories" autocomplete="off" spellcheck="false" class="focus:outline-none bg-gray-200 text-gray-600 placeholder-gray-500 border-none text-sm rounded-md focus:ring-brand-500 focus:border-brand-500 block w-full pl-7 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="{{ __('messages.search_category_placeholder') }}">
    </div>
  </form>

  <div class="flex flex-col items-center w-full my-6">
    <a href="user" title="{{ __('messages.user_profile_title') }}" class="flex w-full justify-center mb-6">
      <figure class="w-full max-w-[80px] h-full max-h-[80px] overflow-hidden rounded-full">
        <img alt="{{ __('messages.user_profile_avatar_alt') }}" width="100%" src="https://img.freepik.com/free-vector/businessman-character-avatar-isolated_24877-60111.jpg?w=826&t=st=1696908592~exp=1696909192~hmac=d7d24f9b3e05db4c770af7687d87447681a6ac87ce56ed6b986b326200fccbc8" />
      </figure>
    </a>
    <p class="leading-4 font-semibold mb-2 text-center">{{ $user->name }}</p>
    <p class="leading-4 font-extralight text-sm text-gray-500 dark:text-gray-400">{{ $user->email }}</p>
  </div>
  
  <div class="inline-flex px-6" role="group">
      <button @click="await $store.darkMode.toggle()" type="button" class="inline-flex items-center px-4 py-2 text-sm font-medium bg-gray-100 border border-gray-300 group rounded-l-md hover:bg-gray-200 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
        <ion-icon name="sunny" class="text-gray-500 dark:text-gray-300 w-5 h-5 group-hover:text-brand-500"></ion-icon>
      </button>
      <button x-data="lang('{{ app()->getLocale() }}')" x-bind="trigger" type="button" class="inline-flex items-center px-4 py-2 text-sm font-medium bg-gray-100 border border-gray-300 group hover:bg-gray-200 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
        <ion-icon name="globe" class="text-gray-500 dark:text-gray-300 w-5 h-5 group-hover:text-brand-500"></ion-icon>
        <span class="font-bold text-gray-500 dark:text-gray-300 group-hover:text-brand-500 leading-4 text-[15px] ml-1" x-text="lang"></span>
      </button>
      <form action="/logout" method="POST" class="w-full inline-flex">
        @csrf
        <button type="submit" class="inline-flex items-center px-4 py-2 text-sm font-medium bg-gray-100 border border-gray-300 group rounded-r-md hover:bg-gray-200 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
          <ion-icon name="log-out" class="text-gray-500 dark:text-gray-300 w-5 h-5 group-hover:text-brand-500"></ion-icon>
        </button>
      </form>
  </div>
  
  <div class="my-6 w-full h-[1px] border-b border-gray-300 dark:border-gray-600"></div>

  <div class="h-full overflow-y-auto">
    <ul class="space-y-2 font-medium">
      @foreach ($getNavItems() as $item)
        @if ($item['active'])
          <li>
            <a href="{{ $item['to'] }}" class="flex items-center p-2 text-brand-600 rounded-md dark:text-brand-500 hover:bg-brand-500/10 dark:hover:bg-gray-700 group">
              <ion-icon name="{{ $item['icon'] }}" class="w-5 h-5 text-brand-600 transition duration-75 dark:text-brand-500" fill="currentColor" viewBox="0 0 22 21"></ion-icon>
              <span class="flex-1 ml-3 font-semibold">{{ $item['text'] }}</span>
            </a>
          </li>
        @else
          <li>
            <a href="{{ $item['to'] }}" class="flex items-center p-2 text-gray-700 rounded-md dark:text-white hover:bg-brand-500/10 dark:hover:bg-gray-700 group">
              <ion-icon name="{{ $item['icon'] }}" class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-800 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 22 21"></ion-icon>
              <span class="flex-1 ml-3">{{ $item['text'] }}</span>
            </a>
          </li>
        @endif
      @endforeach
    </ul>

    <div class="flex flex-col gap-2 border-b border-gray-300 dark:border-gray-600 pb-1 mt-6 mb-3">
      <p class="leading-4 text-sm text-gray-400">{{ __('messages.nav_additional_items_ittle') }}</p>
    </div>

    <ul class="space-y-2 font-semibold">
      @foreach ($getQuickAccessItems() as $item)
        <li>
          <a href="{{ $item['to'] }}" class="flex items-center px-2 py-1 text-gray-700 dark:text-white group">
            <div class="inline-flex mr-3 w-4 h-4 rounded-md {{ $item['color'] === 'brand' ? 'bg-brand-400' : ($item['color'] === 'teal' ? 'bg-teal-400' : 'bg-violet-400') }}"></div>
            <span class="transition flex-1 group-hover:underline">{{ $item['text'] }}</span>
          </a>
      </li>
      @endforeach
    </ul>
  </div>

</aside>