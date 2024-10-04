<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Login </title>
    <link rel="stylesheet" href="css/style_sidebar1.css">
</head>
<body>

<?php
$pagina_corrente = basename($_SERVER['SCRIPT_NAME']);

?>
<ul id="slide-out" class="sidenav #212121 grey darken-4 sidenav-fixed">

  <li>
    <div style="text-align: center; color: white;" class="title">
      <h4>Menu</h4>
    </div>
  </li>

  <li>
    <h5> OLá <?php if (isset($_SESSION['usuario'])) {
                echo $_SESSION['usuario'];
              } ?> </h5>
  </li>

  <br>

  <div class="text-sidebar">

  <li <?php if ($pagina_corrente == 'form-docencia.php') {
        echo 'class="active"';
      } ?>><a href="form-docencia.php">Docência </a></li>

  <li <?php if ($pagina_corrente == 'form-producao.php') {
        echo 'class="active"';
      } ?>><a href="form-producao.php"> Produção </a></li>

  <li <?php if ($pagina_corrente == 'index.php') {
        echo 'class="active"';
      } ?>><a href="form-eventos.php"> Eventos </a></li>

  <li <?php if ($pagina_corrente == 'index.php') {
        echo 'class="active"';
      } ?>><a href="form-orientacoes.php"> Orientações </a></li>

  <li <?php if ($pagina_corrente == 'index.php') {
        echo 'class="active"';
      } ?>><a href="form-palestras.php"> Palestras e Bancas </a></li>

  <li <?php if ($pagina_corrente == 'index.php') {
        echo 'class="active"';
      } ?>><a href="form-objetos.php"> Programas e Objetos </a></li>

  <li <?php if ($pagina_corrente == 'index.php') {
        echo 'class="active"';
      } ?>><a href="form-capacitacao.php"> Capacitação </a></li>

  <li <?php if ($pagina_corrente == 'index.php') {
        echo 'class="active"';
      } ?>><a href="form-outros.php"> Outros </a></li>

  <br><br><br>

  <li><a href="logout.php">Sair</a></li>

  </div>

</ul>

</body>
</html>