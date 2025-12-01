@extends('admin.layout')

@section('titulo', 'Pedidos')

@section('conteudo')
<div class="pedidos-container">

    <!-- Mensagem de feedback -->
    <div id="feedback" class="alert" style="display:none;"></div>

    <table class="pedidos-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Usuário</th>
                <th>Produtos</th>
                <th>Subtotal</th>
                <th>Frete</th>
                <th>Total</th>
                <th>Status</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <!-- Pedido de exemplo funcional -->
            <tr id="pedido-exemplo">
                <td>0</td>
                <td>Matheus Souza</td>
                <td>
                    <div class="produto-item">Vela Branca (4 Unidades) x 3 <span>R$ 60,00</span></div>
                    <div class="produto-item">Kit de Oferenda x 1 <span>R$ 219,90</span></div>
                    <div class="produto-item">Escultura Iemanjá x 1 <span>R$ 130,90</span></div>
                    <div class="produto-item">Cristal de Ametista Rolado x 1 <span>R$ 22,00</span></div>
                    <div class="produto-item">Quartzo Rosa Bruto x 1 <span>R$ 25,00</span></div>
                    <div class="produto-item">Vela Azul Clara – Paz e Serenidade x 1 <span>R$ 6,90</span></div>
                </td>
                <td>R$ 463,80</td>
                <td>R$ 0,90</td>
                <td>R$ 464,70</td>
                <td><span class="status pendente" id="status-exemplo">Pendente</span></td>
                <td>
                    <a href="#" class="btn-ver">Ver</a>
                    <button class="btn-concluir" id="btn-exemplo">Concluir</button>
                </td>
            </tr>

            <!-- Pedidos do banco -->
            @foreach ($pedidos as $pedido)
            <tr>
                <td>{{ $pedido->id }}</td>
                <td>{{ $pedido->user->name ?? 'Usuário não encontrado' }}</td>
                <td>
                    @foreach (json_decode($pedido->produtos) as $produto)
                        <div class="produto-item">{{ $produto->nome }} x {{ $produto->quantidade }} 
                            <span>R$ {{ number_format($produto->subtotal ?? 0, 2, ',', '.') }}</span>
                        </div>
                    @endforeach
                </td>
                <td>R$ {{ number_format($pedido->subtotal, 2, ',', '.') }}</td>
                <td>R$ {{ number_format($pedido->frete, 2, ',', '.') }}</td>
                <td>R$ {{ number_format($pedido->total, 2, ',', '.') }}</td>
                <td><span class="status {{ $pedido->status }}">{{ ucfirst($pedido->status) }}</span></td>
                <td>
                    <a href="{{ route('admin.pedidos.show', $pedido->id) }}" class="btn-ver">Ver</a>
                    <form action="{{ route('admin.pedidos.concluir', $pedido->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        <button type="submit" class="btn-concluir" 
                            onclick="return confirm('Marcar pedido como concluído?')"
                            {{ $pedido->status !== 'pendente' ? 'disabled' : '' }}>
                            Concluir
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<style>
/* Container */
.pedidos-container {
    width: 100%;
    overflow-x: auto;
    font-family: Arial, sans-serif;
    padding-bottom: 20px;
}

/* Mensagem de feedback */
.alert {
    padding: 12px 16px;
    border-radius: 8px;
    margin-bottom: 15px;
    font-weight: bold;
    transition: all 0.4s ease;
    opacity: 0.95;
}

/* Tabela */
.pedidos-table {
    width: 100%;
    border-collapse: collapse;
    background: #fff;
    border-radius: 12px;
    box-shadow: 0 8px 20px rgba(0,0,0,0.08);
    min-width: 800px;
}

.pedidos-table th, .pedidos-table td {
    padding: 14px 18px;
    text-align: left;
    border-bottom: 1px solid #eee;
    vertical-align: top;
}

.pedidos-table th {
    background-color: #8B0000;
    color: #fff;
    font-weight: 600;
    text-transform: uppercase;
    font-size: 14px;
}

.pedidos-table tr:hover {
    background-color: #f9f9f9;
}

/* Produtos */
.produto-item {
    display: flex;
    justify-content: space-between;
    margin-bottom: 4px;
    font-size: 14px;
}
.produto-item span {
    font-weight: bold;
    color: #8B0000;
}

/* Status com transição de cor suave */
.status {
    padding: 6px 14px;
    border-radius: 12px;
    font-weight: bold;
    font-size: 14px;
    text-transform: capitalize;
    color: #fff;
    display: inline-block;
    min-width: 80px;
    text-align: center;
    transition: background-color 0.5s ease, transform 0.2s ease;
}
.status.pendente { background-color: #f0ad4e; }
.status.concluido { background-color: #5cb85c; transform: scale(1.05); }
.status.cancelado { background-color: #d9534f; }

/* Botões */
.btn-ver, .btn-concluir {
    padding: 10px 22px;
    border-radius: 8px;
    font-size: 15px;
    font-weight: bold;
    cursor: pointer;
    text-decoration: none;
    transition: all 0.3s ease;
    display: inline-block;
}
.btn-ver {
    background-color: #007bff;
    color: #fff;
    margin-right: 8px;
}
.btn-ver:hover { background-color: #0056b3; }

.btn-concluir {
    background-color: #28a745;
    color: #fff;
    border: none;
}
.btn-concluir:hover:not(:disabled) { background-color: #218838; transform: scale(1.05); }
.btn-concluir:disabled { opacity: 0.6; cursor: not-allowed; }

/* Responsividade */
@media (max-width: 768px) {
    .pedidos-table {
        min-width: 100%;
        display: block;
        overflow-x: auto;
    }
    .produto-item {
        flex-direction: column;
        gap: 2px;
    }
}
</style>

<script>
// Pedido de exemplo funcional com transição de cor
document.getElementById('btn-exemplo').addEventListener('click', function() {
    if(confirm('Marcar pedido como concluído?')) {
        const status = document.getElementById('status-exemplo');
        status.textContent = 'Concluído';
        status.classList.remove('pendente');
        status.classList.add('concluido');

        this.disabled = true;

        // Feedback
        const feedback = document.getElementById('feedback');
        feedback.textContent = 'Pedido de exemplo marcado como concluído.';
        feedback.className = 'alert success';
        feedback.style.display = 'block';
    }
});
</script>
@endsection
