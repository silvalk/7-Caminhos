@extends('admin.layout')

@section('titulo', 'Dashboard')

@section('conteudo')
<div class="dashboard-container">

    {{-- Blocos superiores --}}
    <div class="dashboard-cards">
        <div class="card">
            <h3>Produtos</h3>
            <p>{{ $produtosCount ?? 0 }}</p>
        </div>
        <div class="card">
            <h3>Pedidos Pendentes</h3>
            <p>{{ $pedidosPendentes ?? 0 }}</p>
        </div>
        <div class="card">
            <h3>Usuários</h3>
            <p>{{ $usuariosCount ?? 0 }}</p>
        </div>
        <div class="card">
            <h3>Feedbacks</h3>
            <p>{{ $feedbacksCount ?? 0 }}</p>
        </div>
    </div>

    {{-- Gráfico abaixo --}}
    <div class="chart-container">
        <h3>Pedidos nos últimos 30 dias</h3>
        <canvas id="pedidosChart"></canvas>
    </div>
</div>
@endsection

@section('scripts')
<script>
  document.addEventListener('DOMContentLoaded', () => {
    const canvas = document.getElementById('pedidosChart');
    if (!canvas) return;

    const ctx = canvas.getContext('2d');
    canvas.width = 700;
    canvas.height = 350;

    const pedidos = @json(array_values($pedidosUltimos30Dias));
    const labels = @json(array_keys($pedidosUltimos30Dias));

    const barWidth = 30;
    const gap = 15;
    const maxValue = Math.max(...pedidos, 10);
    const padding = 50;
    const chartHeight = canvas.height - padding * 2;

    ctx.clearRect(0, 0, canvas.width, canvas.height);

    ctx.strokeStyle = '#333';
    ctx.lineWidth = 2;
    ctx.beginPath();
    ctx.moveTo(padding, padding);
    ctx.lineTo(padding, canvas.height - padding);
    ctx.lineTo(canvas.width - padding, canvas.height - padding);
    ctx.stroke();

    ctx.fillStyle = '#555';
    ctx.font = '12px Arial';

    pedidos.forEach((valor, i) => {
      const x = padding + i * (barWidth + gap) + gap;
      const barHeight = (valor / maxValue) * chartHeight;
      const y = canvas.height - padding - barHeight;

      ctx.fillStyle = '#3498db';
      ctx.fillRect(x, y, barWidth, barHeight);

      ctx.fillStyle = '#000';
      ctx.fillText(valor, x + barWidth / 4, y - 5);
      ctx.fillText(labels[i], x, canvas.height - padding + 15);
    });

    ctx.strokeStyle = '#ddd';
    ctx.lineWidth = 1;
    const steps = 5;
    for (let i = 1; i <= steps; i++) {
      const y = canvas.height - padding - (chartHeight / steps) * i;
      ctx.beginPath();
      ctx.moveTo(padding, y);
      ctx.lineTo(canvas.width - padding, y);
      ctx.stroke();

      ctx.fillStyle = '#666';
      const label = Math.round((maxValue / steps) * i);
      ctx.fillText(label, padding - 30, y + 4);
    }
  });
</script>
@endsection
