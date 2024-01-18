<header class="header-container">
    <div class="header-left">
      <a href="/" class="header-logo">LEO</a>
    </div>
    <div class="header-right">
      <form action="/" method="get" class="search-container">
        <input type="text" name="search" placeholder="Pesquisar cursos..." class="search-input" autocomplete="off"/>
        <button type="submit" class="search-input-icon z-50">
          <svg class="h-5 w-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-5.2-5.2" />
            <circle cx="10" cy="10" r="7" />
          </svg>
        </button>
      </form>
      <?php 
        if (isset($_COOKIE['user_id'])):
        
        $userModel = new \App\Models\UserModel();
        $user = $userModel->getUserById($_COOKIE['user_id']);
        
      ?>
      <div class="info-user-container">
        <div class="info-user-img"></div>
          <div class="info-user-name-container">
            <span class="info-user-welcome">Seja bem-vindo</span>
            <span class="info-user-name"><?= $user['full_name'] ?></span>
          </div>
          <button id="dropdownUserButton" class="info-user-btn-more" onclick="toggleDropdown()">
            <svg xmlns="http://www.w3.org/2000/svg" height="16" width="10" viewBox="0 0 320 512">
              <path d="M137.4 374.6c12.5 12.5 32.8 12.5 45.3 0l128-128c9.2-9.2 11.9-22.9 6.9-34.9s-16.6-19.8-29.6-19.8L32 192c-12.9 0-24.6 7.8-29.6 19.8s-2.2 25.7 6.9 34.9l128 128z" />
            </svg>
          </button>
          <div id="dropdownUserContent" class="absolute -bottom-20 right-0 w-full hidden bg-white z-50 shadow-lg border-l border-r border-b border-gray-500">
            <ul class="info-user-menu">
              <li class="hover:bg-gray-100 px-4 py-2">
                <a class="block" href="/cursos">Meus Cursos</a>
              </li>
              <li class="hover:bg-gray-100 px-4 py-2">
                <a class="block" href="/logout">Sair</a>
              </li>
            </ul>
          </div>
      </div>
      <?php else : ?>
        <div class="header-right-buttons">
          <button onclick="window.location.href = '/login'">Login</button>
          <button onclick="window.location.href = '/register'">Cadastrar</button>
        </div>
      <?php endif; ?>
    </div>
  </header>