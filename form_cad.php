<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cadastro</title>
  <?php include 'links.php' ?>
</head>

<body>
  <form action="cadastrar.php" method="POST">

    <div class="container">
      <h1>Cadastrar</h1>

      <br>

      <input type="text" name="nome" placeholder="Nome"> <br> <br>
      <input type="password" name="senha" placeholder="Senha"> <br> <br>
      <input type="email" name="email" placeholder="Email"> <br> <br>
      <input type="date" name="data_nasc"> <br> <br>
      <input type="text" name="cpf" placeholder="CPF">

      <br> <br>

      <input type="submit" value="Cadastrar">
    </div>


</body>

</html>