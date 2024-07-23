<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <?php include 'links.php' ?>
</head>

<body>
    <form action="login.php" method="POST">

        <div class="container">
            <h1>Login</h1>

            <br>

            <input type="text" name="nome" placeholder="Nome"> <br> <br>
            <input type="password" name="senha" placeholder="Senha"> <br> <br>
            <input type="email" name="email" placeholder="Email"> <br> <br>
            <input type="text" name="cpf" placeholder="CPF">

            <br> <br>

            <button><a href="recuperar-senha.php">Recuperar senha</a></button>
            <button><a href="login.php">Logar</a></button>

        </div>

</body>

</html>