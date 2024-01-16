<div id="slider" class="relative mt-20 max-h-80 w-full overflow-visible bg-gray-200">
    <div id="slides" class="flex transition-transform duration-300 ease-in-out">
      <!-- Slide 1 -->
      <div class="h-full w-full flex-shrink-0">
        <img src="https://source.unsplash.com/random" alt="Imagem 1" class="h-80 w-full object-cover" />
      </div>

      <!-- Slide 2 -->
      <div class="h-full w-full flex-shrink-0">
        <img src="https://source.unsplash.com/random" alt="Imagem 2" class="h-80 w-full object-cover" />
      </div>
      <!-- Adicione mais slides conforme necessário -->
    </div>

    <!-- Botão Anterior -->
    <button id="prevBtn" class="absolute left-4 top-1/2 -translate-y-1/2 transform text-white opacity-75 focus:outline-none">
      <svg xmlns="http://www.w3.org/2000/svg" height="64" width="30" viewBox="0 0 320 512" fill="#ffff">
        <path d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l192 192c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L77.3 256 246.6 86.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-192 192z" />
      </svg>
    </button>

    <!-- Botão Próximo -->
    <button id="nextBtn" class="absolute right-4 top-1/2 -translate-y-1/2 transform text-white opacity-75 focus:outline-none">
      <svg xmlns="http://www.w3.org/2000/svg" height="64" width="30" viewBox="0 0 320 512" fill="#ffff">
        <path d="M310.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-192 192c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L242.7 256 73.4 86.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l192 192z" />
      </svg>
    </button>

    <!-- Seletor Inferior -->
    <div id="selector" class="absolute -bottom-4 left-1/2 z-20 flex -translate-x-1/2 transform space-x-2 overflow-visible rounded-full bg-white px-2 py-2 drop-shadow-md">
      <div class="h-4 w-4 cursor-pointer rounded-full bg-gray-500"></div>
      <div class="h-4 w-4 cursor-pointer rounded-full bg-gray-300"></div>
      <div class="h-4 w-4 cursor-pointer rounded-full bg-gray-300"></div>
      <!-- Adicione mais bolinhas conforme necessário -->
    </div>
  </div>