@extends('admin.layout')

@section('titulo', 'Usuários')

@section('conteudo')
<p>Clientes cadastrados no sistema.</p>
<table>
  <thead>
    <tr>
      <th>ID</th><th>Nome</th><th>Email</th><th>Ações</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>1</td><td>Maria Silva</td><td>maria@email.com</td>
      <td><button>Banir</button></td>
    </tr>
  </tbody>
</table>
@endsection
