@extends('admin.layout')

@section('titulo', 'Feedbacks')

@section('conteudo')
    <h1>Comentários e Avaliações dos Clientes</h1>

    @if(session('success'))
        <div style="color: green;">{{ session('success') }}</div>
    @endif

    @if($feedbacks->isEmpty())
        <p>Nenhum feedback encontrado.</p>
    @else
        <table border="1" cellpadding="8" cellspacing="0" style="width: 100%; border-collapse: collapse;">
            <thead>
                <tr>
                    <th>Usuário</th>
                    <th>Mensagem</th>
                    <th>Criado em</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($feedbacks as $feedback)
                    <tr>
                        <td>{{ $feedback->user->name ?? 'Anônimo' }}</td>
                        <td>{{ $feedback->mensagem }}</td>
                        <td>{{ $feedback->created_at->format('d/m/Y H:i') }}</td>
                        <td>
                            <form action="{{ route('admin.feedbacks.destroy', $feedback->id) }}" method="POST" onsubmit="return confirm('Deseja realmente excluir este feedback?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" style="color: red;">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
