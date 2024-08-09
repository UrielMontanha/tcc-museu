<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> Página Inicial </title>
  <link rel="stylesheet" href="style.css">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'><!--Este link pega o Boxicons-->
</head>

<body>

<div class="wrapper">
    <form action="">
        <h1>Login</h1>
        <div class="input-box">
            <input type="text" placeholder="Nome" required>
            <i class='bx bxs-user'></i>
        </div>
        <div class="input-box">
            <input type="password" placeholder="Senha" required>
            <i class='bx bxs-lock-alt' ></i>
        </div>

        <button type="submit" class="btn">Logar</button>

        <div class="register-link">
            <p>Não tem conta?<a href="form_cad.php">Cadastrar-se</a></p>
        </div>
    </form>
</div>

</body>

</html>