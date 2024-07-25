<?php
session_start();

require_once "conecta.php";
$conexao = conectar(); 
?>

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
            <h1>Login! Olá <?php echo $_SESSION['usuario']?></h1>

            <br>
            <input type="email" name="email" placeholder="Email"> <br> <br>
            <input type="password" name="senha" placeholder="Senha"> <br> <br>

            <br> <br>

            <button><a href="recuperar-senha.php">Recuperar senha</a></button>
            <button><a href="login.php">Logar</a></button>

        </div>

</body>

</html>