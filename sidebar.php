<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/style_sidebar1.css">
</head>

<body>

  <style>
    .sidenav li a {
      color: white;
    }
  </style>

  <?php
  $pagina_corrente = basename($_SERVER['SCRIPT_NAME']);

  ?>
  <ul id="slide-out" class="sidenav #212121 grey darken-4 sidenav-fixed">
    <br><br><br><br>
    <li>
      <h5> <?php if (isset($_SESSION['usuario'])) {
              echo "OLá " . $_SESSION['usuario'];
            } else {
              echo "<p> Usuário anônimo</p>";
            } ?> </h5>
    </li>

    <br>


    <div class="text-sidebar">

      <li <?php if ($pagina_Corrente == 'index.php') {
            echo 'class="active"';
          } ?>> <a href="index.php">Casa</a></li>

      <li <?php if ($pagina_corrente == 'form_museu.php') {
            echo 'class="active"';
          } ?>><a href="form_museu.php">Museu </a></li>

      <li <?php if ($pagina_corrente == 'form_nos.php') {
            echo 'class="active"';
          } ?>><a href="form_nos.php">Quem somos </a></li>

      <li <?php if ($pagina_corrente == 'form_contatos.php') {
            echo 'class="active"';
          } ?>><a href="form_contatos.php">Contatos </a></li>



      <br><br><br><br>

      <li><a href="sair.php">Sair</a></li>

    </div>

  </ul>

</body>

</html>

















