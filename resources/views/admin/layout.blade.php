<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Admin - Sete Caminhos</title>
  @vite(['resources/js/admin.js'])
</head>
<body>
  <div class="admin-container">
    <aside class="sidebar">
      <h2>Sete Caminhos</h2>
      <ul>
        <li><a href="{{ route('admin.dashboard') }}">📊 Dashboard</a></li>
        <li><a href="{{ route('admin.produtos') }}">📦 Produtos</a></li>
        <li><a href="{{ route('admin.pedidos') }}">🛒 Pedidos</a></li>
        <li><a href="{{ route('admin.usuarios') }}">👥 Usuários</a></li>
        <li><a href="{{ route('admin.feedbacks') }}">💬 Feedbacks</a></li>
        <li><a href="{{ route('admin.relatorios') }}">📈 Relatórios</a></li>
        <li><a href="{{ route('admin.logout') }}">🚪 Sair</a></li>
      </ul>
    </aside>

    <main class="conteudo">
      <header><h1>@yield('titulo')</h1></header>
      <section>@yield('conteudo')</section>
    </main>
  </div>
    @yield('scripts')

</body>
</html>
