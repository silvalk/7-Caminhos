<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Sete Caminhos - Home</title>
<style>
body {
    margin: 0;
    font-family: Arial, sans-serif;
    background-color: #ffe9c8;
    display: flex;
    flex-direction: column;
    min-height: 100vh;
}

/* Header */
.header {
    background-color: #6D0202;
    color: #CB9441;
    padding: 25px 40px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    min-height: 80px;
    position: relative;
}

.logo {
    display: flex;
    align-items: center;
    gap: 12px;
}

.logo-circle {
    width: 55px;
    height: 55px;
    background-color: #fff;
    border-radius: 50%;
}

.logo-text {
    font-family: 'Marcellus', serif;
    font-size: 24px;
    line-height: 1.2;
}

.icons {
    display: flex;
    gap: 25px;
    font-size: 28px;
    color: #CB9441;
    cursor: pointer;
    position: relative;
}

/* Carrinho dropdown */
.cart-dropdown {
    position: absolute;
    top: 60px;
    right: 80px;
    width: 320px;
    background: #fff;
    border-radius: 8px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.2);
    display: none;
    flex-direction: column;
    z-index: 1000;
    padding: 15px;
}

.cart-dropdown h3 {
    margin: 0 0 10px;
    font-size: 18px;
    color: #6D0202;
    border-bottom: 1px solid #ccc;
    padding-bottom: 5px;
}

.cart-item {
    display: flex;
    align-items: center;
    margin-bottom: 10px;
}

.cart-item img {
    width: 50px;
    height: 50px;
    object-fit: cover;
    border-radius: 6px;
    margin-right: 10px;
}

.cart-item-info {
    flex: 1;
}

.cart-item-info p {
    margin: 0;
    font-size: 14px;
    color: #6D0202;
}

.cart-item button {
    background: #6D0202;
    color: #fff;
    border: none;
    border-radius: 4px;
    padding: 2px 6px;
    cursor: pointer;
    font-size: 12px;
}

.cart-total {
    font-weight: bold;
    margin-top: 10px;
    text-align: right;
}

.checkout-btn {
    background: #CB9441;
    color: #fff;
    border: none;
    width: 100%;
    padding: 10px;
    border-radius: 6px;
    margin-top: 10px;
    cursor: pointer;
}

/* Carrossel */
.carousel { width: 100%; max-width: 1000px; margin: 30px auto 15px; position: relative; overflow: hidden; border-radius: 10px; }
.carousel-images { display: flex; transition: transform 0.5s ease-in-out; }
.carousel-images img { width: 100%; height: 420px; object-fit: cover; flex-shrink: 0; }
.carousel-dots { text-align: center; margin-top: 12px; }
.dot { height: 12px; width: 12px; margin: 0 5px; background-color: #fff; border: 2px solid #6D0202; border-radius: 50%; display: inline-block; cursor: pointer; }
.dot.active { background-color: #6D0202; }

/* Produtos */
.products { padding: 50px 20px; text-align: center; }
.products h2 { margin-bottom: 25px; font-size: 26px; color: #6D0202; }
.product-carousel { display: flex; justify-content: center; gap: 25px; flex-wrap: wrap; }
.product-card {
    background: #fff; width: 220px; height: 320px; border-radius: 10px; box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    flex-shrink: 0; display: flex; flex-direction: column; align-items: center; padding: 15px; transition: transform 0.2s;
}
.product-card:hover { transform: translateY(-5px); }
.product-card img { width: 100%; height: 160px; object-fit: cover; border-radius: 6px; }
.product-card h3 { font-size: 18px; margin: 12px 0 5px; }
.product-card p { color: #6D0202; font-weight: bold; font-size: 16px; }
.buy-btn { margin-top: auto; background: #6D0202; color: #FFFAF3; border: none; padding: 10px 18px; border-radius: 6px; cursor: pointer; font-size: 15px; }
.buy-btn:hover { opacity: 0.9; }

/* Footer */
.footer { background-color: #6D0202; color: #fff; padding: 35px 20px; text-align: center; margin-top: auto; font-size: 14px; }

/* Botão de avaliações */
.reviews-btn { position: fixed; bottom: 20px; right: 20px; background-color: #CB9441; color: #fff; border: none; border-radius: 50%; width: 60px; height: 60px; font-size: 28px; cursor: pointer; box-shadow: 0 4px 8px rgba(0,0,0,0.2); }
.reviews-btn:hover { opacity: 0.9; }

/* Modal de avaliação */
.modal { display: none; position: fixed; z-index: 9999; left: 0; top: 0; width: 100%; height: 100%; background-color: rgba(0,0,0,0.6); display: flex; align-items: center; justify-content: center; }
.modal-content { background: #fff; padding: 25px; border-radius: 12px; max-width: 400px; width: 90%; text-align: center; position: relative; }
.close-btn { position: absolute; top: 10px; right: 15px; border: none; background: none; font-size: 20px; cursor: pointer; }
.modal-content h2 { margin-bottom: 15px; color: #6D0202; }
.stars { display: flex; justify-content: center; gap: 8px; margin: 15px 0; cursor: pointer; }
.star { font-size: 28px; color: #ccc; transition: color 0.3s; }
.star.selected, .star:hover { color: #FFD700; }
textarea { width: 100%; margin-top: 10px; border: 1px solid #ccc; border-radius: 6px; padding: 10px; resize: none; }
.submit-btn { background: #6D0202; color: #fff; border: none; padding: 10px 20px; margin-top: 15px; border-radius: 6px; cursor: pointer; }
.submit-btn:hover { opacity: 0.9; }
</style>
</head>
<body>

<!-- Header -->
<div class="header">
    <div class="logo">
        <div class="logo-circle"></div>
        <div class="logo-text">
            <div>Sete</div>
            <div>Caminhos</div>
        </div>
    </div>
    <div class="icons">
        <span id="cartIcon">🛒</span>
        👤
        ☰
        <div class="cart-dropdown" id="cartDropdown">
            <h3>Carrinho</h3>
            <div class="cart-item">
                <img src="https://picsum.photos/id/1040/50/50" alt="Produto">
                <div class="cart-item-info">
                    <p>Produto 1</p>
                    <p>R$ 100,00</p>
                </div>
                <button>❌</button>
            </div>
            <div class="cart-total">Total: R$ 100,00</div>
            <button class="checkout-btn">Finalizar Compra</button>
        </div>
    </div>
</div>

<!-- Carrossel -->
<div class="carousel">
    <div class="carousel-images">
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
            <button class="buy-btn">Comprar</button>
        </div>
        <div class="product-card">
            <img src="https://picsum.photos/id/1041/200/150" alt="Produto 2" loading="lazy">
            <h3>Produto 2</h3>
            <p>R$ 150,00</p>
            <button class="buy-btn">Comprar</button>
        </div>
        <div class="product-card">
            <img src="https://picsum.photos/id/1042/200/150" alt="Produto 3" loading="lazy">
            <h3>Produto 3</h3>
            <p>R$ 200,00</p>
            <button class="buy-btn">Comprar</button>
        </div>
        <div class="product-card">
            <img src="https://picsum.photos/id/1043/200/150" alt="Produto 4" loading="lazy">
            <h3>Produto 4</h3>
            <p>R$ 250,00</p>
            <button class="buy-btn">Comprar</button>
        </div>
    </div>
</section>

<!-- Footer -->
<div class="footer">
    <p>© 2024 Sete Caminhos - Todos os direitos reservados.</p>
</div>

<!-- Botão de avaliações -->
<button class="reviews-btn" onclick="openModal()">💬</button>

<!-- Modal de avaliação -->
<div class="modal" id="reviewModal">
    <div class="modal-content">
        <button class="close-btn" onclick="closeModal()">&times;</button>
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
const images = document.querySelector('.carousel-images');
const dots = document.querySelectorAll('.dot');

function moveToSlide(index) {
    currentIndex = index;
    images.style.transform = `translateX(-${index * 100}%)`;
    dots.forEach(dot => dot.classList.remove('active'));
    dots[index].classList.add('active');
}

setInterval(() => {
    currentIndex = (currentIndex + 1) % dots.length;
    moveToSlide(currentIndex);
}, 4000);

// Modal de avaliação
function openModal() { document.getElementById("reviewModal").style.display = "flex"; }
function closeModal() { document.getElementById("reviewModal").style.display = "none"; }

// Estrelas
const stars = document.querySelectorAll('.star');
const ratingValue = document.getElementById('ratingValue');
const commentBox = document.getElementById('commentBox');

stars.forEach(star => {
    star.addEventListener('click', () => {
        const value = star.getAttribute('data-value');
        ratingValue.value = value;
        stars.forEach(s => s.classList.remove('selected'));
        for (let i = 0; i < value; i++) stars[i].classList.add('selected');
        commentBox.disabled = false;
    });
});

// Carrinho dropdown
const cartIcon = document.getElementById('cartIcon');
const cartDropdown = document.getElementById('cartDropdown');
cartIcon.addEventListener('click', () => {
    cartDropdown.style.display = cartDropdown.style.display === 'flex' ? 'none' : 'flex';
});
</script>

</body>
</html>
