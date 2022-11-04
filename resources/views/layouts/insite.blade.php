<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CondReserv</title>
    <link rel="stylesheet" href="/css/insite.css">

</head>

<body>
    <header>
        <a href="/"> <img src="/imagens/logobibli.jpg" width="38px" height="37px"></a>

        <form action="/">
            <input id="barraBusca" type="text" name="busca" placeholder="Busque por área..."
                value="<?php echo @$_REQUEST['busca']; ?>">
            <button type="submit"><img src="/imagens/busca.png" width="31px"></button>
        </form>

        <img src="/imagens/usuario.png" width="28px" height="30px">
    </header>
    <div id="conteudo">
        @yield('conteudo')
    </div>
    <footer>
        CondReserv 2022
    </footer>
</body>

</html>
