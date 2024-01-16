<div class="home-grid-container">

  <div class="home-grid-item">
    <img src="https://source.unsplash.com/random" alt="Imagem 2" class="home-item-img" />
    <div class="home-item-content">
      <h2 class="home-item-title">Pellentesque Malesuada</h2>
      <p class="home-item-text">Lorem Ipsum is simply dummy text and typesetting industry.</p>
      <button class="home-item-btn">Ver Curso</button>
    </div>
  </div>

  <?php foreach ($courses as $course): ?>
    <div>
        <h2><?= $course['name'] ?></h2>
        <p><?= $course['description'] ?></p>
        <!-- Adicione mais campos conforme necessário -->
    </div>
<?php endforeach; ?>

  <div class="home-grid-item">
    <img src="https://source.unsplash.com/random" alt="Imagem 2" class="home-item-img" />
    <div class="home-item-content">
      <h2 class="home-item-title">Pellentesque Malesuada</h2>
      <p class="home-item-text">Lorem Ipsum is simply dummy text and typesetting industry.</p>
      <button class="home-item-btn">Ver Curso</button>
    </div>
  </div>

  <div class="home-grid-item">
    <img src="https://source.unsplash.com/random" alt="Imagem 2" class="home-item-img" />
    <div class="home-item-content">
      <h2 class="home-item-title">Pellentesque Malesuada</h2>
      <p class="home-item-text">Lorem Ipsum is simply dummy text and typesetting industry.</p>
      <button class="home-item-btn">Ver Curso</button>
    </div>
  </div>

  <div class="home-grid-item">
    <img src="https://source.unsplash.com/random" alt="Imagem 2" class="home-item-img" />
    <div class="home-item-content">
      <h2 class="home-item-title">Pellentesque Malesuada</h2>
      <p class="home-item-text">Lorem Ipsum is simply dummy text and typesetting industry.</p>
      <button class="home-item-btn">Ver Curso</button>
    </div>
  </div>

  <div class="home-grid-item">
    <img src="https://source.unsplash.com/random" alt="Imagem 2" class="home-item-img" />
    <div class="home-item-content">
      <h2 class="home-item-title">Pellentesque Malesuada</h2>
      <p class="home-item-text">Lorem Ipsum is simply dummy text and typesetting industry.</p>
      <button class="home-item-btn">Ver Curso</button>
    </div>
  </div>

  <div class="home-grid-item">
    <img src="https://source.unsplash.com/random" alt="Imagem 2" class="home-item-img" />
    <div class="home-item-content">
      <h2 class="home-item-title">Pellentesque Malesuada</h2>
      <p class="home-item-text">Lorem Ipsum is simply dummy text and typesetting industry.</p>
      <button class="home-item-btn">Ver Curso</button>
    </div>
  </div>

  <div class="home-grid-item">
    <img src="https://source.unsplash.com/random" alt="Imagem 2" class="home-item-img" />
    <div class="home-item-content">
      <h2 class="home-item-title">Pellentesque Malesuada</h2>
      <p class="home-item-text">Lorem Ipsum is simply dummy text and typesetting industry.</p>
      <button class="home-item-btn">Ver Curso</button>
    </div>
  </div>

  <button class="max-w-[310px] border-2 border-dashed border-gray-400 text-gray-400">
    <div class="flex h-96 w-full flex-col items-center justify-center p-5">
      <svg xmlns="http://www.w3.org/2000/svg" height="64" width="64" viewBox="0 0 512 512"><path fill="#9ca3af" d="M512 416c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V96C0 60.7 28.7 32 64 32H192c20.1 0 39.1 9.5 51.2 25.6l19.2 25.6c6 8.1 15.5 12.8 25.6 12.8H448c35.3 0 64 28.7 64 64V416zM232 376c0 13.3 10.7 24 24 24s24-10.7 24-24V312h64c13.3 0 24-10.7 24-24s-10.7-24-24-24H280V200c0-13.3-10.7-24-24-24s-24 10.7-24 24v64H168c-13.3 0-24 10.7-24 24s10.7 24 24 24h64v64z" /></svg>
      <div class="-space-y-2 font-medium uppercase">
        <p class="text-xl">Adicionar</p>
        <p class="text-2xl">Curso</p>
      </div>
    </div>
  </button>
</div>
