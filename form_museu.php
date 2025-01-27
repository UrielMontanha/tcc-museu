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

    main {
      margin-top: 10%;
    }
  </style>

</head>

<body>

  <?php
  include_once "header.php";
  ?>

  <main class="container wrapper" style="margin-top: 5%;">

    <div class="row">
      <div class="col s12">
        <h2>Objetos do museu</h2>
        <p>Aqui é o local onde você poderá visitar os objetos do museu. Um espaço dedicado a preservar e compartilhar peças históricas, artísticas e culturais que contam histórias fascinantes e conectam gerações. Experiência enriquecedora e inspiradora ao explorar essas preciosidades!</p>
        <div class="divider"> </div>
<br>
      <nav>
        <div class="nav-wrapper #fafafa grey lighten-5">
          <form>
            <div class="input-field">
              <input id="search" type="search" placeholder="Pesquise alguma informação específica aqui..." required>
              <label class="label-icon" for="search"><i class="material-icons black-text">search</i></label>
              <i class="material-icons">close</i>
            </div>
          </form>
        </div>
      </nav>

        <br><br>

      </div>




      <div class="row">
        <?php
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
                <?php

                $texto = $linha['historia'];
                echo "<p class='grey-text text-darken-3 lighten-3'> Conheça a história: </p> <br>";

                echo "<p class='grey-text text-darken-3 lighten-3'>" . mb_strimwidth($texto, 0, 120, '...') . "</p>";

                ?>
              </div>
              <div class="card-action">
                <a href="form_obj.php?id_obj=<?= $linha['id_obj']; ?>">Conhecer objeto</a>
              </div>
            </div>
          </div>



        <?php } ?>

  </main>

</body>

</html>