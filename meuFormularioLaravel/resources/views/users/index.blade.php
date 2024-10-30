
<!--Isso tudo aqui será o que vai aparecer no lugar no slot que está no Layout, onde temos a estrutura base-->
<x-layout title="Lista">
    @if(session('success'))
        <div class="alert alert-success" style="color: rgb(12, 182, 117); font-size: 1.5em">
            {{session('success')}}
        </div>
    @endif
    <br><br>
    <a href="/users/create" class="custom-link">Novo Cadastro</a>
    <h1>Lista dos Usuários Cadastrados:</h1>
<ul>
@foreach ($users as $user)<!-- percorre todos os usuários passados pelo controller - var users -->
    <li>
        <a href="{{route('users.show', $user->id)}}">
            {{$user->id}} - {{$user->name}} - {{$user->email}}
        </a>
    </li>
@endforeach
</ul>
<!-- Exibe uma mensagem se não houver usuários -->
@if($users->isEmpty())
<p style="color: brown">Nenhum usuário cadastrado!</p>
<p style="color: rgb(10, 148, 10)">Para inserir o primeiro usuário, por favor, clique <a href="/users/create" style="color: green">Aqui</a></p>
@endif
</x-layout>
