@extends('admin.layout')

@section('titulo', 'Editar Produto')

@section('conteudo')
<h2>Editar Produto</h2>

@if ($errors->any())
    <div style="color:red;">
        <ul>
            @foreach ($errors->all() as $erro)
                <li>{{ $erro }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('admin.produtos.update', $produto->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <label>Nome:</label><br>
    <input type="text" name="nome" value="{{ old('nome', $produto->nome) }}" required><br><br>

    <label>Preço:</label><br>
    <input type="number" step="0.01" name="preco" value="{{ old('preco', $produto->preco) }}" required><br><br>

    <label>Estoque:</label><br>
    <input type="number" name="estoque" value="{{ old('estoque', $produto->estoque) }}" required><br><br>

    <label>Descrição:</label><br>
    <textarea name="descricao">{{ old('descricao', $produto->descricao) }}</textarea><br><br>

    <label>Imagem:</label><br>
    @if ($produto->imagem)
        <img src="{{ asset('storage/'.$produto->imagem) }}" alt="{{ $produto->nome }}" width="100"><br>
    @endif
    <input type="file" name="imagem"><br><br>

    <button type="submit">Atualizar Produto</button>
</form>
@endsection
