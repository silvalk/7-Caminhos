@extends('admin.layout')

@section('titulo', 'Adicionar Produto')

@section('conteudo')

@if ($errors->any())
    <div style="color:red;">
        <ul>
            @foreach ($errors->all() as $erro)
                <li>{{ $erro }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('admin.produtos.store') }}" method="POST" enctype="multipart/form-data" class="form-grid">
    @csrf

    <div class="form-group">
        <label>Nome:</label>
        <input type="text" name="nome" value="{{ old('nome') }}" required>
    </div>

    <div class="form-group">
        <label>Preço:</label>
        <input type="number" step="0.01" name="preco" value="{{ old('preco') }}" required>
    </div>

    <div class="form-group">
        <label>Estoque:</label>
        <input type="number" name="estoque" value="{{ old('estoque') }}" required>
    </div>

    <div class="form-group">
        <label>Categoria:</label>
        <select name="categoria" required>
            <option value="">Selecione</option>
            <option value="Cristais" {{ old('categoria', $produto->categoria ?? '') == 'Cristais' ? 'selected' : '' }}>Cristais</option>
            <option value="Ervas" {{ old('categoria', $produto->categoria ?? '') == 'Ervas' ? 'selected' : '' }}>Ervas</option>
            <option value="Miçangas" {{ old('categoria', $produto->categoria ?? '') == 'Miçangas' ? 'selected' : '' }}>Miçangas</option>
            <option value="Velas" {{ old('categoria', $produto->categoria ?? '') == 'Velas' ? 'selected' : '' }}>Velas</option>
            <option value="Kits" {{ old('categoria', $produto->categoria ?? '') == 'Kits' ? 'selected' : '' }}>Kits</option>
            <option value="Imagens" {{ old('categoria', $produto->categoria ?? '') == 'Imagens' ? 'selected' : '' }}>Imagens</option>
        </select>
    </div>

    <div class="form-group full-width">
        <label>Descrição:</label>
        <textarea name="descricao">{{ old('descricao') }}</textarea>
    </div>

    <div class="form-group full-width">
        <label>Imagem:</label>
        <input type="file" name="imagem">
    </div>

    <div class="form-group full-width">
        <button type="submit" class="produto-add">Adicionar Produto</button>
    </div>
</form>


@endsection
