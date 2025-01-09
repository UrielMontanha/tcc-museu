<?php

$pagina_Corrente = basename($_SERVER['SCRIPT_NAME']);

if (!(isset($_SESSION["usuario"]))) {

?>
    <header>
        <div class="navbar-fixed">
            <nav style="height: 100px;" class="grey darken-4">
                <div style="padding-top: 20px; padding-left: 120px; padding-right: 0px;" class="nav-wrapper">

                    <a href="#" class="brand-logo">MUSEU MUNICIPAL</a>

                    <ul class="right hide-on-med-and-down">
                        <li class="<?php if ($pagina_Corrente == 'index.php') {
                                        echo 'active';
                                    } ?>">
                            <a href="index.php">Início</a>
                        </li>
                        <li style="margin-right: 300px;" class="<?php if ($pagina_Corrente == 'form_museu.php') {
                                                                    echo 'active';
                                                                } ?>">
                            <a href="form_museu.php">Visitar</a>
                        </li>

                        <li style="margin-right: 200px;"> <!-- Como fazer para colocar o "Usuário" bem para a direita. -->
                            <h5>
                                <?php if (isset($_SESSION['usuario'])) {
                                    echo "OLá " . $_SESSION['usuario'];
                                } else {
                                    echo "Usuário anônimo";
                                } ?>
                            </h5>
                        </li>

                        <!-- <div class="input-field">
            <input id="search" type="search" required>
            <label class="label-icon" for="search"><i class="material-icons">search</i></label>
            <i class="material-icons">close</i>
        </div>                                               O que há de errado?                  -->

                        <li style="margin-left: 80px;" class="<?php if ($pagina_Corrente == 'form_login.php') {
                                                                    echo 'active';
                                                                } ?>">
                            <a href="form_login.php">Login</a>
                        </li>

                        <li><a href="sair.php">Sair</a></li>
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

                        <li class="<?php if ($pagina_Corrente == 'form_login.php') {
                                        echo 'active';
                                    } ?>">
                            <a href="form_login.php">Login</a>
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
                    <a href="menu.php" data-target="nav-mobile" class="sidenav-trigger">
                        <i class="material-icons">menu</i>
                    </a>
                </div>
            </nav>
        </div>
    </header>

<?php
} else {session_start();
?>



<?php
}
?>