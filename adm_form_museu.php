<?php
include_once "header.php";
require_once "conecta.php";
include("permadm.php");
// die;
$conexao = conectar();


$sql = "SELECT * FROM objeto";

$resultado = executarSQL($conexao, $sql);


?>



<!DOCTYPE html>
<html>

<head>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Gerenciamento de objetos</title>
    <link rel="stylesheet" href="">

</head>

<script>

    document.addEventListener('DOMContentLoaded', function() {
    var urlParams = new URLSearchParams(window.location.search);
    if (urlParams.has('sucesso')) {
        M.toast({
            html: 'Objeto cadastrado com sucesso!',
            displayLength: 4000 // A mensagem ficará visível por 4 segundos
        });
        // Retira o parâmetro 'sucesso' da URL para não mostrar a mensagem novamente em recarregamentos
        urlParams.delete('sucesso');
        window.history.replaceState({}, document.title, window.location.origin + window.location.pathname);
    }
});

</script>

<body style="color: black;">

    <main class="container" style="margin-top: 5%;">
        <h1>Objetos</h1>
        <br> <br>
        <a href="adm_form_cad_obj.php" class="btn waves-effect waves-light #01579b light-blue darken-4 white-text"><i class="material-icons right">add</i>Cadastrar Objeto</a>

        <br> <br> <br>

        <table class="bordered centered  responsive-table black-text" id="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>foto</th>
                    <th>Operação</th>
                </tr>
            </thead>

            <tbody>
                <?php $sql = "SELECT * FROM objeto";
                $resultado = mysqli_query($conexao, $sql);
                while ($linha = mysqli_fetch_assoc($resultado)) {  ?>
                    <tr>
                        <td> <?php echo $linha['id_obj'] ?> </td>
                        <td> <?php echo $linha['nome'] ?> </td>
                        <td style="max-width: 160px;"> <img style="width: 40%" src="css/imagens_obj/<?php echo $linha['arquivo']; ?>"> </td>

                        <td><a href="form_edit_obj.php?id_obj= <?= $linha['id_obj']; ?>" class="btn-floating btn-medium waves-effect waves-light #01579b light-blue darken-4 modal-trigger white-text"><i class="material-icons">edit</i></a>

                        <!-- Modal de Sucesso para o editar -->
                        <div id="modalSuccess" class="modal">
                            <div class="modal-content">
                                <h4>Sucesso!</h4>
                                <p>Objeto alterado com sucesso!</p>
                            </div>
                            <div class="modal-footer">
                                <a href="#!" class="modal-close waves-effect waves-green btn-flat">Fechar</a>
                            </div>
                        </div>

                        <!-- Modal de Erro para o editar -->
                        <div id="modalError" class="modal">
                            <div class="modal-content">
                                <h4>Erro!</h4>
                                <p>Ocorreu um erro ao atualizar o objeto. Tente novamente.</p>
                            </div>
                            <div class="modal-footer">
                                <a href="#!" class="modal-close waves-effect waves-green btn-flat">Fechar</a>
                            </div>
                        </div>

                        <?php
                        // Verificando se a URL tem parâmetros de sucesso ou erro
                        if (isset($_GET['success']) && $_GET['success'] == 'true') {
                            echo "<script>
                                var successModal = document.getElementById('modalSuccess');
                                M.Modal.getInstance(successModal).open();
                                </script>";
                        } elseif (isset($_GET['error']) && $_GET['error'] == 'true') {
                            echo "<script>
                            var errorModal = document.getElementById('modalError');
                            M.Modal.getInstance(errorModal).open();
                            </script>";
                        }
                        ?>

                        <a href="#modal<?php echo $linha['id_obj']; ?>" class="btn-floating btn-medium waves-effect waves-light red darken-4 white-text modal-trigger"><i class="material-icons">delete</i></a> </td>

                        <div id="modal<?php echo $linha['id_obj']; ?>" class="modal">
                            <div class="modal-content black-text">
                                <h4>Atenção</h4>
                                <p>Você tem certeza que deseja excluir este Objeto?
                                <h6> <?php echo $linha['nome']; ?> </h6>
                                </p>
                            </div>

                            <div class="modal-footer">
                                <form action="deletar_obj.php" method="POST">

                                    <input type="hidden" name="id_obj" value="<?php echo $linha['id_obj']; ?>">

                                    <button type="button" name="btn-cancelar" class="modal-action modal-close waves-red btn #b71c1c red darken-4 darken-1">
                                        Cancelar </button>

                                    <button type="submit" name="btn-deletar" class="modal-action modal-close btn waves-light #01579b light-blue darken-4 white-text">
                                        Confirmar </button>

                                </form>
                            </div>
                        </div>

                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>

    </main>

    <?php 
  // Verifica se o usuário está logado e exibe o toast
  if (isset($_SESSION['usuario'])) {
      echo "<script>
              M.toast({html: 'Você está logado como " . $_SESSION['usuario'] . "'});
            </script>";
  }
  ?>

    <script type="text/javascript" src="js/materialize.min.js"></script>

    <script>
        // Verifica se o parâmetro 'deletado' está na URL
        var urlParams = new URLSearchParams(window.location.search);
        if (urlParams.has('deletado')) {
            M.toast({
                html: 'Objeto deletado com sucesso!',
                displayLength: 4000
            });
            // Retira o parâmetro 'deletado' da URL
            urlParams.delete('deletado');
            // Atualiza a URL sem recarregar a página
            window.history.replaceState({}, document.title, window.location.origin + window.location.pathname);
        }



        document.addEventListener('DOMContentLoaded', function() {
    var urlParams = new URLSearchParams(window.location.search);
    
    // Verifica se o parâmetro 'success' está na URL
    if (urlParams.has('success')) {
        M.toast({
            html: 'Objeto editado com sucesso!',
            displayLength: 4000 // A mensagem ficará visível por 4 segundos
        });
        // Retira o parâmetro 'success' da URL para não mostrar a mensagem novamente em recarregamentos
        urlParams.delete('success');
        window.history.replaceState({}, document.title, window.location.origin + window.location.pathname);
    }

    // Verifica se o parâmetro 'deletado' está na URL
    if (urlParams.has('deletado')) {
        M.toast({
            html: 'Registro apagado!',
            displayLength: 4000
        });
        // Retira o parâmetro 'deletado' da URL
        urlParams.delete('deletado');
        // Atualiza a URL sem recarregar a página
        window.history.replaceState({}, document.title, window.location.origin + window.location.pathname);
    }
});





        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.modal');
            var instances = M.Modal.init(elems);
        });

        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.sidnav');
            var instances;
        })

        // Inicializando os modais
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.modal');
            M.Modal.init(elems);
        });
</script>

</body>

</html>