<x-layouts.auth>

  <x-slot:title>
    {{ __('messages.recovery_pass_title') }}
  </x-slot>

  <div class="flex flex-col w-full">
    <form method="POST" action="/recovery-password">
      @csrf
      <h1 class="title">{{ __('messages.recovery_pass_description') }}</h1>
      <div class="mb-6">
        <label for="email" class="label-base">{{ __('messages.email_label') }}</label>
        <input type="email" id="email" name="email" value="{{ old('email') }}" class="input-base" placeholder="email@email.com" required />
        <p class="ml-2 mt-0.5 text-xs text-gray-500 dark:text-gray-400">{{ __('messages.recovery_pass_helper_text') }}</p>
      </div>

      @include('partials.form-errors')
      @include('partials.form-message')
      
      <input type="submit" value="{{ __('messages.recovery_pass_action') }}" class="button-b w-full" />
      <div class="flex flex-row items-center leading-4">
        <p class="text-sm mr-2 dark:text-gray-300 text-gray-90">{{ __('messages.find_password') }}</p>
        <a href="/login" title="{{ __('messages.login_title') }}" class="link-b">
          {{ __('messages.login_title') }}
        </a>
      </div>
    </form>
  </div>

</x-layouts.auth>