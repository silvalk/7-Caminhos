@extends('admin.layout')

@section('titulo', 'Adicionar Promoção')

@section('conteudo')

<form action="{{ route('admin.promocoes.store') }}" method="POST" class="form-grid">
    @csrf

    <div class="form-group">
        <label for="produto_id">Produto:</label>
        <select name="produto_id" id="produto_id" required>
            <option value="">Selecione um produto</option>
            @foreach($produtos as $produto)
                <option value="{{ $produto->id }}" {{ old('produto_id') == $produto->id ? 'selected' : '' }}>
                    {{ $produto->nome }}
                </option>
            @endforeach
        </select>
        @error('produto_id')
            <div style="color: red; margin-top: 5px;">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="preco_promocional">Preço Promocional:</label>
        <input type="text" name="preco_promocional" id="preco_promocional" value="{{ old('preco_promocional') }}" required>
        @error('preco_promocional')
            <div style="color: red; margin-top: 5px;">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group full-width">
        <button type="submit" class="produto-add">Salvar Promoção</button>
    </div>
</form>
@endsection
