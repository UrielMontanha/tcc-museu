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

    <?php
    $pagina_Corrente = basename($_SERVER['SCRIPT_NAME']);
    ?>

    <div class="navbar-fixed">
        <nav class="#212121 grey darken-4">
            <div class="nav-wrapper container">
                <a href="#" class="brand-logo"><img src="historia.png" height="55" width="60">MUSEU URUGUAIANA</a>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li class="<?php if ($pagina_Corrente == 'index.php') {echo 'class="active"';} ?>"> <a href="index.php">Casa</a></li>
                    <li class="<?php if ($pagina_Corrente == 'form_login.php') {echo 'class="active"';} ?>"> <a href="form_login.php">Login</a></li>
                    <li class="<?php if ($pagina_Corrente == 'quem_cad.php') {echo 'class="active"';} ?>"> <a href="form_cad.php">Cadastrar-se</a></li>
                </ul>
            </div>
        </nav>
    </div>

</body>

</html>