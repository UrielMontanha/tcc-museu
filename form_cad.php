<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Cadastrar </title>
    <link rel="stylesheet" href="css/style_form_cad.css">
</head>
<body>
<form action="cadastrar.php" method="post">
        <div class="wrapper_cad">
            <form action="">
                <h1>Cadastrar</h1>
                <div class="input-box_cad">
                    <input type="text" name="nome" placeholder="Nome" required>
                    <i class='bx bxs-user_cad'></i>
                </div>
                <div class="input-box_cad">
                    <input type="password" name="senha" placeholder="Senha" required>
                </div>
                <div class="input-box_cad">
                    <input type="email" name="email" placeholder="Email" required>
                </div>
                <!--<div class="input-box_cad">
                    <input type="data" name="data_nasc" placeholder="Data de nascimento" required>
                </div>-->
                <div class="input-box_cad">
                    <input type="text" name="cpf" placeholder="CPF" required>
                </div>

                <button type="submit" class="btn_cad">Cadastrar-se</button>

                <div class="register-link_cad">
                    <p>Já tem uma conta? <br><a href="form_login.php">Logar-se</a></p>
                </div>

                <div class="register-link_cad">
                    <p><a href="index.php">Voltar a página inicial</a></p>
                </div>
            </form>
        </div>
    </form>
</body>
</html>