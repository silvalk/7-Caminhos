<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login - Sete Caminhos</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet" />
  <style>
    * { margin: 0; padding: 0; box-sizing: border-box; }
    body { background-color: #ffe9c8; font-family: 'Poppins', sans-serif; display: flex; justify-content: center; align-items: center; min-height: 100vh; }
    .login-container {
      width: 90%; max-width: 400px; background-color: #fff; padding: 30px; border-radius: 20px;
      border: 1px solid #e5aa4f; box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    }
    h1 { color: #6d0202; font-size: 32px; text-align: center; }
    h2 { font-size: 18px; color: #e5aa4f; text-align: center; margin-top: 5px; }
    .form-group { margin-bottom: 15px; }
    label { display: block; color: #6d0202; font-size: 14px; margin-bottom: 5px; }
    input {
      width: 100%; padding: 8px; border: none; border-bottom: 2px solid #e5aa4f;
      font-size: 14px; background-color: transparent; outline: none;
    }
    .btn-primary { background-color: #6d0202; border-radius: 20px; margin-top: 20px; text-align: center; }
    .btn-primary button { background: none; border: none; color: #fff; font-size: 16px; padding: 12px 0; width: 100%; cursor: pointer; }
    .forgot-password { text-align: right; margin-top: 10px; }
    .register-link { text-align: center; color: #6d0202; margin-top: 15px; }
    .flash-message { text-align: center; color: green; margin: 10px 0; font-weight: bold; }
    .error-message { text-align: center; color: red; margin: 10px 0; }
  </style>
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
        <label for="senha">Senha</label>
        <input type="password" id="senha" name="senha" placeholder="Digite sua senha" required>
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
