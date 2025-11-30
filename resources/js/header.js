import '../css/header.css';
document.querySelector('.cart-icon').addEventListener('click', () => {
  window.location.href = '/cart'; 
});

document.addEventListener('DOMContentLoaded', () => {
  const cartIcon = document.querySelector('.cart-icon');
  if (!cartIcon) return;

  // Cria o span do contador
  const countSpan = document.createElement('span');
  countSpan.classList.add('cart-count');
  cartIcon.appendChild(countSpan);

  // Função para atualizar o contador
  function updateCartCount(count) {
    if (count > 0) {
      countSpan.textContent = count;
      countSpan.style.display = 'block';
    } else {
      countSpan.style.display = 'none';
    }
  }

  // Exemplo: pegar quantidade do carrinho do localStorage
  // Você pode trocar isso para pegar do backend via API ou blade
  const cartItems = JSON.parse(localStorage.getItem('cart') || '[]');
  updateCartCount(cartItems.length);

  // Se você quiser atualizar dinamicamente:
  window.updateCartCount = updateCartCount;
});
