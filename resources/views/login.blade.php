<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login 7Caminhos</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet" />
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

    .login-container {
      width: 600px;
      background-color: #fff;
      margin: 10vh auto;
      border-radius: 20px;
      border: 1px solid #e5aa4f;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
      padding: 40px;
    }

    .login-container h1 {
      color: #6d0202;
      font-size: 40px;
      text-align: center;
    }

    .login-container h2 {
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
      margin-left: 40px;
    }

    input {
      display: block;
      width: 85%;
      margin: 0 auto;
      padding: 10px;
      font-size: 16px;
      border: none;
      border-bottom: 2px solid #e5aa4f;
      background-color: transparent;
      outline: none;
    }

    .forgot-password {
      text-align: right;
      margin: 10px 40px 20px 0;
    }

    .btn-primary {
      width: 480px;
      background-color: #6d0202;
      margin: auto;
      border-radius: 20px;
      text-align: center;
      margin-top: 20px;
      margin-bottom: 20px;
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
      color: #e5aa4f;
      margin-top: 10px;
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

    .register-link {
      margin-top: 20px;
      text-align: center;
      color: #6d0202;
    }

    .social-login {
      text-align: center;
      margin-top: 30px;
    }

    .social-login img {
      height: 40px;
    }
  </style>
</head>
<body>
  <div class="login-container">
    <h1>Login</h1>
    <h2>Acesse Sua Conta</h2>

    {{-- Exibe erros --}}
    @if ($errors->any())
      <div style="color: red; text-align: center;">
        @foreach ($errors->all() as $error)
          <p>{{ $error }}</p>
        @endforeach
      </div>
    @endif

    <form action="{{ route('login') }}" method="POST">
      @csrf

      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" placeholder="Digite seu email" required />
      </div>

      <div class="form-group">
        <label for="senha">Senha</label>
        <input type="password" id="senha" name="senha" placeholder="Digite sua senha" required />
      </div>

      <div class="forgot-password">
        <a href="#">Esqueci a Senha</a>
      </div>

      <div class="btn-primary">
        <button type="submit">Entrar</button>
      </div>
    </form>

    <div class="separator">
      <div class="separator-line"></div>
      <p>ou</p>
      <div class="separator-line"></div>
    </div>

    <div class="register-link">
      <h2>Não possui uma conta? <a href="{{ route('register') }}">Cadastrar</a></h2>
    </div>

    <div class="social-login">
      <a href="#"><img src="google-stroke-rounded.svg" alt="Login com Google" /></a>
    </div>
  </div>
</body>
</html>
