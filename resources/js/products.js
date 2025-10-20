import '../css/products.css';

document.addEventListener('DOMContentLoaded', () => {
  const produtos = window.produtos || [];
  const selectedProductId = window.selectedProductId || null;
  const modal = document.getElementById('productModal');
const modalImg = document.getElementById('modalImg');
const modalTitle = document.getElementById('modalTitle');
const modalPrice = document.getElementById('modalPrice');
const modalDesc = document.getElementById('modalDesc');
const modalCategory = document.getElementById('modalCategory'); // elemento da categoria
const addToCartBtn = document.getElementById('addToCartBtn');

const alertBox = document.getElementById('customAlert');

let currentProduct = {};

function openModal(produto) {
  modalImg.src = produto.imagem;
  modalImg.alt = produto.nome;
  modalTitle.textContent = produto.nome;

  if (produto.preco_promocional) {
    modalPrice.innerHTML = `<span class="old-price">R$ ${Number(produto.preco).toFixed(2).replace('.', ',')}</span> <span class="promo-price">R$ ${Number(produto.preco_promocional).toFixed(2).replace('.', ',')}</span>`;
  } else {
    modalPrice.textContent = 'R$ ' + Number(produto.preco).toFixed(2).replace('.', ',');
  }

  modalDesc.textContent = produto.descricao || '';
  
  modalCategory.textContent = produto.categoria || '—';

  modal.style.display = 'flex';

  currentProduct = {
    ...produto,
    preco: produto.preco_promocional ? parseFloat(produto.preco_promocional) : parseFloat(produto.preco),
    quantidade: 1,
    cor: '',
  };
}


const quantityInput = document.getElementById('quantityInput');
const plusBtn = document.querySelector('.quantity-btn.plus');
const minusBtn = document.querySelector('.quantity-btn.minus');

plusBtn?.addEventListener('click', () => {
  quantityInput.value = parseInt(quantityInput.value) + 1;
});

minusBtn?.addEventListener('click', () => {
  if (parseInt(quantityInput.value) > 1) {
    quantityInput.value = parseInt(quantityInput.value) - 1;
  }
});



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
  const input = document.getElementById('quantityInput');
  const quantidadeSelecionada = parseInt(input.value) || 1;

  let cart = getCart();
  const index = cart.findIndex(p => p.id === currentProduct.id);

  if (index >= 0) {
    cart[index].quantidade += quantidadeSelecionada;
  } else {
    const produtoParaCarrinho = {
      ...currentProduct,
      quantidade: quantidadeSelecionada
    };
    cart.push(produtoParaCarrinho);
  }

  saveCart(cart);
  showCustomAlert(`"${currentProduct.nome}" (${quantidadeSelecionada}) adicionado(s) ao carrinho!`);
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
