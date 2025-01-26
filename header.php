<?php
session_start();

// Capturar o nome do arquivo atual para destacar os links ativos
$pagina_Corrente = basename($_SERVER['SCRIPT_NAME']);

// Obter as informações da sessão (se existirem)
$usuario = isset($_SESSION['usuario']) ? $_SESSION['usuario'] : null;
$status = isset($_SESSION['status']) ? $_SESSION['status'] : null;
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
                    <li class="<?php echo $pagina_Corrente == 'index.php' ? 'active' : ''; ?>">
                        <a href="index.php">Início</a>
                    </li>

                    <li class="<?php echo $pagina_Corrente == 'form_museu.php' ? 'active' : ''; ?>">
                        <a href="form_museu.php">Visitar</a>
                    </li>

                    <?php if (!$usuario): ?>
                        <!-- Usuário não logado -->
                        <li>
                            <span class="white-text">Usuário anônimo</span>
                        </li>

                        <li class="<?php echo $pagina_Corrente == 'form_login.php' ? 'active' : ''; ?>">
                            <a href="form_login.php">Login</a>
                        </li>

                    <?php elseif ($status === 0): ?>
                        <!-- Usuário comum -->
                        <li>
                            <span class="white-text">Olá, <?php echo htmlspecialchars($usuario); ?></span>
                        </li>

                        <li class="<?php echo $pagina_Corrente == 'sair.php' ? 'active' : ''; ?>">
                            <a href="sair.php">Sair</a>
                        </li>

                    <?php elseif ($status === 1): ?>
                        <!-- Administrador -->
                        <li class="<?php echo $pagina_Corrente == 'crud_users.php' ? 'active' : ''; ?>">
                            <a href="crud_users.php">Gerenciar usuários</a>
                        </li>

                        <li>
                            <span class="white-text">Olá, <?php echo htmlspecialchars($usuario); ?></span>
                        </li>

                        <li class="<?php echo $pagina_Corrente == 'sair.php' ? 'active' : ''; ?>">
                            <a href="sair.php">Sair</a>
                        </li>

                    <?php endif; ?>
                </ul>

                <!-- Menu mobile -->
                <ul id="nav-mobile" class="sidenav">
                    <li class="<?php echo $pagina_Corrente == 'index.php' ? 'active' : ''; ?>">
                        <a href="index.php">Início</a>
                    </li>

                    <li class="<?php echo $pagina_Corrente == 'form_museu.php' ? 'active' : ''; ?>">
                        <a href="form_museu.php">Visitar</a>
                    </li>

                    <?php if (!$usuario): ?>
                        <!-- Usuário não logado -->
                        <li>
                            <span class="white-text">Usuário anônimo</span>
                        </li>

                        <li class="<?php echo $pagina_Corrente == 'form_login.php' ? 'active' : ''; ?>">
                            <a href="form_login.php">Login</a>
                        </li>

                    <?php elseif ($status === 0): ?>
                        <!-- Usuário comum -->
                        <li>
                            <span class="white-text">Olá, <?php echo htmlspecialchars($usuario); ?></span>
                        </li>

                        <li class="<?php echo $pagina_Corrente == 'sair.php' ? 'active' : ''; ?>">
                            <a href="sair.php">Sair</a>
                        </li>

                    <?php elseif ($status === 1): ?>
                        <!-- Administrador -->
                        <li class="<?php echo $pagina_Corrente == 'crud_users.php' ? 'active' : ''; ?>">
                            <a href="crud_users.php">Gerenciar usuários</a>
                        </li>

                        <li>
                            <span class="white-text">Olá, <?php echo htmlspecialchars($usuario); ?></span>
                        </li>

                        <li class="<?php echo $pagina_Corrente == 'sair.php' ? 'active' : ''; ?>">
                            <a href="sair.php">Sair</a>
                        </li>
                        
                    <?php endif; ?>
                </ul>

                <!-- Botão hamburger para mobile -->
                <a href="#" data-target="nav-mobile" class="sidenav-trigger">
                    <i class="material-icons">menu</i>
                </a>
            </div>
        </nav>
    </div>
</header>

<!-- Inicialização do sidenav (menu mobile) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script>
    $(document).ready(function () {
        $('.sidenav').sidenav();
    });
</script>
