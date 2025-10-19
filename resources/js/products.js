import '../css/products.css';
document.addEventListener('DOMContentLoaded', () => {
  const produtos = window.produtos || [];
  const selectedProductId = window.selectedProductId || null;
  const modal = document.getElementById('productModal');
  const modalImg = document.getElementById('modalImg');
  const modalTitle = document.getElementById('modalTitle');
  const modalPrice = document.getElementById('modalPrice');
  const modalDesc = document.getElementById('modalDesc');
  const addToCartBtn = document.getElementById('addToCartBtn');

  const alertBox = document.getElementById('customAlert');

  let currentProduct = {};

  function openModal(produto) {
  modalImg.src = produto.imagem;
  modalImg.alt = produto.nome;
  modalTitle.textContent = produto.nome;
  modalDesc.textContent = produto.descricao || '';

  // Checa se produto tem preco_promocional e se é menor que o preco original
  if (produto.preco_promocional && produto.preco_promocional < produto.preco) {
    modalPrice.innerHTML = `
      <span style="text-decoration: line-through; color: gray;">
        R$ ${Number(produto.preco).toFixed(2).replace('.', ',')}
      </span>
      <span style="color: red; font-weight: bold; margin-left: 8px;">
        R$ ${Number(produto.preco_promocional).toFixed(2).replace('.', ',')}
      </span>
    `;
  } else {
    modalPrice.textContent = 'R$ ' + Number(produto.preco).toFixed(2).replace('.', ',');
  }

  modal.style.display = 'flex';

  currentProduct = {
    ...produto,
    preco: parseFloat(produto.preco_promocional && produto.preco_promocional < produto.preco ? produto.preco_promocional : produto.preco),
    quantidade: 1,
    cor: '',
  };
}


  function closeModal() {
    modal.style.display = 'none';
  }

  window.onclick = function (e) {
    if (e.target === modal) closeModal();
  };

  document.querySelector('.close-btn')?.addEventListener('click', closeModal);

  function getCart() {
    const cartStr = localStorage.getItem('cart');
    return cartStr ? JSON.parse(cartStr) : [];
  }

  function saveCart(cart) {
    localStorage.setItem('cart', JSON.stringify(cart));
  }

  function showCustomAlert(message) {
    if (!alertBox) return;
    alertBox.textContent = message;
    alertBox.classList.add('show');
    setTimeout(() => alertBox.classList.remove('show'), 3000);
  }

  function updateCartIcon() {
    const cart = getCart();
    const totalItems = cart.reduce((acc, p) => acc + p.quantidade, 0);
    const cartIcon = document.querySelector('.cart-icon span[data-count]');
    if (cartIcon) {
      cartIcon.textContent = totalItems;
      cartIcon.style.display = totalItems > 0 ? 'inline-block' : 'none';
    }
  }

  addToCartBtn?.addEventListener('click', () => {
    let cart = getCart();
    const index = cart.findIndex(p => p.nome === currentProduct.nome);

    if (index >= 0) {
      cart[index].quantidade += 1;
    } else {
      cart.push(currentProduct);
    }

    saveCart(cart);
    showCustomAlert(`"${currentProduct.nome}" adicionado ao carrinho!`);
    closeModal();
    updateCartIcon();
  });

  document.querySelectorAll('.product-card').forEach(card => {
    card.addEventListener('click', () => {
      const id = parseInt(card.dataset.id);
      const produto = produtos.find(p => p.id === id);
      if (produto) openModal(produto);
    });
  });

  if (selectedProductId) {
    const produtoSelecionado = produtos.find(p => p.id == selectedProductId);
    if (produtoSelecionado) openModal(produtoSelecionado);
  }

  updateCartIcon();
});
