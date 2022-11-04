@extends('layouts.outside')
@section('conteudo')
    <form action="/register" method="get">
        @csrf

        <input id="login" type="text" placeholder="Apartamento" />
        <input id="senha" type="password" placeholder="Senha" />
        <input id="login" type="text" placeholder="Nome" />
        <input id="senha" type="password" placeholder="Teste" />
        <button type="submit" id="botao">Login</button>

        <p><a id="esqueci-senha" href="#">Esqueci minha senha</a></p>
    </form>
@endsection
