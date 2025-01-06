<?php
$pagina_Corrente = basename($_SERVER['SCRIPT_NAME']);
?>

<header>
    <div class="navbar-fixed">
        <nav style="height: 100px;" class="grey darken-4">
            <div style="padding-top: 20px; padding-left: 0px; padding-right: 0px;" class="nav-wrapper container">
            <a href="#" class="brand-logo">MUSEU MUNICIPAL</a>
                <!-- <a href="#" class="brand-logo" height="50" width="10"> MUSEU MUNICIPAL </a> -->

                <!-- Navbar items -->
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
                    <li class="<?php if ($pagina_Corrente == 'contatos.php') {
                                    echo 'active';
                                } ?>">
                        <a href="contatos.php">Contatos</a>
                    </li>

                    <li style="margin-left: 80px;" class="<?php if ($pagina_Corrente == 'form_login.php') {
                                                                echo 'active';
                                                            } ?>">
                        <a href="form_login.php">Login</a>
                    </li>
                    <li class="<?php if ($pagina_Corrente == 'form_cad.php') {
                                    echo 'active';
                                } ?>">
                        <a href="form_cad.php">Cadastrar-se</a>
                    </li>
                    <li><a href="sair.php">Sair</a></li>

                    <li style="margin-left: 80px;"> <!-- Como fazer para colocar o "Usuário" bem para a direita. -->
                        <h5>
                            <?php if (isset($_SESSION['usuario'])) {
                                echo "OLá " . $_SESSION['usuario'];
                            } else {
                                echo "Usuário anônimo";
                            } ?>
                        </h5>
                    </li>
                </ul>

                <!-- Mobile Navbar -->
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
                    <li class="<?php if ($pagina_Corrente == 'contatos.php') {
                                    echo 'active';
                                } ?>">
                        <a href="contatos.php">Contatos</a>
                    </li>

                    <li class="<?php if ($pagina_Corrente == 'form_login.php') {
                                    echo 'active';
                                } ?>">
                        <a href="form_login.php">Login</a>
                    </li>
                    <li class="<?php if ($pagina_Corrente == 'form_cad.php') {
                                    echo 'active';
                                } ?>">
                        <a href="form_cad.php">Cadastrar-se</a>
                    </li>
                    <li style="margin-left: 80px;">
                        <h5>
                            <?php if (isset($_SESSION['usuario'])) {
                                echo "OLá " . $_SESSION['usuario'];
                            } else {
                                echo "Usuário anônimo";
                            } ?>
                        </h5>
                    </li>
                </ul>
                <!-- Button for mobile menu -->
                <a href="#" data-target="nav-mobile" class="sidenav-trigger">
                    <i class="material-icons">menu</i>
                </a>
            </div>
        </nav>
    </div>
</header>