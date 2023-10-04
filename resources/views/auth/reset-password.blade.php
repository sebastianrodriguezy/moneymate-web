<x-layouts.auth>

  <x-slot:title>
    Reestablecer Contraseña
  </x-slot>

  <div class="flex flex-col w-full">
    <form method="POST" action="/reset-password">
      @csrf
      <h1 class="title">Reestablece tu nueva contraseña</h1>
      <input type="hidden" name="token" value="{{ $token }}" autocomplete="off" />
      <div class="mb-3">
        <label for="email" class="label-base">Email</label>
        <input 
          type="email" 
          id="email" 
          name="email" 
          aria-label="readonly input" 
          class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" 
          placeholder="email@email.com" 
          value="{{ $email }}" 
          required 
          readonly 
        />
      </div>
      <div class="mb-3">
        <label for="password" class="label-base">Contraseña</label>
        <input type="password" id="password" name="password" class="input-base" placeholder="*********" required />
        <p class="ml-2 mt-0.5 text-xs text-gray-500 dark:text-gray-400">La contraseña debe contener [terminar]</p>
      </div>
      <div class="mb-3">
        <label for="password_confirm" class="label-base">Confirmar contraseña</label>
        <input type="password" id="password_confirm" name="password_confirm" class="input-base" placeholder="*********" required />
      </div>
      @if (isset($errors) && count($errors) > 0)
        <ul class="mb-6">
          @foreach ($errors->all() as $error)
            <li class="text-red-600 dark:text-red-400 leading-4 text-sm">
              - {{ $error }}
            </li>
          @endforeach
        </ul>
      @endif
      <input type="submit" value="Reestablecer" class="button-b w-full" />
      <div class="flex flex-row items-center leading-4">
        <p class="text-sm mr-2 dark:text-gray-300 text-gray-90">¿Recordaste tu contraseña?</p>
        <a href="/login" title="Registrarse" class="link-b">
          Iniciar sesión
        </a>
      </div>
    </form>
  </div>

</x-layouts.auth>