<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sete Caminhos - Produtos</title>
  <link href="https://unpkg.com/ionicons@5.5.2/dist/css/ionicons.min.css" rel="stylesheet">
  <style>
    body {
      margin: 0;
      font-family: Arial, sans-serif;
      background-color: #ffe9c8;
      display: flex;
      flex-direction: column;
      min-height: 100vh;
    }
    .header {
      background-color: #6D0202;
      color: #CB9441;
      padding: 15px 40px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      position: relative;
    }
    .logo {
      display: flex;
      align-items: center;
      gap: 12px;
    }
    .logo-circle {
      width: 45px;
      height: 45px;
      background-color: #fff;
      border-radius: 50%;
    }
    .logo-text {
      font-family: 'Marcellus', serif;
      font-size: 22px;
      line-height: 1.2;
    }
    .header-right {
    display: flex;
    align-items: center;
    gap: 10px;
}

.search-input {
    padding: 6px 12px;
    border-radius: 20px;
    border: 1px solid #CB9441;
    outline: none;
    font-size: 14px;
    width: 180px;
    transition: 0.3s;
}

.search-input:focus {
    box-shadow: 0 0 5px rgba(109,2,2,0.5);
    border-color: #6D0202;
}
.back-home {
    display: flex;
    align-items: center;
    gap: 5px;
    color: #CB9441;
    text-decoration: none;
    font-weight: bold;
    padding: 5px 10px;
    border-radius: 12px;
    transition: 0.3s;
}

.back-home:hover {
    background-color: rgba(203,148,65,0.2);
}
    .icons {
      display: flex;
      gap: 25px;
      font-size: 26px;
      color: #CB9441;
      cursor: pointer;
    }
    .container {
      display: flex;
      flex: 1;
      padding: 20px;
      gap: 20px;
    }
    .sidebar {
      background: #fff;
      width: 250px;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 4px 8px rgba(0,0,0,0.1);
      height: fit-content;
    }
    .sidebar h3 {
      color: #6D0202;
      margin-bottom: 10px;
    }
    .sidebar label {
      display: block;
      margin: 8px 0;
    }
    .products-grid {
      flex: 1;
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
      gap: 20px;
    }
    .product-card {
      background: #fff;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0,0,0,0.1);
      text-align: center;
      padding: 15px;
      cursor: pointer;
      transition: transform 0.2s;
    }
    .product-card:hover {
      transform: translateY(-5px);
    }
    .product-card img {
      width: 100%;
      height: 160px;
      object-fit: cover;
      border-radius: 6px;
    }
    .product-card h4 {
      margin: 10px 0 5px;
    }
    .product-card p {
      color: #6D0202;
      font-weight: bold;
    }
    .pagination {
      display: flex;
      justify-content: center;
      gap: 10px;
      margin-top: 20px;
    }
    .pagination button {
      padding: 8px 12px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      background-color: #6D0202;
      color: #fff;
    }
    .pagination button:hover {
      background-color: #8a1e1e;
    }
    .footer {
      background-color: #6D0202;
      color: #fff;
      padding: 20px;
      text-align: center;
      font-size: 14px;
    }
    .modal {
      display: none;
      position: fixed;
      z-index: 9999;
      top: 0; left: 0;
      width: 100%; height: 100%;
      background-color: rgba(0,0,0,0.6);
      justify-content: center;
      align-items: center;
    }
    .modal-content {
      background: #fff;
      border-radius: 12px;
      max-width: 500px;
      width: 90%;
      padding: 20px;
      text-align: center;
      position: relative;
    }
    .modal-content img {
      width: 100%;
      border-radius: 8px;
      margin-bottom: 15px;
    }
    .close-btn {
      position: absolute;
      top: 10px; right: 15px;
      background: none;
      border: none;
      font-size: 22px;
      cursor: pointer;
    }
    .add-cart-btn {
      background-color: #6D0202;
      color: #fff;
      border: none;
      padding: 10px 20px;
      border-radius: 6px;
      cursor: pointer;
      margin-top: 10px;
    }
  </style>
</head>
<body>

<div class="header">
  <div class="logo">
    <div class="logo-circle"></div>
    <div class="logo-text">
      <div>Sete</div>
      <div>Caminhos</div>
    </div>
  </div>

  <div class="header-right">
    <input type="text" placeholder="Procurar..." class="search-input">
    <a href="{{ route('home') }}" class="back-home"><i class="icon ion-md-arrow-back"></i> Voltar</a>
  </div>

  <div class="icons">
    <i class="icon ion-md-cart"></i>
    <i class="icon ion-md-person"></i>
    <i class="icon ion-md-menu"></i>
  </div>
</div>


  <div class="container">
    <div class="sidebar">
      <h3>Filtros</h3>
      <label><input type="checkbox"> Categoria 1</label>
      <label><input type="checkbox"> Categoria 2</label>
      <h3>Preço</h3>
      <label><input type="radio" name="price"> Até R$ 100</label>
      <label><input type="radio" name="price"> R$ 100 - R$ 200</label>
      <label><input type="radio" name="price"> Acima de R$ 200</label>
    </div>

    <div style="flex:1">
      <div class="products-grid">
        <div class="product-card" onclick="openModal('Produto 1','R$ 100,00','https://picsum.photos/id/1040/400/300','Descrição do Produto 1.')">
          <img src="https://picsum.photos/id/1040/200/150" alt="Produto 1">
          <h4>Produto 1</h4>
          <p>R$ 100,00</p>
        </div>
        <div class="product-card" onclick="openModal('Produto 2','R$ 150,00','https://picsum.photos/id/1041/400/300','Descrição do Produto 2.')">
          <img src="https://picsum.photos/id/1041/200/150" alt="Produto 2">
          <h4>Produto 2</h4>
          <p>R$ 150,00</p>
        </div>
        <div class="product-card" onclick="openModal('Produto 3','R$ 200,00','https://picsum.photos/id/1042/400/300','Descrição do Produto 3.')">
          <img src="https://picsum.photos/id/1042/200/150" alt="Produto 3">
          <h4>Produto 3</h4>
          <p>R$ 200,00</p>
        </div>
        <div class="product-card" onclick="openModal('Produto 4','R$ 250,00','https://picsum.photos/id/1043/400/300','Descrição do Produto 4.')">
          <img src="https://picsum.photos/id/1043/200/150" alt="Produto 4">
          <h4>Produto 4</h4>
          <p>R$ 250,00</p>
        </div>
        <div class="product-card" onclick="openModal('Produto 5','R$ 300,00','https://picsum.photos/id/1044/400/300','Descrição do Produto 5.')">
          <img src="https://picsum.photos/id/1044/200/150" alt="Produto 5">
          <h4>Produto 5</h4>
          <p>R$ 300,00</p>
        </div>
        <div class="product-card" onclick="openModal('Produto 6','R$ 350,00','https://picsum.photos/id/1045/400/300','Descrição do Produto 6.')">
          <img src="https://picsum.photos/id/1045/200/150" alt="Produto 6">
          <h4>Produto 6</h4>
          <p>R$ 350,00</p>
        </div>
      </div>
      <div class="pagination">
        <button>&laquo; Anterior</button>
        <button>Próximo &raquo;</button>
      </div>
    </div>
  </div>

  <div class="footer">
    © 2024 Sete Caminhos - Todos os direitos reservados.
  </div>

  <div class="modal" id="productModal">
    <div class="modal-content">
      <button class="close-btn" onclick="closeModal()">&times;</button>
      <img id="modalImg" src="" alt="Produto">
      <h2 id="modalTitle"></h2>
      <p id="modalPrice"></p>
      <p id="modalDesc"></p>
      <button class="add-cart-btn">Adicionar ao Carrinho</button>
    </div>
  </div>

  <script>
    const modal = document.getElementById('productModal');
    const modalImg = document.getElementById('modalImg');
    const modalTitle = document.getElementById('modalTitle');
    const modalPrice = document.getElementById('modalPrice');
    const modalDesc = document.getElementById('modalDesc');

    function openModal(title, price, img, desc) {
      modalImg.src = img;
      modalTitle.textContent = title;
      modalPrice.textContent = price;
      modalDesc.textContent = desc;
      modal.style.display = 'flex';
    }

    function closeModal() {
      modal.style.display = 'none';
    }

    window.onclick = function(event) {
      if (event.target === modal) {
        closeModal();
      }
    };
  </script>
</body>
</html>
