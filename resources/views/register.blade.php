<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Registrar - Sete Caminhos</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet" />
  @vite(['resources/js/register.js'])
</head>
<body>
  <div class="register-container">
    <h1>Registrar</h1>
    <h2>Crie sua conta</h2>

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

    <form action="{{ route('register') }}" method="POST">
      @csrf
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" placeholder="Digite seu email" required>
      </div>
      <div class="form-group">
        <label for="password">Senha</label>
        <input type="password" id="password" name="password" placeholder="Digite sua senha" required>
      </div>
        <div class="form-group">
        <label for="password_confirmation">Confirmar Senha</label>
        <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Digite novamente a senha" required>
      </div>

      <div class="btn-primary">
        <button type="submit">Registrar</button>
      </div>
    </form>

    <div class="login-link">
      <p>Já possui uma conta? <a href="{{ route('login') }}">Entrar</a></p>
    </div>
  </div>
</body>
</html>
