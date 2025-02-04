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
          <form method="get">
            <div class="input-field">
              <input name="pesquisar" id="search" type="search" placeholder="Pesquise por informações mais específicas aqui...">
              <label class="label-icon" for="search"><i class="material-icons black-text">search</i></label>
              <i class="material-icons">close</i>
            </div>
          </form>
        </div>
      </nav>

      <?php
      if(isset($_GET['pesquisar'])){

        $a = $_GET['pesquisar'];

        $sql = "SELECT * FROM objeto WHERE nome LIKE '%$a%' or historia LIKE '%$a%' or data_criacao LIKE '%$a%' or condicao LIKE '%$a%' or pais_origem LIKE '%$a%' ";

      }else{

        $sql = "SELECT * FROM objeto";
      }
      ?>

        <br><br>

      </div>




      <div class="row">
        <?php
        include_once "conecta.php";

        $conexao = conectar();

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

        <br><br><br>

        <footer class="page-footer #212121 grey darken-4">
          <div class="container">
            <div class="row">
              <div class="col l6 s12">
                <h5 class="white-text">Casa da Cultura Dr. Pedro Marini</h5>
                <p class="grey-text text-lighten-4">Museu aprovado pela Lei Mun n° 1475/79. Tombado pelo patrimonio Histórico do Município, n°147/87.</p>
              </div>
              <div class="col l4 offset-l2 s12">
                <h5 class="white-text">Links e Informações</h5>
                <ul>
                  <li><a class="grey-text text-lighten-3" href="https://www.uruguaiana.rs.gov.br/portal/turismo/0/9/15/centro-cultural-dr-pedro-marini" style="text-decoration: underline;">Turismo em Uruguaiana</a></li>
                  <li><a class="grey-text text-lighten-3" href="https://www.tripadvisor.com.br/Attraction_Review-g681230-d4453220-Reviews-Centro_Cultural_Dr_Pedro_Marini-Uruguaiana_State_of_Rio_Grande_do_Sul.html" style="text-decoration: underline;">Tripadvisor</a></li>
                  <li>Local: 2720 RUA. Santana Uruguaiana, Rio Grande do Sul</li>
                  <li>Celular: (55) 55 95555-5555</li>
                </ul>
              </div>
            </div>
          </div>
          <div class="footer-copyright black">
            <div class="container">
            © 2014 Copyright Text
            <a class="grey-text text-lighten-4 right" href="#!"></a>
            </div>
          </div>
        </footer>

</body>

</html>