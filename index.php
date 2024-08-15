<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> Página Inicial </title>
  <link rel="stylesheet" href="style_index.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>

<body>

  <?php include_once "header.php"; ?>

  <!---------------------------------------------------------------------------------------------------------->

  <ul id="slide-out" class="sidenav">
    <li>
      <div class="user-view">
        <div class="background">
          <img src="images/office.jpg">
        </div>
        <a href="#user"><img class="circle" src="images/yuna.jpg"></a>
        <a href="#name"><span class="white-text name">John Doe</span></a>
        <a href="#email"><span class="white-text email">jdandturk@gmail.com</span></a>
      </div>
    </li>
    <li><a href="#!"><i class="material-icons">cloud</i>First Link With Icon</a></li>
    <li><a href="#!">Second Link</a></li>
    <li>
      <div class="divider"></div>
    </li>
    <li><a class="subheader">Subheader</a></li>
    <li><a class="waves-effect" href="#!">Third Link With Waves</a></li>
  </ul>
  <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>

  <!---------------------------------------------------------------------------------------------------------->

  <div class="row">
    <div class="col s2 #01579b light-blue darken-4">O Centro Cultural Dr. Pedro Marini é um importante ponto histórico e cultural em Uruguaiana, Rio Grande do Sul. Construído em 1913 por Domingo Francisco Rocco,
      o edifício serviu como quartel-general do Exército de 1930 a 19761. Localizado na Rua Santana, no centro da cidade, o prédio é um marco arquitetônico e cultural1.

      O centro cultural oferece exposições que destacam a história e a cultura da região, incluindo uma interessante coleção de
      armas antigas e jogos tradicionais2. Recentemente, o prédio passou por uma renovação, o que foi muito bem recebido pela comunidade local2.
    </div>
  </div>

  <!--<img src="1museu.jpg" width="20%" height="20%" alt="Museu">-->
  
  <!--<img src="1museu.jpg" width="20%" height="20%" alt="Museu">-->

  <!--#ffa726 orange lighten-1-->

  <br><br>
  <h4> OLá <?php echo $_SESSION['usuario']; ?> </h4>

</body>

</html>