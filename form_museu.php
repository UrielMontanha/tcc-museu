<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> Museu </title>
  <link rel="stylesheet" href="css/styles.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <style>
    .body {
      font-family: Arial, Helvetica, sans-serif;
    }

    .card-content {
      color: black;
    }

    .row {
      margin-top: 50px;
    }
  </style>

</head>

<body>

  <?php
  include_once "header.php";
  ?>

  <main class="container">

    <div class="row">
      <?php
      include_once "sidebar.php";
      include_once "conecta.php";

      $conexao = conectar();


      $sql = "SELECT * FROM objeto";

      $resultado = executarSQL($conexao, $sql);


      while ($linha = mysqli_fetch_assoc($resultado)) {
      ?>


        <div class="col s12 m4">
          <div class="card">
            <div class="card-image">
              <img src="css/imagens_obj/<?php echo $linha['arquivo']; ?>" height="220px">
              <span class="card-title"><?php echo $linha['nome']; ?></span>
            </div>
            <div class="card-content">
              <p>Como limitar esta parte por número de letras?</p>
            </div>
            <div class="card-action">
              <a href="form_obj.php?id_obj= <?= $linha['id_obj']; ?>">Visitar objeto</a>
            </div>
          </div>
        </div>



      <?php } ?>

  </main>

</body>

</html>