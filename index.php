<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> Página Inicial </title>
  <link rel="stylesheet" href="css/styles.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>

<body>

  <?php include_once "header.php"; ?>

  <br><br>
  <h4> OLá <?php echo $_SESSION['usuario']; ?> </h4>

  <a href="museu.php">Objetos dos museus</a>

</body>

</html>






<!--  <nav id="sidebar">
    <div id="user">
      <img src="css/imagens/ragnar.jpg" id="user_avatar" alt="Avatar">

      <p id="user_infos">
        <span class="item-description">
          Nome do cara
        </span>
        <span class="item-description">
          O cara é da guerra
        </span>
      </p>
    </div>

    <ul id="side_items">
      <li class="side-item">
        <a href="#">
          <i class="large material-icons account_balance">insert_chart</i>
          <span class="class-description">
            Objetos do museu
          </span>
        </a>
      </li>
    </ul>

  </nav>
  -->

  <!--
  O Centro Cultural Dr. Pedro Marini é um importante ponto histórico e cultural em Uruguaiana, Rio Grande do Sul. Construído em 1913 por Domingo Francisco Rocco,
      o edifício serviu como quartel-general do Exército de 1930 a 19761. Localizado na Rua Santana, no centro da cidade, o prédio é um marco arquitetônico e cultural1.

      O centro cultural oferece exposições que destacam a história e a cultura da região, incluindo uma interessante coleção de
      armas antigas e jogos tradicionais2. Recentemente, o prédio passou por uma renovação, o que foi muito bem recebido pela comunidade local2.
  -->