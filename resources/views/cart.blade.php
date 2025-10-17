<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Carrinho - Sete Caminhos</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background: #ffe9c8;
      color: #222;
    }
    #overlay {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.6);
      display: none; /* só mostra quando carrinho estiver aberto */
      z-index: 100;
    }
    #cart-wrapper {
      position: fixed;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      background: #fff;
      width: 90%;
      max-width: 600px;
      border-radius: 8px;
      padding: 20px;
      z-index: 200;
      box-shadow: 0 4px 12px rgba(0,0,0,0.25);
      overflow-y: auto;
      max-height: 90%;
    }
    h2 {
      color: #6D0202;
      margin-bottom: 20px;
      font-size: 24px;
      text-align: center;
    }
    .cart-item {
      display: flex;
      align-items: center;
      border-bottom: 1px solid #ddd;
      padding: 15px 0;
    }
    .cart-item img {
      width: 90px;
      height: 90px;
      object-fit: cover;
      border-radius: 6px;
      margin-right: 15px;
      border: 1px solid #ccc;
    }
    .cart-item-details {
      flex: 1;
    }
    .cart-item-details strong {
      font-size: 18px;
      margin-bottom: 5px;
      display: block;
    }
    .quantity-controls {
      display: flex;
      align-items: center;
      gap: 10px;
      margin: 8px 0;
    }
    .quantity-controls button {
      background-color: #6D0202;
      color: white;
      border: none;
      width: 30px;
      height: 30px;
      font-size: 20px;
      line-height: 20px;
      border-radius: 4px;
      cursor: pointer;
    }
    .quantity-controls span {
      font-weight: 600;
      font-size: 16px;
      width: 25px;
      text-align: center;
    }
    .price, .subtotal {
      font-weight: 600;
      font-size: 16px;
      margin-left: 20px;
      min-width: 90px;
      text-align: right;
      color: #6D0202;
    }
    .remove-btn {
      background: none;
      border: none;
      color: red;
      font-size: 22px;
      cursor: pointer;
      margin-left: 15px;
      font-weight: bold;
    }
    #cart-total {
      text-align: right;
      font-size: 22px;
      font-weight: 700;
      color: #6D0202;
      margin-top: 25px;
      border-top: 2px solid #6D0202;
      padding-top: 15px;
    }
    #finalizarCompra {
      background-color: #6D0202;
      color: white;
      border: none;
      padding: 12px 25px;
      font-size: 18px;
      border-radius: 6px;
      cursor: pointer;
      margin-top: 25px;
      float: right;
    }
    a.continuar {
      display: inline-block;
      margin-top: 25px;
      color: #6D0202;
      font-weight: 600;
      text-decoration: none;
      font-size: 16px;
    }
    .close-btn-cart {
      position: absolute;
      top: 10px;
      right: 15px;
      background: none;
      border: none;
      font-size: 24px;
      color: #333;
      cursor: pointer;
    }
  </style>
</head>
<body>

  <div id="overlay"></div>

  <div id="cart-wrapper">
    <button class="close-btn-cart" onclick="closeCart()">×</button>
    <h2>Meu Carrinho</h2>
    <div id="cart-container">
      <!-- produtos aparecem aqui -->
    </div>
    <div id="cart-total">Total: R$ 0,00</div>
    <button id="finalizarCompra">Finalizar Compra</button>
    <a href="{{ route('products') }}" class="continuar">← Continuar comprando</a>
  </div>

  <script>
    function getCart() {
      const cartStr = localStorage.getItem('cart');
      return cartStr ? JSON.parse(cartStr) : [];
    }

    function saveCart(cart) {
      localStorage.setItem('cart', JSON.stringify(cart));
    }

    function formatPrice(value) {
      return value.toFixed(2).replace('.', ',');
    }

    function openCart() {
      document.getElementById('overlay').style.display = 'block';
      document.getElementById('cart-wrapper').style.display = 'block';
      renderCart();
    }

    function closeCart() {
    window.location.href = "/products";
    }



    function renderCart() {
      const cart = getCart();
      const container = document.getElementById('cart-container');
      const totalDiv = document.getElementById('cart-total');
      container.innerHTML = '';

      if (cart.length === 0) {
        container.innerHTML = '<p>Seu carrinho está vazio.</p>';
        totalDiv.textContent = 'Total: R$ 0,00';
        return;
      }

      let total = 0;

      cart.forEach((item, idx) => {
        const subtotal = item.preco * item.quantidade;
        total += subtotal;

        const itemDiv = document.createElement('div');
        itemDiv.className = 'cart-item';

        itemDiv.innerHTML = `
          <img src="${item.imagem}" alt="${item.nome}">
          <div class="cart-item-details">
            <strong>${item.nome}</strong>
            <div class="quantity-controls">
              <button onclick="changeQuantity(${idx}, -1)">−</button>
              <span>${item.quantidade}</span>
              <button onclick="changeQuantity(${idx}, 1)">+</button>
            </div>
          </div>
          <div class="price">R$ ${formatPrice(item.preco)}</div>
          <div class="subtotal">R$ ${formatPrice(subtotal)}</div>
          <button class="remove-btn" onclick="removeItem(${idx})" title="Remover produto">&times;</button>
        `;

        container.appendChild(itemDiv);
      });

      totalDiv.textContent = `Total: R$ ${formatPrice(total)}`;
    }

    function changeQuantity(index, delta) {
      const cart = getCart();
      cart[index].quantidade += delta;
      if (cart[index].quantidade < 1) {
        cart.splice(index, 1);
      }
      saveCart(cart);
      renderCart();
    }

    function removeItem(index) {
      const cart = getCart();
      cart.splice(index, 1);
      saveCart(cart);
      renderCart();
    }

    document.getElementById('finalizarCompra').addEventListener('click', () => {
      alert('Finalizar compra ainda não implementado.');
    });
    openCart();
  </script>

</body>
</html>
