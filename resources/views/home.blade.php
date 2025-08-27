<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Home - Sete Caminhos</title>
<link href="https://fonts.googleapis.com/css2?family=Marcellus&display=swap" rel="stylesheet">
<style>
  * { margin: 0; padding: 0; box-sizing: border-box; }
  body { background-color: #ffe9c8; font-family: 'Poppins', sans-serif; display: flex; flex-direction: column; align-items: center; }

  /* Navbar */
  .navbar {
    width: 100%; background-color: #6D0202;
    display: flex; align-items: center; justify-content: space-between;
    padding: 20px 30px; min-height: 70px;
  }
  .navbar-left { display: flex; align-items: center; }
  .logo-circle { width: 50px; height: 50px; border-radius: 50%; background: #fff; margin-right: 15px; }
  .brand { color: #CB9441; font-family: 'Marcellus', serif; font-size: 22px; line-height: 24px; text-align: center; }
  .navbar-right { display: flex; align-items: center; gap: 15px; }
  .navbar-right img, .navbar-right button { width: 30px; height: 30px; cursor: pointer; }
  .logout-btn { background: none; border: none; cursor: pointer; }

  /* Flash message */
  .flash-message { text-align: center; color: green; margin: 20px 0; font-weight: bold; }

  /* Carrossel de imagens */
  .carousel-container { width: 90%; max-width: 1000px; border-radius: 12px; overflow: hidden; margin: 30px auto; }
  .carousel-images { display: flex; transition: transform 0.5s ease-in-out; }
  .carousel-images img { width: 100%; flex-shrink: 0; object-fit: cover; display: block; }
  .dots { display: flex; justify-content: center; margin: 10px 0; gap: 10px; }
  .dot { width: 15px; height: 15px; border-radius: 50%; border: 2px solid #6D0202; background: #fff; cursor: pointer; }
  .dot.active { background: #6D0202; }

  /* Carrossel de produtos */
  .products-section { margin: 40px auto; text-align: center; width: 90%; max-width: 1200px; }
  .products-title { font-size: 24px; font-weight: bold; color: #6D0202; margin-bottom: 20px; }
  .products-carousel-container { display: flex; justify-content: center; overflow-x: auto; }
  .products-carousel {
    display: flex; flex-wrap: nowrap; gap: 20px; padding: 10px;
    scroll-behavior: smooth; scroll-snap-type: x mandatory;
    justify-content: flex-start;
  }
  .products-carousel::-webkit-scrollbar { height: 8px; }
  .products-carousel::-webkit-scrollbar-thumb { background-color: #6D0202; border-radius: 4px; }

  .product-card {
    flex: 0 0 auto; scroll-snap-align: start; width: 220px; height: 300px; background: #fff; border-radius: 12px;
    box-shadow: 0 4px 10px rgba(0,0,0,0.1); display: flex; flex-direction: column; justify-content: space-between; padding: 15px;
  }
  .product-card img { width: 100%; height: 180px; object-fit: cover; border-radius: 8px; }
  .buy-btn { background: #6D0202; color: #FFFAF3; border: none; border-radius: 20px; padding: 10px; cursor: pointer; font-size: 16px; }

  /* Footer */
  .footer { background: #6D0202; color: #FFFAF3; text-align: center; padding: 25px 20px; margin-top: 50px; width: 100%; min-height: 70px; }

  /* Responsividade */
  @media (max-width: 1024px) {
    .navbar { flex-direction: column; gap: 10px; padding: 15px; }
    .products-carousel { gap: 15px; }
    .product-card { width: 180px; height: 280px; }
  }
  @media (max-width: 768px) {
    .brand { font-size: 20px; }
    .navbar-right img, .navbar-right button { width: 25px; height: 25px; }
    .product-card { width: 150px; height: 250px; }
    .carousel-container { width: 95%; }
  }
  @media (max-width: 480px) {
    .product-card { width: 90%; max-width: 200px; height: 240px; }
    .products-carousel { gap: 10px; padding: 5px; justify-content: center; }
  }
</style>
</head>
<body>

<!-- Navbar -->
<div class="navbar">
  <div class="navbar-left">
    <div class="logo-circle"></div>
    <div class="brand">Sete<br>Caminhos</div>
  </div>
  <div class="navbar-right">
    <img src="https://img.icons8.com/ios-filled/50/CB9441/shopping-cart.png" alt="Carrinho">
    <img src="https://img.icons8.com/ios-filled/50/CB9441/user.png" alt="Usuário">
    <img src="https://img.icons8.com/ios-filled/50/CB9441/menu--v1.png" alt="Menu">
    <form action="{{ route('logout') }}" method="POST" style="display:inline;">
      @csrf
      <button type="submit" class="logout-btn" title="Sair">
        <img src="https://img.icons8.com/ios-filled/50/CB9441/logout-rounded-left.png" alt="Logout">
      </button>
    </form>
  </div>
</div>

@if(session('success'))
    <div class="flash-message">{{ session('success') }}</div>
@endif

<!-- Carrossel de imagens -->
<div class="carousel-container">
  <div class="carousel-images">
    <img src="https://source.unsplash.com/1000x400/?nature,water" alt="Imagem 1">
    <img src="https://source.unsplash.com/1000x400/?forest" alt="Imagem 2">
    <img src="https://source.unsplash.com/1000x400/?mountain" alt="Imagem 3">
  </div>
</div>
<div class="dots">
  <div class="dot active" onclick="moveToSlide(0)"></div>
  <div class="dot" onclick="moveToSlide(1)"></div>
  <div class="dot" onclick="moveToSlide(2)"></div>
</div>

<!-- Carrossel de produtos -->
<div class="products-section">
  <div class="products-title">Destaques</div>
  <div class="products-carousel-container">
    <div class="products-carousel">
      <div class="product-card">
        <img src="https://source.unsplash.com/200x200/?product1" alt="Produto 1">
        <button class="buy-btn" onclick="window.location.href='{{ route('products') }}'">Comprar</button>
      </div>
      <div class="product-card">
        <img src="https://source.unsplash.com/200x200/?product2" alt="Produto 2">
        <button class="buy-btn" onclick="window.location.href='{{ route('products') }}'">Comprar</button>
      </div>
      <div class="product-card">
        <img src="https://source.unsplash.com/200x200/?product3" alt="Produto 3">
        <button class="buy-btn" onclick="window.location.href='{{ route('products') }}'">Comprar</button>
      </div>
      <div class="product-card">
        <img src="https://source.unsplash.com/200x200/?product4" alt="Produto 4">
        <button class="buy-btn" onclick="window.location.href='{{ route('products') }}'">Comprar</button>
      </div>
    </div>
  </div>
</div>

<!-- Footer -->
<div class="footer">
  <p>© 2024 Sete Caminhos - Todos os direitos reservados.</p>
</div>

<script>
  // Carrossel de imagens
  let currentIndex = 0;
  const images = document.querySelectorAll('.carousel-images img');
  const totalSlides = images.length;
  const carouselImages = document.querySelector('.carousel-images');
  const dots = document.querySelectorAll('.dot');

  function moveToSlide(index) {
    currentIndex = index;
    carouselImages.style.transform = `translateX(${-index * 100}%)`;
    dots.forEach(dot => dot.classList.remove('active'));
    dots[index].classList.add('active');
  }

  setInterval(() => {
    currentIndex = (currentIndex + 1) % totalSlides;
    moveToSlide(currentIndex);
  }, 5000);
</script>

</body>
</html>
