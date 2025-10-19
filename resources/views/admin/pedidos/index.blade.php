
<table>
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
    @foreach ($pedidos as $pedido)
        <tr>
            <td>{{ $pedido->id }}</td>
            <td>{{ $pedido->user->name ?? 'Usuário não encontrado' }}</td>
            <td>
                @foreach (json_decode($pedido->produtos) as $produto)
                    <div>{{ $produto->nome }} x {{ $produto->quantidade }}</div>
                @endforeach
            </td>
            <td>R$ {{ number_format($pedido->subtotal, 2, ',', '.') }}</td>
            <td>R$ {{ number_format($pedido->frete, 2, ',', '.') }}</td>
            <td>R$ {{ number_format($pedido->total, 2, ',', '.') }}</td>
            <td>{{ ucfirst($pedido->status) }}</td>
            <td>
                <a href="{{ route('admin.pedidos.show', $pedido->id) }}">Ver</a>

                <form action="{{ route('admin.pedidos.concluir', $pedido->id) }}" method="POST" style="display:inline-block;">
                    @csrf
                    <button type="submit" onclick="return confirm('Marcar pedido como concluído?')">Concluir</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
