<x-layouts.auth>

  <x-slot:title>
    Recuperar Contraseña
  </x-slot>

  <div class="flex flex-col w-full">
    <form method="POST" action="/recovery-password">
      @csrf
      <h1 class="title">Recupera el acceso a tu cuenta</h1>
      <div class="mb-6">
        <label for="email" class="label-base">Email</label>
        <input type="email" id="email" name="email" value="{{ old('email') }}" class="input-base" placeholder="email@email.com" required />
        <p class="ml-2 mt-0.5 text-xs text-gray-500 dark:text-gray-400">Se enviara un correo con el link de reestablecimiento de contraseña al email ingresado</p>
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
      <input type="submit" value="Enviar email" class="button-b w-full" />
      <div class="flex flex-row items-center leading-4">
        <p class="text-sm mr-2 dark:text-gray-300 text-gray-90">¿Recordaste tu contraseña?</p>
        <a href="/login" title="Registrarse" class="link-b">
          Iniciar sesión
        </a>
      </div>
    </form>
  </div>

</x-layouts.auth>