<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Login Admin</title>
  @vite(['resources/js/admin.js'])
</head>
<body>
  <div class="login-container">
    <form action="{{ route('admin.auth') }}" method="POST">
      @csrf
      <h2>Login Administrador</h2>
      <input type="email" name="email" placeholder="Email" required>
      <input type="password" name="password" placeholder="Senha" required>
      <button type="submit">Entrar</button>
      @error('msg')
        <p style="color:red; font-size:14px;">{{ $message }}</p>
      @enderror
    </form>
  </div>
</body>
</html>
