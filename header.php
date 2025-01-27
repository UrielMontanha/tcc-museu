<?php
session_start();

$pagina_Corrente = basename($_SERVER['SCRIPT_NAME']);
?>

<header>
    <div class="navbar-fixed">
        <nav class="grey darken-4">
            <div class="nav-wrapper">

                <!-- Logo -->
                <a href="#" class="brand-logo">
                    <img class="responsive-img" src="css/imagens/MUSEU_MUNICIPAL.png" alt="museu_municipal">
                </a>

                <!-- Menu para telas grandes -->
                <ul class="right hide-on-med-and-down">

                    <li class="<?php if ($pagina_Corrente == 'index.php') {
                                    echo 'active';
                                } ?>">
                        <a href="index.php">Início</a>
                    </li>

                    <li class="<?php if ($pagina_Corrente == 'form_museu.php') {
                                                                echo 'active';
                                                            } ?>">
                        <a href="form_museu.php">Visitar</a>
                    </li>

                    <?php if (isset($_SESSION['status']) == 1) { ?>
                        <li class="<?php if ($pagina_Corrente == 'adm_form_museu.php') {
                                        echo 'active';
                                    } ?>">
                            <a href="adm_form_museu.php">Gerenciar objetos</a>
                        </li>
                    <?php }  ?>

                    <?php if (isset($_SESSION['status']) == 1) { ?>
                        <li style="margin-right: 300px;" class="<?php if ($pagina_Corrente == 'crud_users.php') {
                                        echo 'active';
                                    } ?>">
                            <a href="crud_users.php">Gerenciar usuários</a>
                        </li>
                    <?php }  ?>


                    <li>

                        <h5>
                            <?php
                            $logado = 'Usuário';
                            if (isset($_SESSION['usuario'])) {
                                $logado = $_SESSION['usuario'];
                            }
                            echo "Olá " . $logado;
                            ?>
                        </h5>

                    </li>

                    <?php if (isset($_SESSION['usuario'])) { ?>
                        <li class="<?php if ($pagina_Corrente == 'sair.php') {
                                        echo 'active';
                                    } ?>">
                            <a href="sair.php">Sair</a>
                        </li>
                    <?php }  ?>

                    <?php if (!isset($_SESSION['usuario'])) { ?>
                        <li class="<?php if ($pagina_Corrente == 'form_login.php') {
                                        echo 'active';
                                    } ?>">
                            <a href="form_login.php">Logar</a>
                        </li>
                    <?php } ?>


                    <!-- Menu mobile -->
                    <ul id="nav-mobile" class="sidenav">
                        <li class="<?php if ($pagina_Corrente == 'index.php') {
                                        echo 'active';
                                    } ?>">
                            <a href="index.php">Início</a>
                        </li>

                        <li class="<?php if ($pagina_Corrente == 'form_museu.php') {
                                        echo 'active';
                                    } ?>">
                            <a href="form_museu.php">Visitar</a>
                        </li>

                        <li>
                            <h5>
                                <?php
                                if (!empty($_SESSION['usuario'])) {
                                    $logado = 'Usuário';
                                }
                                if (isset($_SESSION['usuario'])) {
                                    $logado = $_SESSION['usuario'];
                                }
                                echo "Olá " . $logado;
                                ?>
                            </h5>
                        </li>

                        <?php if ($_SESSION['usuario']) { ?>
                            <li class="<?php if ($pagina_Corrente == 'sair.php') {
                                            echo 'active';
                                        } ?>">
                                <a href="sair.php">Sair</a>
                            </li>
                        <?php }  ?>

                    </ul>

                    <!-- Hamburger -->
                    <a href="#" data-target="nav-mobile" class="sidenav-trigger">
                        <i class="material-icons">menu</i>
                    </a>
            </div>
        </nav>
    </div>
</header>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script>
    // Inicializa o Sidenav para o menu mobile
    $(document).ready(function() {
        $('.sidenav').sidenav();
    });
</script>