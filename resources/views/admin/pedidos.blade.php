@extends('admin.layout')

@section('titulo', 'Pedidos')

@section('conteudo')
    <p>Lista de pedidos feitos pelos clientes.</p>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Cliente</th>
                <th>Status</th>
                <th>Total</th>
                <th>Data</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($pedidos as $pedido)
                <tr>
                    <td>{{ $pedido->id }}</td>
                    <td>{{ $pedido->user->name ?? 'Desconhecido' }}</td>
                    <td>Pendente</td> {{-- Isso pode ser um campo no futuro --}}
                    <td>R$ {{ number_format($pedido->total, 2, ',', '.') }}</td>
                    <td>{{ $pedido->created_at->format('d/m/Y H:i') }}</td>
                    <td>
                        <a href="{{ route('admin.pedidos.show_pedido', $pedido->id) }}">Ver</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">Nenhum pedido encontrado.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
