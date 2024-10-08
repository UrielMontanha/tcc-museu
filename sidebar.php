<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style_sidebar1.css">
</head>
<body>

<style>
   .sidenav li a{
    color: white;
   }
</style>

<?php
$pagina_corrente = basename($_SERVER['SCRIPT_NAME']);

?>
<ul id="slide-out" class="sidenav #424242 grey darken-3 sidenav-fixed">
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

  <li <?php if ($pagina_corrente == 'form_museus.php') {
        echo 'class="active"';
      } ?>><a href="form_museus.php">Museus </a></li>

<li <?php if ($pagina_corrente == 'form_nos.php') {
        echo 'class="active"';
      } ?>><a href="form_nos.php">Quem somos </a></li>

<li <?php if ($pagina_corrente == 'form_contatos.php') {
        echo 'class="active"';
      } ?>><a href="form_contatos.php">Contatos </a></li>

  

  <br><br><br><br>

  <li><a href="logout.php">Sair</a></li>

  </div>

</ul>

</body>
</html>





















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