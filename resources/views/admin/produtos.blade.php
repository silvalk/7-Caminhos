@extends('admin.layout')

@section('titulo', 'Produtos')

@section('conteudo')
<h2>Gerenciar Produtos</h2>
<table>
  <thead>
    <tr>
      <th>ID</th><th>Nome</th><th>Preço</th><th>Estoque</th><th>Ações</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>1</td><td>Cristal Azul</td><td>R$ 12,90</td><td>20</td>
      <td><button>Editar</button> <button>Excluir</button></td>
    </tr>
    <tr>
      <td>2</td><td>Vela Branca</td><td>R$ 9,90</td><td>50</td>
      <td><button>Editar</button> <button>Excluir</button></td>
    </tr>
  </tbody>
</table>
@endsection
