<aside class="w-full max-w-[250px] bg-brand-600 dark:bg-gray-800 p-6 flex flex-col text-gray-100">
  <a href="en/home" title="asdasdasd" target="self">
    <figure class="max-w-[150px] w-full mb-2 text-left">
      <img alt="Logo de la aplicación" src="/img/logo_white.png"  />
    </figure>
  </a>

  <div class="flex flex-col items-center w-full my-6">
    <figure class="mb-6 w-full max-w-[80px] h-full max-h-[80px] overflow-hidden rounded-full">
      <img alt="User Avatar" width="100%" src="https://img.freepik.com/free-vector/businessman-character-avatar-isolated_24877-60111.jpg?w=826&t=st=1696908592~exp=1696909192~hmac=d7d24f9b3e05db4c770af7687d87447681a6ac87ce56ed6b986b326200fccbc8" />
    </figure>
    <p class="leading-4 font-semibold mb-2 text-center">Juan Sebastian Rodriguez</p>
    <p class="leading-4 font-extralight text-sm text-gray-300 dark:text-gray-400">sky.sebas.2020@gmail.com</p>
  </div>

  <form action="/logout" method="POST" class="w-full px-6 flex flex-col items-center">
    @csrf
    <input type="submit" value="Cerrar Sesión" class="transition cursor-pointer border focus:ring-4 focus:outline-non font-medium rounded-md text-sm px-5 py-2.5 text-center border-gray-600 text-gray-400 hover:text-white hover:bg-gray-600 focus:ring-gray-800" />
  </form>
  <button id="theme">Cambiar Tema</button>
  <ion-icon name="heart"></ion-icon>
  
  Sidebar
</aside>