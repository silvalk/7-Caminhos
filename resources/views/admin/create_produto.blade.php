@extends('admin.layout')

@section('titulo', 'Adicionar Produto')

@section('conteudo')
<h2>Adicionar Produto</h2>

@if ($errors->any())
    <div style="color:red;">
        <ul>
            @foreach ($errors->all() as $erro)
                <li>{{ $erro }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('admin.produtos.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <label>Nome:</label><br>
    <input type="text" name="nome" value="{{ old('nome') }}" required><br><br>

    <label>Preço:</label><br>
    <input type="number" step="0.01" name="preco" value="{{ old('preco') }}" required><br><br>

    <label>Estoque:</label><br>
    <input type="number" name="estoque" value="{{ old('estoque') }}" required><br><br>

    <label>Descrição:</label><br>
    <textarea name="descricao">{{ old('descricao') }}</textarea><br><br>

    <label>Imagem:</label><br>
    <input type="file" name="imagem"><br><br>

    <button type="submit">Adicionar Produto</button>
</form>
@endsection
