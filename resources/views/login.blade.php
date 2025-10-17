<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login - Sete Caminhos</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet" />
  @vite(['resources/js/login.js'])
</head>
<body>
  <div class="login-container">
    <h1>Login</h1>
    <h2>Acesse sua conta</h2>

    @if(session('success'))
      <div class="flash-message">{{ session('success') }}</div>
    @endif
    @if($errors->any())
      <div class="error-message">
        @foreach ($errors->all() as $error)
          <p>{{ $error }}</p>
        @endforeach
      </div>
    @endif

    <form action="{{ route('login') }}" method="POST">
      @csrf
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" placeholder="Digite seu email" required>
      </div>
      <div class="form-group">
        <label for="password">Senha</label>
        <input type="password" id="password" name="password" placeholder="Digite sua senha" required>
      </div>
      <div class="forgot-password">
        <a href="#">Esqueci a senha</a>
      </div>
      <div class="btn-primary">
        <button type="submit">Entrar</button>
      </div>
    </form>

    <div class="register-link">
      <p>Não possui uma conta? <a href="{{ route('register') }}">Registrar</a></p>
    </div>
  </div>
</body>
</html>
