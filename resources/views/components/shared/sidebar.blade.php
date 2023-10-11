<aside class="w-full max-w-[280px] bg-gray-100 dark:bg-gray-800 p-6 flex flex-col text-gray-700 dark:text-gray-100">
  <a href="en/home" title="asdasdasd" target="self" class="flex w-full justify-center">
    <figure class="max-w-[150px] w-full mb-2 text-left">
      <img alt="Logo de la aplicación" src="/img/logo_white.png"  />
    </figure>
  </a>

  <form class="flex items-center my-4">
    @csrf
    <label for="search-categories" class="sr-only">Buscar Categorias</label>
    <div class="relative w-full">
      <div class="absolute inset-y-0 left-0 flex items-center pl-2 pointer-events-none">
        <ion-icon name="albums" class="text-gray-600 dark:text-gray-300"></ion-icon>
      </div>
      <input type="search" id="search-categories" autocomplete="off" spellcheck="false" class="focus:outline-none bg-gray-200 text-gray-600 placeholder-gray-500 border-none text-sm rounded-md focus:ring-brand-500 focus:border-brand-500 block w-full pl-7 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Buscar Categorias, Personas...">
    </div>
  </form>

  <div class="flex flex-col items-center w-full my-6">
    <figure class="mb-6 w-full max-w-[80px] h-full max-h-[80px] overflow-hidden rounded-full">
      <img alt="User Avatar" width="100%" src="https://img.freepik.com/free-vector/businessman-character-avatar-isolated_24877-60111.jpg?w=826&t=st=1696908592~exp=1696909192~hmac=d7d24f9b3e05db4c770af7687d87447681a6ac87ce56ed6b986b326200fccbc8" />
    </figure>
    <p class="leading-4 font-semibold mb-2 text-center">Juan Sebastian Rodriguez</p>
    <p class="leading-4 font-extralight text-sm text-gray-500 dark:text-gray-400">sky.sebas.2020@gmail.com</p>
  </div>

  <form action="/logout" method="POST" class="w-full px-6 flex flex-col items-center">
    @csrf
    <div class="inline-flex rounded-md shadow-sm" role="group">
      <button id="theme" type="button" class="inline-flex items-center px-4 py-2 text-sm font-medium bg-gray-200 border border-gray-300 rounded-l-md hover:bg-gray-300 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
        <ion-icon name="sunny" class="text-gray-600 dark:text-gray-300 w-5 h-5"></ion-icon>
      </button>
      <button type="submit" class="inline-flex items-center px-4 py-2 text-sm font-medium bg-gray-200 border border-gray-300 rounded-r-md hover:bg-gray-300 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
        <ion-icon name="log-out" class="text-gray-600 dark:text-gray-300 w-5 h-5"></ion-icon>
      </button>
    </div>
  </form>
  
  <div class="my-6 w-full h-[1px] border-b border-gray-300 dark:border-gray-600"></div>

  <div class="h-full overflow-y-auto">
    <ul class="space-y-2 font-medium">
       <li>
          <a href="#" class="flex items-center p-2 text-gray-700 rounded-md dark:text-white hover:bg-gray-300/40 dark:hover:bg-gray-700 group">
             <ion-icon name="reader" class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-800 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 22 21"></ion-icon>
             <span class="flex-1 ml-3">Movimientos</span>
          </a>
       </li>
       <li>
          <a href="#" class="flex items-center p-2 text-gray-700 rounded-md dark:text-white hover:bg-gray-300/40 dark:hover:bg-gray-700 group">
             <ion-icon name="pricetags" class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-800 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 22 21"></ion-icon>
             <span class="flex-1 ml-3 whitespace-nowrap">Categorias</span>
          </a>
       </li>
       <li>
          <a href="#" class="flex items-center p-2 text-gray-700 rounded-md dark:text-white hover:bg-gray-300/40 dark:hover:bg-gray-700 group">
             <ion-icon name="people" class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-800 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 22 21"></ion-icon>
             <span class="flex-1 ml-3 whitespace-nowrap">Personas</span>
          </a>
       </li>
       <li>
          <a href="#" class="flex items-center p-2 text-gray-700 rounded-md dark:text-white hover:bg-gray-300/40 dark:hover:bg-gray-700 group">
             <ion-icon name="bar-chart" class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-800 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 22 21"></ion-icon>
             <span class="flex-1 ml-3 whitespace-nowrap">Reportes</span>
          </a>
       </li>
    </ul>
  </div>

</aside>