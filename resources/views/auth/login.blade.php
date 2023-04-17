<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Laravel 9 CRUD Usuários</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Laravel 9 CRUD Usuários</h2>
                </div>
            </div>
        </div>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div>
                <label for="email">E-mail:</label>
                <input id="email" type="email" name="email" required autofocus>
            </div>

            <div>
                <label for="password">Senha:</label>
                <input id="password" type="password" name="password" required>
            </div>
            <button type="submit">Entrar</button>
        </form>
    </div>
</body>