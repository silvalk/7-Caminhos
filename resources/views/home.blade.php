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

<section class="products">
    <h2>Promoções</h2>
    <div class="product-carousel">
        <div class="product-card">
            <img src="https://picsum.photos/id/1040/200/150" alt="Produto 1" loading="lazy">
            <h3>Produto 1</h3>
            <p>R$ 100,00</p>
            <button class="buy-btn" onclick="window.location.href='{{ route('products') }}'">Comprar</button>
        </div>
        <div class="product-card">
            <img src="https://picsum.photos/id/1041/200/150" alt="Produto 2" loading="lazy">
            <h3>Produto 2</h3>
            <p>R$ 150,00</p>
            <button class="buy-btn" onclick="window.location.href='{{ route('products') }}'">Comprar</button>
        </div>
        <div class="product-card">
            <img src="https://picsum.photos/id/1042/200/150" alt="Produto 3" loading="lazy">
            <h3>Produto 3</h3>
            <p>R$ 200,00</p>
            <button class="buy-btn" onclick="window.location.href='{{ route('products') }}'">Comprar</button>
        </div>
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
      <input type="text" name="name" placeholder="Seu nome" required>
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
}, 5000);

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
