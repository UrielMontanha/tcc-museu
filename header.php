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
        <nav class="#424242 grey darken-3">
            <div class="nav-wrapper container">


                <a href="#" class="brand-logo"><img src="css/imagens/historia.png" height="55" width="60">MUSEU MUNICIPAL</a>

                <div>
                    <ul>
                        <li style="margin-left: 100vh;" class="<?php if ($pagina_Corrente == 'form_login.php') {
                                        echo 'class="active"';
                                    } ?>"> <a href="form_login.php">Login</a></li>
                        <li class="<?php if ($pagina_Corrente == 'quem_cad.php') {
                                        echo 'class="active"';
                                    } ?>"> <a href="form_cad.php">Cadastrar-se</a></li>
                        
                        <form>
                            <div class="input-field" style="margin-left: 40vh;">
                                <input id="search" type="search" required>
                                <label class="label-icon" for="search"><i class="material-icons">search</i></label>
                                <i class="material-icons"></i>
                            </div>
                        </form>
                        
                    </ul>

                </div>
        </nav>
    </div>

    <?php include_once "sidebar.php"; ?>

</body>

</html>