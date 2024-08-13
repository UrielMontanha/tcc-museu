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

  <div class="row">
    <div class="col s6 offset-s6">
      <span class="flow-text">
        <!--<img src="1museu.jpg" width="20%" height="20%" alt="Museu">-->
        O Centro Cultural Dr. Pedro Marini é um importante ponto histórico e cultural em Uruguaiana, Rio Grande do Sul. Construído em 1913 por Domingo Francisco Rocco,
        o edifício serviu como quartel-general do Exército de 1930 a 19761. Localizado na Rua Santana, no centro da cidade, o prédio é um marco arquitetônico e cultural1.

        O centro cultural oferece exposições que destacam a história e a cultura da região, incluindo uma interessante coleção de
        armas antigas e jogos tradicionais2. Recentemente, o prédio passou por uma renovação, o que foi muito bem recebido pela comunidade local2.
      </span>
    </div>
  </div>

  <!--<img src="1museu.jpg" width="20%" height="20%" alt="Museu">-->

  <br><br>
  <h4> OLá <?php echo $_SESSION['usuario']; ?> </h4>

</body>

</html>