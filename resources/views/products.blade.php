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
<form method="GET" action="{{ route('products') }}" class="sidebar">
  <h3>Filtros</h3>
  
  <label>
    <input type="checkbox" name="categorias[]" value="Cristais" {{ (request('categorias') && in_array('Cristais', request('categorias'))) ? 'checked' : '' }}>
    Cristais
  </label>
  <label>
    <input type="checkbox" name="categorias[]" value="Ervas" {{ (request('categorias') && in_array('Ervas', request('categorias'))) ? 'checked' : '' }}>
    Ervas
  </label>
  <label>
    <input type="checkbox" name="categorias[]" value="Miçangas" {{ (request('categorias') && in_array('Miçangas', request('categorias'))) ? 'checked' : '' }}>
    Miçangas
  </label>
  <label>
    <input type="checkbox" name="categorias[]" value="Velas" {{ (request('categorias') && in_array('Velas', request('categorias'))) ? 'checked' : '' }}>
    Velas
  </label>
  <label>
    <input type="checkbox" name="categorias[]" value="Kits" {{ (request('categorias') && in_array('Kits', request('categorias'))) ? 'checked' : '' }}>
    Kits
  </label>
  <label>
    <input type="checkbox" name="categorias[]" value="Imagens" {{ (request('categorias') && in_array('Imagens', request('categorias'))) ? 'checked' : '' }}>
    Imagens
  </label>

  <h3>Preço</h3>
  <label>
    <input type="radio" name="preco" value="ate100" {{ request('preco') == 'ate100' ? 'checked' : '' }}>
    Até R$ 100
  </label>
  <label>
    <input type="radio" name="preco" value="100a200" {{ request('preco') == '100a200' ? 'checked' : '' }}>
    R$ 100 - R$ 200
  </label>
  <label>
    <input type="radio" name="preco" value="acima200" {{ request('preco') == 'acima200' ? 'checked' : '' }}>
    Acima de R$ 200
  </label>

  <div style="margin-top: 15px; display: flex; gap: 10px;">
  <button type="submit" style="background-color: #6D0202; color: #fff; padding: 8px 12px; border:none; border-radius: 5px; cursor:pointer;">
    Filtrar
  </button>
  <a href="{{ route('products') }}" style="background-color: #999; color: #fff; padding: 8px 12px; border-radius: 5px; text-decoration: none; display: flex; align-items: center; justify-content: center;">
    Limpar filtros
  </a>
</div>

</form>


  <div style="flex:1">
  <div class="products-grid">
  @foreach($produtos as $produto)
    @php
        $imagem = $produto->imagem ? asset('storage/'.$produto->imagem) : asset('storage/default.jpg');
        $preco = 'R$ '.number_format($produto->preco, 2, ',', '.');
        $nome = addslashes($produto->nome);
        $descricao = addslashes($produto->descricao ?? '');
    @endphp
    <div class="product-card" onclick="openModal('{{ $nome }}', '{{ $preco }}', '{{ $imagem }}', '{{ $descricao }}')">
      <img src="{{ $imagem }}" alt="{{ $produto->nome }}">
      <h4>{{ $produto->nome }}</h4>
      <p>{{ $preco }}</p>
    </div>
  @endforeach
</div>

<div class="pagination">
  {{ $produtos->links() }} 
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
