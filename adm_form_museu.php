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
    <link rel="stylesheet" href="css/styles.css">

</head>

<body>

    <main class="container wrappercont" style="margin-top: 5%;">
        <h1>Objetos</h1>
        <br> <br>
        <a href="adm_form_cad_obj.php" class="btn waves-effect waves-light #fafafa grey lighten-5 black-text"><i class="material-icons right">add</i>Cadastrar Objeto</a>

        <br> <br> <br>

        <table class="bordered centered  responsive-table white-text" id="table">
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
                        <td style="max-width: 400px;"> <img style="width:100%" src="css/imagens_obj/<?php echo $linha['arquivo']; ?>"> </td>

                        <td><a href="form_edit_obj.php?id_obj= <?= $linha['id_obj']; ?>" class="btn-floating btn-medium waves-effect waves-light #01579b light-blue darken-4 modal-trigger white-text"><i class="material-icons">edit</i></a>

                        <a href="#modal<?php echo $linha['id_obj']; ?>" class="btn-floating btn-medium waves-effect waves-light red darken-4 white-text modal-trigger"><i class="material-icons">delete</i></a> </td>

                        <div id="modal<?php echo $linha['id_obj']; ?>" class="modal">
                            <div class="modal-content black-text">
                                <h4>Atenção</h4>
                                <p>Você tem certeza que deseja excluir este Objeto?
                                <h6> <?php echo $linha['nome']; ?> </h6>
                                </p>
                            </div>

                            <div class="modal-footer">
                                <form action="deletar_obj.php" method="GET">

                                    <input type="hidden" name="id_obj" value="<?php echo $linha['id_obj']; ?>">

                                    <button type="button" name="btn-cancelar" class="modal-action modal-close waves-red btn #b71c1c red darken-4 darken-1">
                                        Cancelar </button>

                                    <button type="submit" name="btn-deletar" class="modal-action modal-close  btn waves-light #00796b teal darken-2">
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

    <script type="text/javascript" src="js/materialize.min.js"></script>

    <script>
        // Verifica se o parâmetro 'deletado' está na URL
        var urlParams = new URLSearchParams(window.location.search);
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







        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.modal');
            var instances = M.Modal.init(elems);
        });

        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.sidnav');
            var instances;
        })
    </script>


</body>

</html>