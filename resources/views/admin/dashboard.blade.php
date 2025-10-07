@extends('admin.layout')

@section('titulo', 'Dashboard')

@section('conteudo')
<div class="cards">
  <div class="card">Vendas Hoje: <b>R$ 500</b></div>
  <div class="card">Pedidos Pendentes: <b>8</b></div>
  <div class="card">Usuários Ativos: <b>120</b></div>
</div>
@endsection
