<x-layouts.auth>

  <x-slot:title>
    Iniciar Sesión
  </x-slot>

  <div class="flex flex-col w-full">
    <form method="POST" action="/authenticate">
      @csrf
      <h1 class="title">Inicia sesión en tu cuenta</h1>
      <div class="mb-6">
        <label for="email" class="label-base">Email</label>
        <input type="email" id="email" name="email" value="{{ $remember_user ? $remember_user : '' }}" class="input-base" placeholder="email@email.com" required />
      </div>
      <div class="mb-6">
        <label for="password" class="label-base">Contraseña</label>
        <input type="password" id="password" name="password" class="input-base" placeholder="*********" required />
      </div>
      <div class="flex flex-row items-center justify-between mb-6">
        <div class="flex items-start">
          <div class="flex items-center h-5">
            <input id="remember_user" name="remember_user" type="checkbox" {{ $remember_user ? 'checked' : '' }} class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 text-brand-500" />
          </div>
          <label for="remember_user" class="ml-2 text-sm font-medium dark:text-gray-300 text-gray-900">Recordar Usuario</label>
        </div>
        <a href="/recovery-password" title="Recuperar Contraseña" class="link-b">
          ¿Olvisaste tu contraseña?
        </a>
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
      <input type="submit" value="Iniciar Sesión" class="button-b w-full" />
      <div class="flex flex-row items-center leading-4">
        <p class="text-sm mr-2 dark:text-gray-300 text-gray-90">¿Aún no tienes una cuenta?</p>
        <a href="/register" title="Registrarse" class="link-b">
          Registrarse
        </a>
      </div>
    </form>
  </div>

</x-layouts.auth>