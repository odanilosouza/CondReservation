@extends('layouts.outside')
@section('conteudo')
    <form action="/login" method="get">
        @csrf
        <input id="login" type="text" placeholder="cpf" />
        <input id="senha" type="password" placeholder="Senha" />
        <button type="submit" id="botao">Login</button>

        <p><a id="esqueci-senha" href="/login">Voltar para o Login</a></p>
    </form>
@endsection
