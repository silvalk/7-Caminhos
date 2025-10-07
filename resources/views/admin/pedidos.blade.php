@extends('admin.layout')

@section('titulo', 'Pedidos')

@section('conteudo')
<p>Lista de pedidos feitos pelos clientes.</p>
<table>
  <thead>
    <tr>
      <th>ID</th><th>Cliente</th><th>Status</th><th>Data</th><th>Ações</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>101</td><td>Lucas A.</td><td>Pendente</td><td>29/08/2025</td>
      <td><button>Ver</button></td>
    </tr>
  </tbody>
</table>
@endsection
