<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>

    <form action="/register" method="post">
        @csrf
        <label for="name" class="">name</label>
        <input type="name" name="name" id="name" value="" placeholder="Seu name" required>

        <label for="cpf" class="">cpf</label>
        <input type="cpf" cpf="cpf" id="cpf" value="" placeholder="Seu cpf" required>

        <label for="password" class="">Password</label>
        <input type="Password" name="Password" id="Password" placeholder="Password" required>

        <label for="password_confirm" class="">password_confirm</label>
        <input type="password_confirm" name="password_confirm" id="password_confirm" placeholder="password_confirm"
            required>

        <button class="button" type="submit"> Login</button>



    </form>

</body>

</html>
