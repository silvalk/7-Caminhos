<head>
  @vite(['resources/js/header.js'])
  @vite(['resources/js/menu-lateral.js'])
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <meta name="csrf-token" content="{{ csrf_token() }}">

</head>
<body>

  <div class="header">
    <div class="logo">
      <a href="{{ route('home') }}">
        <div class="logo-circle">
          <img src="{{ Vite::asset('resources/images/logo-removebg-preview.png') }}" alt="Logo">
        </div>
      </a>
      <div class="logo-text">
        <div>Sete</div>
        <div>Caminhos</div>
      </div>
    </div>
    <div class="icons">
      <div class="cart-icon" style="position:relative; cursor:pointer;">
        <ion-icon name="cart-outline" style="font-size:24px; color: #CB9441;"></ion-icon>
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
      <a href="{{ route('user.profile') }}" aria-label="Perfil do Usuário" title="Perfil do Usuário" style="color: #CB9441;">
      <ion-icon name="person-outline"></ion-icon>
      </a>
      <ion-icon name="menu-outline" style="cursor:pointer;"></ion-icon>
    </div>
  </div>

</body>

<script>
  window.isLoggedIn = @json(auth()->check());
  window.nomeUsuario = @json(auth()->user()?->name ?? '');
</script>
