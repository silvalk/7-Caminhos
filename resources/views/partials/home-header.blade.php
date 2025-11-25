<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>headerhome</title>
    @vite(['resources/js/header.js'])
    @vite(['resources/js/menu-lateral.js'])
</head>
<body>
<div class="header" id="header">
    <div class="logo">
        <a href="{{ route('home') }}">
            <div class="logo-circle">
                <img id="logo" src="{{ Vite::asset('resources/images/logo-removebg-preview.png') }}" alt="Logo">
            </div>
        </a>
        <div class="logo-text">
            <div>Sete</div>
            <div>Caminhos</div>
        </div>
    </div>
    <div class="icons">
        <div class="cart-icon" style="position:relative; cursor:pointer;">
            <ion-icon name="cart-outline" style="font-size:30px; color: #CB9441;"></ion-icon>
        </div>
        <a href="{{ route('user.profile') }}" aria-label="Perfil do Usuário" title="Perfil do Usuário" style="color: #CB9441;">
            <ion-icon name="person-outline"></ion-icon>
        </a>
        <ion-icon name="menu-outline" style="cursor:pointer;"></ion-icon>
    </div>
</div>
</body>
</html>

