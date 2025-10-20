import '../css/menu-lateral.css'

(() => {
  const toggleIcon = document.querySelector('ion-icon[name="menu-outline"]');
  if (!toggleIcon) return;

  const sidebar = document.createElement('aside');
  sidebar.classList.add('setecam-sidebar');
  sidebar.innerHTML = `
    <button class="setecam-close-btn" aria-label="Fechar menu">✕</button>
    <nav class="setecam-menu">
      <a href="/products?categorias[]=Velas"><i class="fas fa-fire"></i> Velas</a>
      <a href="/products?categorias[]=Ervas"><i class="fas fa-seedling"></i> Ervas</a>
      <a href="/products?categorias[]=Imagens"><i class="fas fa-image"></i> Imagens</a>
      <a href="/products?categorias[]=Cristais"><i class="fas fa-gem"></i> Cristais</a>
      <a href="/products?categorias[]=Miçangas"><i class="fas fa-spa"></i> Miçangas</a>
      <a href="/products?categorias[]=Kits"><i class="fas fa-box"></i> Kits</a>
    </nav>
    <div class="setecam-profile">
      <img src="https://i.pravatar.cc/100?img=12" alt="Perfil do usuário">
      <span>Neymar Santos</span>
    </div>
    <div class="setecam-bottom-actions">
      <a href="#"><i class="fas fa-sign-out-alt"></i> Sair</a>
    </div>
  `;
  document.body.appendChild(sidebar);

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
