<x-layout title="Editar senha">
    <h1>Alterar senha</h1>

    <form action="{{route('users.updatepass', $user->id) }}" method="POST" class="form-create" >
        @csrf
        @method('PATCH')
        <label for="current_pass">Senha atual:</label>
        <input type="password" name="current_pass" id="current_pass" required>

        <label for="new_pass">Nova senha:</label>
        <input type="password" name="new_pass" id="new_pass" required>
        @error('new_pass')
            <div class="error" style="color: brown">{{$message}}</div>
        @enderror

        <button type="submit" class="button-create">Atualizar Senha</button>
        <a href="{{route('users.show', $user->id)}}" class="custom-link">Cancelar</a><br><br>
    </form>
</x-layout>


<!--
    <label for="password">Senha (deixe em branco para não alterar):</label><br>
        <input type="password" name="password" id="password"><br><br>
-->