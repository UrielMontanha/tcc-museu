<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> Recuperar senha </title>
  <link rel="stylesheet" href="css/style_recuperar_senha.css?=nocache<? rand(); ?>">
</head>

<body>
  <form action="recuperar_senha.php" method="post">
    <div class="wrapper">
      <h1>Recuperar senha</h1>

      <br><br>

      <p>Insira seu e-mail cadastrado para receber as instruções de redefinição de senha.</p>
      
      <div class="input-box">
        <input type="text" name="email" placeholder="Email" required>
        <i class='bx bxs-user'></i>
      </div>

      <p>🔒 Um link para redefinir sua senha será enviado ao seu e-mail.</p>

      <br>

      <button type="submit" class="btn">Enviar</button>

      <br> <br>

      <div class="register-link">
        <p>Não tem conta? <a href="form_cad.php"> Cadastrar-se</a></p>
        <br>
        <p><a href="index.php"> Voltar a página inicial</a></p>
      </div>
    </div>
  </form>
</body>

</html>