<x-layout title="Editar dados">
    <h1>Altere dados do Usuário</h1>

    @if($user)
    <form action="{{route('users.update', $user->id) }}" method="POST" class="form-create" >
        @csrf
        @method('PUT')
        <label for="name">Nome:</label>
        <input type="text" name="name" id="name" value="{{$user->name}}" required>
        @error('name')
            <div class="error" style="color: brown">{{$message}}</div>
        @enderror

        <label for="email">E-mail</label>
        <input type="email" name="email" id="email" value="{{$user->email}}" required>
        @error('email')
            <div class="error" style="color: brown">{{$message}}</div>
        @enderror

        <button type="submit" class="button-create">Atualizar</button>
        <a href="{{route('users.show', $user->id)}}" class="custom-link">Cancelar</a>
    </form>
    @else
        <p>Usuário não encontrado.</p>
    @endif
</x-layout>


<!--
    <label for="password">Senha (deixe em branco para não alterar):</label><br>
        <input type="password" name="password" id="password"><br><br>
-->