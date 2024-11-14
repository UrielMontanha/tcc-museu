<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Login </title>
    <link rel="stylesheet" href="css/style_form_login.css">
</head>
<body>
    <form action="login.php" method="post">
        <div class="wrapper">
            <form action="">
                <h1>Login</h1>
                <div class="input-box">
                    <input type="text" name="email" placeholder="Email" required>
                    <i class='bx bxs-user'></i>
                </div>
                <div class="input-box">
                    <input type="password" name="senha" placeholder="Senha" required>
                    <i class='bx bxs-lock-alt'></i>
                </div>

                <button type="submit" class="btn">Logar</button>

                <br> <br>

                <div class="register-link">
                    <p>Esqueceu senha? <a href="form_recuperar_senha.php"> Recupecar senha</a></p>
                    <br>
                    <p>Não tem conta? <a href="form_cad.php"> Cadastrar-se</a></p>
                    <br>
                    <p><a href="index.php"> Voltar a página inicial</a></p>
                </div>
            </form>
        </div>
    </form>
</body>
</html>