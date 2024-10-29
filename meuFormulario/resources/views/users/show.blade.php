<x-layout title="Ver separadamente">
    <h1>Detalhes Usuário Selecionado</h1>
    <p><strong>ID: </strong>{{ $user->id }} -- <strong>Nome: </strong>{{ $user->name }} -- 
        <strong>Email: </strong>{{ $user->email }}
    </p>
    
    <a href="{{ route('users.edit', $user->id) }}" class="button-show">Editar</a>

    <form action="{{ route('users.destroy', $user->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" onclick="return confirm('Quer mesmo excluir?')"class="button-show">Deletar</button>
    </form>
    
    <a href="/users" class="custom-link" class="button-show">Cancelar</a>
</x-layout>

