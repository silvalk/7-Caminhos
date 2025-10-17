@extends('admin.layout')

@section('titulo', 'Detalhes do Pedido')

@section('conteudo')
    <h2>Pedido #{{ $pedido->id }}</h2>
    <p><strong>Cliente:</strong> {{ $pedido->user->name ?? 'Desconhecido' }}</p>
    <p><strong>CEP:</strong> {{ $pedido->cep }}</p>
    <p><strong>Subtotal:</strong> R$ {{ number_format($pedido->subtotal, 2, ',', '.') }}</p>
    <p><strong>Frete:</strong> R$ {{ number_format($pedido->frete, 2, ',', '.') }}</p>
    <p><strong>Total:</strong> R$ {{ number_format($pedido->total, 2, ',', '.') }}</p>

    <h3>Produtos:</h3>
    <ul>
        @foreach ($pedido->produtos as $produto)
            <li>
                {{ $produto['nome'] ?? 'Produto desconhecido' }} - 
                {{ $produto['quantidade'] ?? 1 }} un. 
                @ R$ {{ number_format($produto['preco'] ?? 0, 2, ',', '.') }}
            </li>
        @endforeach
    </ul>

    <a href="{{ route('admin.pedidos') }}">Voltar</a>
@endsection
