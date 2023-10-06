<x-layouts.auth>

  <x-slot:title>
    {{ __('messages.login_title') }}
  </x-slot>

  <div class="flex flex-col w-full">
    <form method="POST" action="/authenticate">
      @csrf
      <h1 class="title">{{ __('messages.login_description') }}</h1>
      <div class="mb-6">
        <label for="email" class="label-base">{{ __('messages.email_label') }}</label>
        <input type="email" id="email" name="email" value="{{ $remember_user ? $remember_user : '' }}" class="input-base" placeholder="email@email.com" required />
      </div>
      <div class="mb-6">
        <label for="password" class="label-base">{{ __('messages.password_label') }}</label>
        <input type="password" id="password" name="password" class="input-base" placeholder="*********" required />
      </div>
      <div class="flex flex-row items-center justify-between mb-6">
        <div class="flex items-start">
          <div class="flex items-center h-5">
            <input id="remember_user" name="remember_user" type="checkbox" {{ $remember_user ? 'checked' : '' }} class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 text-brand-500" />
          </div>
          <label for="remember_user" class="ml-2 text-sm font-medium dark:text-gray-300 text-gray-900">{{ __('messages.remember_user') }}</label>
        </div>
        <a href="/recovery-password" title="{{ __('messages.forgot_password') }}" class="link-b">
          {{ __('messages.forgot_password') }}
        </a>
      </div>

      @include('partials.form-errors')
      @include('partials.form-message')

      <input type="submit" value="{{ __('messages.login_title') }}" class="button-b w-full" />
      <div class="flex flex-row items-center leading-4">
        <p class="text-sm mr-2 dark:text-gray-300 text-gray-90">{{ __('messages.no_account_yet') }}</p>
        <a href="/register" title="{{ __('messages.register') }}" class="link-b">
          {{ __('messages.register') }}
        </a>
      </div>
    </form>
  </div>

</x-layouts.auth>