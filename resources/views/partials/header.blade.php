
<head>
@vite(['resources/js/header.js'])
</head>
<div class="header">
    <div class="logo">
    <a href="{{ route('home') }}">
<div class="logo-circle"><img src="{{ Vite::asset('resources/images/logo-removebg-preview.png') }}" alt="Logo">
</div></a>
        
        <div class="logo-text">
            <div>Sete</div>
            <div>Caminhos</div>
        </div>
    </div>
    <div class="icons">
<div class="cart-icon" style="position:relative; cursor:pointer;">
  <ion-icon name="cart-outline" style="font-size:24px; color:#8b0000;"></ion-icon>
  <span style="
    position:absolute; 
    top:-5px; 
    right:-10px; 
    background:#8b0000; 
    color:white; 
    border-radius:50%; 
    padding:2px 6px; 
    font-size:12px;" data-count="0">0</span>
</div>

        <ion-icon name="person-outline"></ion-icon>
        <ion-icon name="menu-outline"></ion-icon>
    </div>
</div>
