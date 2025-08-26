<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Registrar 7Caminhos</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet" />
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      background-color: #ffe9c8;
      font-family: 'Poppins', sans-serif;
    }

    a {
      text-decoration: none;
      color: #e5aa4f;
    }

    .register-container {
      width: 600px;
      background-color: #fff;
      margin: 10vh auto;
      border-radius: 20px;
      border: 1px solid #e5aa4f;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
      padding: 40px;
    }

    .register-container h1 {
      color: #6d0202;
      font-size: 40px;
      text-align: center;
    }

    .register-container h2 {
      font-size: 20px;
      color: #e5aa4f;
      text-align: center;
      margin-top: 10px;
    }

    form {
      margin-top: 40px;
    }

    .form-group {
      margin-bottom: 20px;
    }

    label {
      display: block;
      color: #6d0202;
      font-size: 18px;
      margin-bottom: 5px;
    }

    input {
      width: 100%;
      padding: 10px;
      border: none;
      border-bottom: 2px solid #e5aa4f;
      font-size: 16px;
      background-color: transparent;
      outline: none;
    }

    .btn-primary {
      background-color: #6d0202;
      border-radius: 20px;
      margin-top: 30px;
      text-align: center;
    }

    .btn-primary button {
      background: none;
      border: none;
      color: #fff;
      font-size: 18px;
      padding: 15px 0;
      width: 100%;
      cursor: pointer;
    }

    .separator {
      display: flex;
      align-items: center;
      justify-content: center;
      margin: 20px 0;
      color: #e5aa4f;
    }

    .separator-line {
      height: 1px;
      width: 40%;
      background-color: #e5aa4f;
    }

    .separator p {
      margin: 0 10px;
      font-size: 16px;
    }

    .login-link {
      text-align: center;
      color: #6d0202;
      margin-bottom: 10px;
    }

    .social-login {
      text-align: center;
      margin-top: 10px;
    }

    .social-login img {
      height: 40px;
    }
  </style>
</head>
<body>
  <div class="register-container">
    <h1>Registrar</h1>
    <h2>Crie Sua Conta</h2>

    {{-- Exibe erros --}}
    @if ($errors->any())
      <div style="color: red; text-align: center;">
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
        <label for="senha">Senha</label>
        <input type="password" id="senha" name="senha" placeholder="Digite sua senha" required>
      </div>

      <div class="form-group">
        <label for="senha_confirmation">Confirmar Senha</label>
        <input type="password" id="senha_confirmation" name="senha_confirmation" placeholder="Digite novamente a senha" required>
      </div>

      <div class="btn-primary">
        <button type="submit">Registrar</button>
      </div>
    </form>

    <div class="separator">
      <div class="separator-line"></div>
      <p>ou</p>
      <div class="separator-line"></div>
    </div>

    <div class="login-link">
      <h2>Já possui uma conta? <a href="{{ route('login') }}">Entrar</a></h2>
    </div>

    <div class="social-login">
      <a href="#"><img src="google-stroke-rounded.svg" alt="Google Login"></a>
    </div>
  </div>
</body>
</html>
