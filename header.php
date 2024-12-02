<?php
$pagina_Corrente = basename($_SERVER['SCRIPT_NAME']);
?>

<header>

    <div class="navbar-fixed">
        <nav class="#424242 grey darken-4">
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

                        <!-- <form>
                            <div class="input-field" style="margin-left: 40vh;">
                                <input id="search" type="search" required>
                                <label class="label-icon" for="search"><i class="material-icons">search</i></label>
                                <i class="material-icons"></i>
                            </div>
                        </form> -->

                    </ul>

                </div>
        </nav>
    </div>
</header>