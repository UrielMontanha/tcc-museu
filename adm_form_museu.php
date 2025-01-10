<?php
include_once "header.php";
require_once "conecta.php";
include("permadm.php");

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

    <style>
        /* #table{
            margin-left: 30%;
        } */

    </style>

</head>

<body>

    <main class="container wrapper" style="width: 90%; margin-top: 5%;">
        <h1>Objetos</h1>

        <a href="crud_users.php" class="#0d47a1 blue darken-4 waves-effect waves-light btn"><i class="material-icons right">edit</i>Gerenciar Usuários</a>
        <br> <br>
        <a href="adm_form_cad_obj.php" class="#0d47a1 blue darken-4 waves-effect waves-light btn"><i class="material-icons right">add</i>Cadastrar Objeto</a>

        <br> <br> <br>

        <table class="bordered centered highlight responsive-table" id="table"> <!--style="display: block; padding: 15px 80px;"> O padding não está funcionando, por isso a tabela está estranha -->
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>foto</th> <!--No banco de dados o aquivo esta "date", mas não consigo trocar para "varchar"-->
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

                        <td><a href="#modal<?php echo $linha['id_obj']; ?>" class="btn-floating btn-medium waves-effect waves-light #bf360c deep-orange darken-4 modal-trigger"><i class="material-icons">delete</i></a> </td>

                        <td><a href="form_edit_obj.php?id_obj= <?= $linha['id_obj']; ?>" class="btn-floating btn-medium waves-effect waves-light #0277bd light-blue darken-3 darken-4 modal-trigger"><i class="material-icons">edit</i></a> </td>

                        <div id="modal<?php echo $linha['id_obj']; ?>" class="modal">
                            <div class="modal-content">
                                <h4>Atenção</h4>
                                <p>Você tem certeza que deseja excluir este Objeto?
                                <h6> <?php echo $linha['nome']; ?> </h6>
                                </p>
                            </div>

                            <div class="modal-footer">
                                <form action="deletar_obj.php" method="GET">

                                    <input type="hidden" name="id_obj" value="<?php echo $linha['id_obj']; ?>">

                                    <!--echo " <a href='deletar_obj.php?objeto_id=" . $objeto['id_obj'] . "'></a>";  Como arrumo  -->

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









<!--
        //while ($objeto = mysqli_fetch_assoc($resultado)) {
        //    echo "<img src='css/imagens_obj/" . $objeto['arquivo'] . "'height='200px' width='250px'>";
        //    echo $objeto['nome'];
        //    echo " <a href='form_edit_obj.php?objeto_id=" . $objeto['id_obj'] . "'>Editar objeto</a>";
        //    echo " <a href='deletar_obj.php?objeto_id=" . $objeto['id_obj'] . "'>Deletar:</a>";

        echo " <a href='deletar_obj.php?objeto_id=" . $objeto['id_obj'] . "'></a>";

        //}
        -->