<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Sete Caminhos - Home</title>
<link href="https://fonts.googleapis.com/css2?family=Marcellus&display=swap" rel="stylesheet">
<link href="https://unpkg.com/ionicons@5.5.2/dist/css/ionicons.min.css" rel="stylesheet">
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
@vite(['resources/js/home.js'])
</head>
<body>

@include('partials.header')

<div class="carousel">
    <div class="carousel-images" id="carouselImages">
        <img src="https://picsum.photos/id/1018/1000/400" alt="Imagem 1" loading="lazy">
        <img src="https://picsum.photos/id/1015/1000/400" alt="Imagem 2" loading="lazy">
        <img src="https://picsum.photos/id/1016/1000/400" alt="Imagem 3" loading="lazy">
    </div>
</div>
<div class="carousel-dots">
    <span class="dot active" onclick="moveToSlide(0)"></span>
    <span class="dot" onclick="moveToSlide(1)"></span>
    <span class="dot" onclick="moveToSlide(2)"></span>
</div>

<section class="carrossel-categorias">
  <h2 class="titulo-carrossel">Escolha por categoria</h2>
  <div class="lista-categorias">
    <a href="/products?categorias[]=Cristais" class="categoria-item">
      <div class="categoria-imagem">
      <img src="{{ asset('storage/categorias/cristais.jpg') }}" alt="Cristais">
      </div>
      <p>Cristais</p>
    </a>
    <a href="/products?categorias[]=Ervas" class="categoria-item">
      <div class="categoria-imagem">
      <img src="{{ asset('storage/categorias/ervas.jpg') }}" alt="Ervas">
      </div>
      <p>Ervas</p>
    </a>
    <a href="/products?categorias[]=Miçangas" class="categoria-item">
      <div class="categoria-imagem">
      <img src="{{ asset('storage/categorias/miçangas.jpg') }}" alt="Miçangas">
      </div>
      <p>Miçangas</p>
    </a>
    <a href="/products?categorias[]=Velas" class="categoria-item">
      <div class="categoria-imagem">
      <img src="{{ asset('storage/categorias/velas.jpg') }}" alt="Velas">
      </div>
      <p>Velas</p>
    </a>
    <a href="/products?categorias[]=Kits" class="categoria-item">
      <div class="categoria-imagem">
      <img src="{{ asset('storage/categorias/kits.jpg') }}" alt="Kits">
      </div>
      <p>Kits</p>
    </a>
    <a href="/products?categorias[]=Imagens" class="categoria-item">
      <div class="categoria-imagem">
      <img src="{{ asset('storage/categorias/imagens.jpg') }}" alt="Imagens">
      </div>
      <p>Imagens</p>
    </a>
  </div>
</section>



<section class="products">
    <h2>Destaques</h2>
    <div class="product-carousel">
        @forelse ($promocoes as $promocao)
            @php
                $produto = $promocao->produto;
            @endphp
            <div class="product-card">
                <img src="{{ $produto->imagem ? asset('storage/' . $produto->imagem) : 'https://picsum.photos/200/150' }}" alt="{{ $produto->nome }}">

                <h3>{{ $produto->nome }}</h3>
                <p>
                    <span style="text-decoration: line-through; color: #999;">
                        R$ {{ number_format($produto->preco, 2, ',', '.') }}
                    </span>
                    &nbsp;
                    <span style="color: #e74c3c; font-weight: bold;">
                        R$ {{ number_format($promocao->preco_promocional, 2, ',', '.') }}
                    </span>
                </p>
                <button class="buy-btn" onclick="window.location.href='{{ route('products', ['selected' => $produto->id]) }}'">
                    Comprar
                </button>
            </div>
        @empty
            <p>Nenhum produto em promoção no momento.</p>
        @endforelse
    </div>
</section>




<button class="reviews-btn" id="openReviewModal">
  <ion-icon name="chatbubble-ellipses-outline" style="font-size: 32px; color: white;"></ion-icon>
</button>


<div class="modal" id="reviewModal">
  <div class="modal-content">
    <button class="close-btn" id="closeReviewModal">&times;</button>
    <h2>Deixe sua Avaliação</h2>
    <form id="reviewForm" method="POST" action="{{ route('reviews.store') }}">
      @csrf
      <div class="stars" id="starRating">
        <span class="star" data-value="1">&#9733;</span>
        <span class="star" data-value="2">&#9733;</span>
        <span class="star" data-value="3">&#9733;</span>
        <span class="star" data-value="4">&#9733;</span>
        <span class="star" data-value="5">&#9733;</span>
      </div>
      <input type="hidden" name="rating" id="ratingValue" required>
      <textarea name="comment" id="commentBox" rows="4" placeholder="Escreva seu comentário..." disabled required></textarea>
      <button type="submit" class="submit-btn">Enviar Avaliação</button>
    </form>
  </div>
</div>

@include('partials.footer')

<script>
let currentIndex = 0;
const imagesContainer = document.getElementById('carouselImages');
const carouselDots = document.querySelectorAll('.dot');
function moveToSlide(index) {
    currentIndex = index;
    imagesContainer.style.transform = `translateX(-${index * 100}%)`;
    carouselDots.forEach(dot => dot.classList.remove('active'));
    carouselDots[index].classList.add('active');
}
setInterval(() => {
    currentIndex = (currentIndex + 1) % carouselDots.length;
    moveToSlide(currentIndex);
}, 8000);

document.addEventListener('DOMContentLoaded', function() {
  const openBtn = document.getElementById('openReviewModal');
  const closeBtn = document.getElementById('closeReviewModal');
  const modal = document.getElementById('reviewModal');

  openBtn.addEventListener('click', function() {
    modal.style.display = 'flex';
  });

  closeBtn.addEventListener('click', function() {
    modal.style.display = 'none';
  });

  window.addEventListener('click', function(e) {
    if (e.target === modal) {
      modal.style.display = 'none';
    }
  });

  const stars = document.querySelectorAll('.star');
  const ratingValue = document.getElementById('ratingValue');
  const commentBox = document.getElementById('commentBox');

  stars.forEach(star => {
    star.addEventListener('click', () => {
      const value = star.getAttribute('data-value');
      ratingValue.value = value;
      stars.forEach(s => s.classList.remove('selected'));
      for (let i = 0; i < value; i++) {
        stars[i].classList.add('selected');
      }
      commentBox.disabled = false;
    });
  });
});


</script>
</body>
</html>
