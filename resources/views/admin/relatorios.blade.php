@extends('admin.layout')

@section('titulo', 'Relatórios')

@section('conteudo')
<div class="cards">
  <div class="card">Total de Vendas: R$ {{ number_format($totalVendas, 2, ',', '.') }}</div>
  <div class="card">Produto Mais Vendido: {{ $produtoMaisVendido }}</div>
</div>
@endsection
