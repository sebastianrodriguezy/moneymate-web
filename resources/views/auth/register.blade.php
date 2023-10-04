<x-layouts.auth>

  <x-slot:title>
    Nuevo Registro
  </x-slot>

  <div class="flex flex-col w-full">
    <form method="POST" action="/register">
      @csrf
      <h1 class="title">Crea una nueva cuenta</h1>
      <div class="mb-3">
        <label for="name" class="label-base">Nombre</label>
        <input type="text" id="name" name="name" class="input-base" placeholder="Tu nombre" value="{{ old('name') }}" required />
      </div>
      <div class="mb-3">
        <label for="email" class="label-base">Email</label>
        <input type="email" id="email" name="email" class="input-base" placeholder="email@email.com" value="{{ old('email') }}" required />
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
      <input type="submit" value="Registrarse" class="button-b w-full" />
      <div class="flex flex-row items-center leading-4">
        <p class="text-sm mr-2 dark:text-gray-300 text-gray-90">¿Ya tienes una cuenta?</p>
        <a href="/login" title="Registrarse" class="link-b">
          Iniciar sesión
        </a>
      </div>
    </form>
  </div>

</x-layouts.auth>