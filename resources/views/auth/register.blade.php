<x-layouts.auth>

  <x-slot:title>
    {{ __('messages.register_title') }}
  </x-slot>

  <div class="flex flex-col w-full">
    <form method="POST" action="/register">
      @csrf
      <h1 class="title">{{ __('messages.register_description') }}</h1>
      <div class="mb-3">
        <label for="name" class="label-base">{{ __('messages.name_label') }}</label>
        <input type="text" id="name" name="name" class="input-base" placeholder="{{ __('messages.name_placeholder') }}" value="{{ old('name') }}" required />
      </div>
      <div class="mb-3">
        <label for="email" class="label-base">{{ __('messages.email_label') }}</label>
        <input type="email" id="email" name="email" class="input-base" placeholder="email@email.com" value="{{ old('email') }}" required />
      </div>
      <div class="mb-3">
        <label for="password" class="label-base">{{ __('messages.password_label') }}</label>
        <input type="password" id="password" name="password" class="input-base" placeholder="*********" required />
        <p class="ml-2 mt-0.5 text-xs text-gray-500 dark:text-gray-400">{{ __('messages.password_requirements') }}</p>
      </div>
      <div class="mb-3">
        <label for="password_confirm" class="label-base">{{ __('messages.confirm_label') }}</label>
        <input type="password" id="password_confirm" name="password_confirm" class="input-base" placeholder="*********" required />
      </div>
      
      @include('partials.form-errors')
      @include('partials.form-message')

      <input type="submit" value="{{ __('messages.register_action') }}" class="button-b w-full" />
      <div class="flex flex-row items-center leading-4">
        <p class="text-sm mr-2 dark:text-gray-300 text-gray-90">{{ __('messages.have_account') }}</p>
        <a href="/login" title="{{ __('messages.login_title') }}" class="link-b">
          {{ __('messages.login_title') }}
        </a>
      </div>
    </form>
  </div>

</x-layouts.auth>