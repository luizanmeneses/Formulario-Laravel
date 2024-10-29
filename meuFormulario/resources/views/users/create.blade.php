
<x-layout title="Novo Cadastro">
    <a href="/users" class="custom-link">Listar Usuários</a>
    <link rel="stylesheet" href="/css/styles.css">
   
    <h1>Insira seus dados para o cadastro:</h1>
    <form action="{{route('users.store')}}" method="post" class="form-create">
        @csrf
        <label for="name">Nome:</label><br>
        <input type="text" name="name" id="name" value="{{old('name')}}" required><br>
        <!-- Se tiver alguma inconsistência na validação, ele já mostra uma mensagem de erro conforme o parâmetro que passamos -->
        @error('name')
            <div class="error" style="color: brown">{{$message}}</div>
        @enderror
        
        <label for="email">E-mail:</label><br>
        <input type="email" name="email" id="email" value="{{old('email')}}" required><br>
        <!-- O 'old' serve pra que mesmo depois de dar erro, os dados continue na tela -->
        @error('email')
            <div class="error" style="color: brown">{{$message}}</div>
        @enderror
        
        <label for="password">Senha:</label><br>
        <input type="password" name="password" id="password" required><br><br>
        @error('password')
            <div class="error" style="color: brown">{{$message}}</div>
        @enderror
        
        <button type="submit" class="button-create" >Cadastrar</button>
    </form>
</x-layout>
