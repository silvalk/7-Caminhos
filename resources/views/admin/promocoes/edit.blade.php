@extends('admin.layout')

@section('titulo', 'Editar Promoção')

@section('conteudo')
<h2>Editar Promoção</h2>

@if ($errors->any())
    <div style="color: red;">
        <ul>
            @foreach ($errors->all() as $erro)
                <li>{{ $erro }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('admin.promocoes.update', $promocao->id) }}" method="POST" class="form-grid">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="produto_id">Produto:</label>
        <select name="produto_id" id="produto_id" required>
            <option value="">Selecione um produto</option>
            @foreach($produtos as $produto)
                <option value="{{ $produto->id }}" {{ $promocao->produto_id == $produto->id ? 'selected' : '' }}>
                    {{ $produto->nome }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="preco_promocional">Preço Promocional:</label>
        <input type="text" name="preco_promocional" id="preco_promocional" value="{{ old('preco_promocional', $promocao->preco_promocional) }}" required>
    </div>

    


    <div class="form-group full-width">
        <button type="submit" class="produto-add">Atualizar Promoção</button>
    </div>
</form>
@endsection
