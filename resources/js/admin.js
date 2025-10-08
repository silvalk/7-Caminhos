import '../css/admin.css'
document.addEventListener('DOMContentLoaded', () => {
    const canvas = document.getElementById('pedidosChart');
    if (!canvas) return;

    const ctx = canvas.getContext('2d');
    canvas.width = 600;
    canvas.height = 300;

    const meses = ['Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out'];
    const pedidos = [10, 25, 15, 30, 20, 35];

    const barWidth = 60;
    const gap = 20;
    const maxValue = Math.max(...pedidos);
    const scale = (canvas.height - 50) / maxValue;

    ctx.fillStyle = '#3498db';

    pedidos.forEach((valor, i) => {
        const x = i * (barWidth + gap) + 50;
        const y = canvas.height - valor * scale;
        ctx.fillRect(x, y, barWidth, valor * scale);
        ctx.fillStyle = '#000';
        ctx.fillText(valor, x + barWidth / 4, y - 5);
        ctx.fillText(meses[i], x + barWidth / 4, canvas.height - 5);
        ctx.fillStyle = '#3498db';
    });
});
