<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>

    <form action="/" method="get">
        @csrf
        <label for="cpf" class="">cpf</label>
        <input type="cpf" name="cpf" id="cpf" value="" placeholder="Seu cpf" required>

        <label for="password" class="">Password</label>
        <input type="Password" name="Password" id="Password" placeholder="Password" required>

        <button class="button" type="submit"> Login</button>



    </form>

</body>

</html>
