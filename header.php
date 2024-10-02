<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Página Inicial </title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" href="css/style.css">
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>

<body>

    <?php
    $pagina_Corrente = basename($_SERVER['SCRIPT_NAME']);
    ?>

    <div class="navbar-fixed">
        <nav class="#212121 grey darken-4">
            <div class="nav-wrapper container">
                <a href="#" class="brand-logo"><img src="css/imagens/historia.png" height="55" width="60">MUSEU URUGUAIANA</a>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li class="<?php if ($pagina_Corrente == 'index.php') {
                                    echo 'class="active"';
                                } ?>"> <a href="index.php">Casa</a></li>
                    <li class="<?php if ($pagina_Corrente == 'form_login.php') {
                                    echo 'class="active"';
                                } ?>"> <a href="form_login.php">Login</a></li>
                    <li class="<?php if ($pagina_Corrente == 'quem_cad.php') {
                                    echo 'class="active"';
                                } ?>"> <a href="form_cad.php">Cadastrar-se</a></li>
                </ul>
            </div>
        </nav>
    </div>

    <aside class="sidebar">

        <header class="sidebar-header">
            <img class="logo-img" src="css/imagens/ragnar.jpg" alt="Foto do Usuário">
        </header>

        <nav>
            <button>
                <span>
                    <i class="material-symbols-outlined"> Home </i>
                    <span>Home</span>
                </span>
            </button>

            <button>
                <span>
                    <i class="material-symbols-outlined"> Tag </i>
                    <span>Tag</span>
                </span>

            </button>
        </nav>

    </aside>

</body>

</html>