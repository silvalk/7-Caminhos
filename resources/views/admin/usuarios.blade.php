@extends('admin.layout')

@section('titulo', 'Usuários')

@section('conteudo')
<p>Clientes cadastrados no sistema.</p>

@if(session('success'))
    <div style="color:green;">{{ session('success') }}</div>
@endif

<table>
  <thead>
    <tr>
      <th>ID</th><th>Nome</th><th>Email</th><th>Ações</th>
    </tr>
  </thead>
  <tbody>
    @forelse ($usuarios as $usuario)
    <tr>
      <td>{{ $usuario->id }}</td>
      <td>{{ $usuario->name }}</td>
      <td>{{ $usuario->email }}</td>
      <td>
        <form action="{{ route('admin.usuarios.excluir', $usuario->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir este usuário?');">
          @csrf
          @method('DELETE')
          <button type="submit">Excluir</button>
        </form>


      </td>
    </tr>
    @empty
    <tr>
      <td colspan="4">Nenhum usuário encontrado.</td>
    </tr>
    @endforelse
  </tbody>
</table>
@endsection

