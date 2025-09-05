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
<style>
/* Geral */
body {
    margin: 0;
    font-family: Arial, sans-serif;
    background-color: #ffe9c8;
    display: flex;
    flex-direction: column;
    min-height: 100vh;
}

/* Navbar */
.header {
    background-color: #6D0202;
    color: #CB9441;
    padding: 25px 40px;
    display: flex;
    align-items: center;
    justify-content: space-between;
}
.logo {
    display: flex;
    align-items: center;
    gap: 12px;
}
.logo-circle {
    width: 50px;
    height: 50px;
    background-color: #fff;
    border-radius: 50%;
}
.logo-text {
    font-family: 'Marcellus', serif;
    font-size: 26px;
    line-height: 1.2;
}
.icons {
    display: flex;
    gap: 25px;
    font-size: 26px;
    color: #CB9441;
    cursor: pointer;
    position: relative;
}

/* Carrossel de imagens */
.carousel {
    width: 100%;
    max-width: 1000px;
    margin: 30px auto 15px;
    position: relative;
    overflow: hidden;
    border-radius: 10px;
}
.carousel-images {
    display: flex;
    transition: transform 0.5s ease-in-out;
}
.carousel-images img {
    width: 100%;
    flex-shrink: 0;
    object-fit: cover;
}
.carousel-dots {
    text-align: center;
    margin-top: 12px;
}
.dot {
    height: 12px;
    width: 12px;
    margin: 0 5px;
    background-color: #fff;
    border: 2px solid #6D0202;
    border-radius: 50%;
    display: inline-block;
    cursor: pointer;
}
.dot.active {
    background-color: #6D0202;
}

/* Produtos */
.products {
    padding: 50px 20px;
    text-align: center;
}
.products h2 {
    margin-bottom: 25px;
    font-size: 26px;
    color: #6D0202;
}
.product-carousel {
    display: flex;
    justify-content: center;
    gap: 25px;
    flex-wrap: wrap;
}
.product-card {
    background: #fff;
    width: 220px;
    height: 320px;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    flex-shrink: 0;
    display: flex;
    flex-direction: column;
    align-items: center;
    padding: 15px;
}
.product-card img {
    width: 100%;
    height: 160px;
    object-fit: cover;
    border-radius: 6px;
}
.product-card h3 {
    font-size: 18px;
    margin: 12px 0 5px;
}
.product-card p {
    color: #6D0202;
    font-weight: bold;
    font-size: 16px;
}
.buy-btn {
    margin-top: auto;
    background: #6D0202;
    color: #FFFAF3;
    border: none;
    padding: 10px 18px;
    border-radius: 6px;
    cursor: pointer;
    font-size: 15px;
}
.buy-btn:hover {
    opacity: 0.9;
}

/* Footer */
.footer {
    background-color: #6D0202;
    color: #fff;
    padding: 30px 20px;
    text-align: center;
    font-size: 14px;
}

/* Botão de avaliações */
.reviews-btn {
  position: fixed;
  bottom: 20px;
  right: 20px;
  z-index: 10000;
  background-color: #CB9441;
  border: none;
  border-radius: 50%;
  width: 60px;
  height: 60px;
  display: flex;
  justify-content: center;
  align-items: center;
  cursor: pointer;
  box-shadow: 0 4px 8px rgba(0,0,0,0.2);
}


.reviews-btn:hover {
  opacity: 0.9;
}

.reviews-btn ion-icon {
  font-size: 32px;
  color: #fff; /* garante que o ícone fique visível */
}

/* Modal Avaliações */
.modal {
    display: none;
    position: fixed;
    z-index: 9999;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0,0,0,0.6);
    align-items: center;
    justify-content: center;
}

.modal-content {
    background: #fff;
    padding: 25px;
    border-radius: 12px;
    max-width: 400px;
    width: 90%;
    text-align: center; /* centraliza o texto */
    position: relative;
    margin: 0 auto;
    display: flex;
    flex-direction: column;
    align-items: center; /* centraliza todos os elementos horizontalmente */
}

.modal-content input[type="text"],
.modal-content textarea {
    width: 90%; /* ocupa quase toda a largura do modal */
    max-width: 100%;
    margin: 10px 0;
    padding: 10px;
    border-radius: 6px;
    border: 1px solid #ccc;
    text-align: left; /* mantém o texto alinhado à esquerda dentro do campo */
}


.close-btn {
    position: absolute;
    top: 10px;
    right: 15px;
    border: none;
    background: none;
    font-size: 20px;
    cursor: pointer;
}
.modal-content h2 { margin-bottom: 15px; color: #6D0202; }
.stars {
    display: flex;
    justify-content: center;
    gap: 8px;
    margin: 15px 0;
    cursor: pointer;
}
.star { font-size: 28px; color: #ccc; transition: color 0.3s; }
.star.selected, .star:hover { color: #FFD700; }
textarea {
    width: 100%;
    margin-top: 10px;
    border: 1px solid #ccc;
    border-radius: 6px;
    padding: 10px;
    resize: none;
}
.submit-btn {
    background: #6D0202;
    color: #fff;
    border: none;
    padding: 10px 20px;
    margin-top: 15px;
    border-radius: 6px;
    cursor: pointer;
}
.submit-btn:hover { opacity: 0.9; }

/* Responsividade */
@media (max-width: 768px) {
    .header { flex-direction: column; gap: 10px; }
    .logo-text { font-size: 22px; }
    .icons { font-size: 22px; }
    .product-card { width: 180px; height: 280px; }
}
@media (max-width: 480px) {
    .product-card { width: 90%; max-width: 200px; height: 240px; }
}

.icons ion-icon, .reviews-btn ion-icon {
    font-size: 28px;
    color: #CB9441;
}

.reviews-btn ion-icon {
    font-size: 30px;
}


</style>
</head>
<body>

<!-- Navbar -->
<div class="header">
    <div class="logo">
        <div class="logo-circle"></div>
        <div class="logo-text">
            <div>Sete</div>
            <div>Caminhos</div>
        </div>
    </div>
    <div class="icons">
        <ion-icon name="cart-outline"></ion-icon>
        <ion-icon name="person-outline"></ion-icon>
        <ion-icon name="menu-outline"></ion-icon>
    </div>
</div>


<!-- Carrossel de imagens -->
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

<!-- Produtos -->
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

<!-- Footer -->
<div class="footer">
    <p>© 2024 Sete Caminhos - Todos os direitos reservados.</p>
</div>

<!-- Botão de avaliações -->
<button class="reviews-btn" id="openReviewModal">
  <ion-icon name="chatbubble-ellipses-outline" style="font-size: 32px; color: white;"></ion-icon>
</button>



<!-- Modal Avaliações -->
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


<script>
// Carrossel de imagens
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

  // Fechar clicando fora do modal
  window.addEventListener('click', function(e) {
    if (e.target === modal) {
      modal.style.display = 'none';
    }
  });

  // Estrelas
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
