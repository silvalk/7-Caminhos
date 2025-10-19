@extends('admin.layout')

@section('titulo', 'Produtos')

@section('conteudo')
<h2>Gerenciar Produtos</h2>

<a href="{{ route('admin.produtos.create') }}" class="btn">Adicionar Produto</a>

<table>
  <thead>
    <tr>
      <th>ID</th>
      <th>Nome</th>
      <th>Preço</th>
      <th>Estoque</th>
      <th>Ações</th>
    </tr>
  </thead>
  <tbody>
    @foreach($produtos as $produto)
    <tr>
      <td>{{ $produto->id }}</td>
      <td>{{ $produto->nome }}</td>
      <td>R$ {{ number_format($produto->preco, 2, ',', '.') }}</td>
      <td>{{ $produto->estoque }}</td>
      <td>
        <a href="{{ route('admin.produtos.edit', $produto->id) }}"><button>Editar</button></a>
        <form action="{{ route('admin.produtos.destroy', $produto->id) }}" method="POST" style="display:inline;">
          @csrf
          @method('DELETE')
          <button type="submit" onclick="return confirm('Tem certeza que deseja excluir este produto?')">Excluir</button>
        </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>

{{-- Seção para promoções --}}
<div style="margin-top: 30px; padding-top: 20px; border-top: 2px solid #ccc;">
  <h3>Promoções</h3>
  <a href="{{ route('admin.promocoes.index') }}" class="btn">Ver Promoções</a>
</div>

@endsection
