import '../css/menu-lateral.css'

(() => {
  const toggleIcon = document.querySelector('ion-icon[name="menu-outline"]');
  if (!toggleIcon) return;
  
  const isLoggedIn = window.isLoggedIn;
  const nomeUsuario = isLoggedIn ? window.nomeUsuario : '';
  
  const sidebar = document.createElement('aside');
  sidebar.classList.add('setecam-sidebar');

  const bottomActions = `
    ${isLoggedIn ? `
      <div class="setecam-profile">
        <i class="fas fa-user-circle"></i>
        <span>${nomeUsuario}</span>
      </div>
      <a href="#" id="logoutBtn">
        <i class="fas fa-sign-out-alt"></i> Sair
      </a>
      <form id="logoutForm" action="/logout" method="POST" style="display: none;">
        <input type="hidden" name="_token" value="${document.querySelector('meta[name=csrf-token]').content}">
      </form>
    ` : `
      <a href="/login">
        <i class="fas fa-sign-in-alt"></i> Entrar
      </a>
    `}
  `;

  sidebar.innerHTML = `
    <button class="setecam-close-btn" aria-label="Fechar menu">✕</button>

    <nav class="setecam-menu">
      <a href="/products?categorias[]=Velas"><i class="fas fa-fire"></i> Velas</a>
      <a href="/products?categorias[]=Ervas"><i class="fas fa-seedling"></i> Ervas</a>
      <a href="/products?categorias[]=Imagens"><i class="fas fa-image"></i> Imagens</a>
      <a href="/products?categorias[]=Cristais"><i class="fas fa-gem"></i> Cristais</a>
      <a href="/products?categorias[]=Miçangas"><i class="fas fa-spa"></i> Miçangas</a>
      <a href="/products?categorias[]=Kits"><i class="fas fa-box"></i> Kits</a>
      <a href="/products"><i class="fas fa-shop"></i> Produtos</a>
    </nav>

    <div class="setecam-bottom-actions">
      ${bottomActions}
    </div>
  `;

  document.body.appendChild(sidebar);

  if (isLoggedIn) {
    const logoutBtn = sidebar.querySelector('#logoutBtn');
    const logoutForm = sidebar.querySelector('#logoutForm');
    if (logoutBtn && logoutForm) {
      logoutBtn.addEventListener('click', (e) => {
        e.preventDefault();
        logoutForm.submit();
      });
    }
  }

  const closeBtn = sidebar.querySelector('.setecam-close-btn');
  const pageContent = document.querySelector('.setecam-page-content') || document.body;

  function closeMenu() {
    sidebar.classList.remove('open');
    pageContent.classList.remove('blur');
  }

  function openMenu() {
    sidebar.classList.add('open');
    pageContent.classList.add('blur');
  }

  toggleIcon.addEventListener('click', () => {
    if (sidebar.classList.contains('open')) {
      closeMenu();
    } else {
      openMenu();
    }
  });

  closeBtn.addEventListener('click', closeMenu);

  document.addEventListener('click', (e) => {
    if (!sidebar.contains(e.target) && e.target !== toggleIcon) {
      closeMenu();
    }
  });

  sidebar.querySelectorAll('a').forEach(link => {
    link.addEventListener('click', closeMenu);
  });
})();
