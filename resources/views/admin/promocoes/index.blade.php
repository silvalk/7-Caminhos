@extends('admin.layout')

@section('titulo', 'Promoções')

@section('conteudo')
    <h2>Gerenciar Promoções</h2>

    <a href="{{ route('admin.promocoes.create') }}" class="btn">Adicionar Promoção</a>

    <table>
        <thead>
            <tr>
                <th>Produto</th>
                <th>Preço Original</th>
                <th>Preço Promocional</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($promocoes as $promocao)
                <tr>
                    <td>{{ $promocao->produto->nome }}</td>
                    <td>R$ {{ number_format($promocao->produto->preco, 2, ',', '.') }}</td>
                    <td>R$ {{ number_format($promocao->preco_promocional, 2, ',', '.') }}</td>
                    <td>
                        <a href="{{ route('admin.promocoes.edit', $promocao->id) }}"><button>Editar</button></a>
                        <form action="{{ route('admin.promocoes.destroy', $promocao->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Remover esta promoção?')">Excluir</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">Nenhuma promoção ativa no momento.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
