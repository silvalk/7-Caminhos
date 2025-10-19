@extends('admin.layout')

@section('titulo', 'Adicionar Promoção')

@section('conteudo')
<h2>Adicionar Promoção</h2>

<form action="{{ route('admin.promocoes.store') }}" method="POST">
    @csrf

    <div>
        <label for="produto_id">Produto:</label>
        <select name="produto_id" id="produto_id" required>
            <option value="">Selecione um produto</option>
            @foreach($produtos as $produto)
                <option value="{{ $produto->id }}">{{ $produto->nome }}</option>
            @endforeach
        </select>
    </div>

    <div>
        <label for="preco_promocional">Preço Promocional:</label>
        <input type="text" name="preco_promocional" id="preco_promocional" required>
    </div>

    <button type="submit">Salvar Promoção</button>
</form>
@endsection
