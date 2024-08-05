<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> Página Inicial </title>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>
<body>

  <nav>
    <div class="nav-wrapper">
      <a href="#" class="brand-logo">Museu Municipal</a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><a href="form_login.php">Logar-se</a></li>
        <li><a href="form_cad.php">Cadastrar-se</a></li>
        <li><a href="collapsible.html"></a></li>
      </ul>
    </div>
  </nav>

  <br><br>
  <h4> OLá <?php echo $_SESSION['usuario']; ?> </h4>

</body>
</html>