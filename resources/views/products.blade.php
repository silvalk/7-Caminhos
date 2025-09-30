<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sete Caminhos - Produtos</title>
  <link href="https://unpkg.com/ionicons@5.5.2/dist/css/ionicons.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Marcellus&display=swap" rel="stylesheet">
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
  @vite(['resources/js/products.js'])
</head>
<body>
@include('partials.header')


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
  <div class="product-card" onclick="openModal('Produto 7','R$ 180,00','https://picsum.photos/id/1066/400/300','Descrição do Produto 7.')">
  <img src="https://picsum.photos/id/1066/200/150" alt="Produto 7">
  <h4>Produto 7</h4>
  <p>R$ 180,00</p>
</div>
  <div class="product-card" onclick="openModal('Produto 8','R$ 220,00','https://picsum.photos/id/1047/400/300','Descrição do Produto 8.')">
    <img src="https://picsum.photos/id/1047/200/150" alt="Produto 8">
    <h4>Produto 8</h4>
    <p>R$ 220,00</p>
  </div>
  <div class="product-card" onclick="openModal('Produto 9','R$ 99,00','https://picsum.photos/id/1048/400/300','Descrição do Produto 9.')">
    <img src="https://picsum.photos/id/1048/200/150" alt="Produto 9">
    <h4>Produto 9</h4>
    <p>R$ 99,00</p>
  </div>
  <div class="product-card" onclick="openModal('Produto 10','R$ 275,00','https://picsum.photos/id/1049/400/300','Descrição do Produto 10.')">
    <img src="https://picsum.photos/id/1049/200/150" alt="Produto 10">
    <h4>Produto 10</h4>
    <p>R$ 275,00</p>
  </div>
  <div class="product-card" onclick="openModal('Produto 11','R$ 199,00','https://picsum.photos/id/1050/400/300','Descrição do Produto 11.')">
    <img src="https://picsum.photos/id/1050/200/150" alt="Produto 11">
    <h4>Produto 11</h4>
    <p>R$ 199,00</p>
  </div>
</div>
      <div class="pagination">
        <button>&laquo; Anterior</button>
        <button>Próximo &raquo;</button>
      </div>
    </div>
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

  @include('partials.footer')

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
