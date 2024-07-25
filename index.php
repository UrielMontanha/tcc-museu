<? session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> Página Inicial </title>
  <?php include("links.php"); ?>
</head>

<body>

  <div class="container-fluid">

    <h1>Museu Municipal</h1>

    <br> <br>

    <ul class="nav">
      <li class="nav-item">
        <a class="nav-link" href="form_cad.php">Cadastrar-se</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="form_login.php">Logar-se</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
    </ul>

  </div>

  <!--<//?php
echo $_SESSION['usuario'] . "ss";
?>-->

</body>

</html>