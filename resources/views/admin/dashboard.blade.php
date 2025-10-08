@extends('admin.layout')

@section('titulo', 'Dashboard')

@section('conteudo')
<div class="dashboard-container">
    <!-- Cards de estatísticas -->
    <div class="dashboard-cards">
        <div class="card">
            <h3>Produtos</h3>
            <p>{{ $produtos ?? 0 }}</p>
        </div>
        <div class="card">
            <h3>Pedidos</h3>
            <p>{{ $pedidos ?? 0 }}</p>
        </div>
        <div class="card">
            <h3>Usuários</h3>
            <p>{{ $usuarios ?? 0 }}</p>
        </div>
        <div class="card">
            <h3>Feedbacks</h3>
            <p>{{ $feedbacks ?? 0 }}</p>
        </div>
    </div>

    <div class="chart-container">
        <h3>Pedidos nos últimos 6 meses</h3>
        <canvas id="pedidosChart"></canvas>
    </div>
</div>
@endsection

