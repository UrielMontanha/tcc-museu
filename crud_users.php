<!DOCTYPE html>
<html>

<head>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Gerenciamento de usuários</title>
</head>

<body>
    <?php include_once("header.php") ?>
    <?php include_once("conecta.php");
    $conexao = conectar(); ?>

    <main class="container">
        <h1>Usuários</h1>

        <a href="form_insere.php" class="#0d47a1 blue darken-4 waves-effect waves-light btn"><i class="material-icons right">add</i>Inserir</a>

        <br> <br>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>CPF</th>
                    <th>Nome</th>
                    <th>Data de Nascimento</th>
                    <th>Operação</th>
                </tr>
            </thead>

            <tbody>
                <?php $sql = "SELECT * FROM usuario";
                $resultado = mysqli_query($conexao, $sql);
                while ($linha = mysqli_fetch_assoc($resultado)) { ?>
                    <tr>
                        <td> <?php echo $linha['id_usuario'] ?> </td>
                        <td> <?php echo $linha['cpf'] ?> </td>
                        <td> <?php echo $linha['nome'] ?> </td>
                        <td> <?php $dataNasc = date('d/m/y', strtotime($linha['data_nasc']));
                                echo $dataNasc; ?> </td>
                        <td><a href="#modal<?php echo $linha['id_usuario']; ?>" class="btn-floating btn-medium waves-effect waves-light #bf360c deep-orange darken-4 modal-trigger"><i class="material-icons">delete</i></a> </td>

                        <div id="modal<?php echo $linha['id_usuario']; ?>" class="modal">
                            <div class="modal-content">
                                <h4>Atenção</h4>
                                <p>Você tem certeza que deseja excluir este usuário?
                                <h6> <?php echo $linha['nome']; ?> </h6>
                                </p>
                            </div>

                            <div class="modal-footer">
                                <form action="excluir" method="POST">

                                    <input type="hidden" name="id" value="<?php echo $linha['id_usuario']; ?>">

                                    <button type="button" name="btn-cancelar" class="modal-action modal-close waves-red btn #b71c1c red darken-4 darken-1">
                                        Cancelar </button>

                                    <button type="submi" name="btn-deletar" class="modal-action modal-close  btn waves-light #00796b teal darken-2">
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