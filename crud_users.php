<!DOCTYPE html>
<html>

<head>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="">

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Gerenciamento de usuários</title>
</head>

<body>
    <?php 
    include_once "header.php";
    require_once "conecta.php";
    include("permadm.php");
    $conexao = conectar(); ?>

    <main class="container">
        <h1>Usuários</h1>

        <a href="form_cad_user.php" class="#01579b light-blue darken-4 waves-effect waves-light btn white-text"><i class="material-icons right">add</i>Inserir</a>

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
                                                
                        <td><a href="form_editar_user.php?id_usuario=<?php echo $linha['id_usuario']; ?>" class="btn-floating btn-medium waves-effect waves-light #01579b light-blue darken-4 modal-trigger white-text"><i class="material-icons">edit</i></a>

                        <a href="#modal<?php echo $linha['id_usuario']; ?>" class="btn-floating btn-medium waves-effect waves-light red darken-4 white-text modal-trigger"><i class="material-icons">delete</i></a> </td>

                        <div id="modal<?php echo $linha['id_usuario']; ?>" class="modal">
                            <div class="modal-content">
                                <h4>Atenção</h4>
                                <p>Você tem certeza que deseja excluir este usuário?
                                <h6> <?php echo $linha['nome']; ?> </h6>
                                </p>
                            </div>

                            <div class="modal-footer">
                                <form action="deletar_user.php" method="GET">

                                    <input type="hidden" name="id_usuario" value="<?php echo $linha['id_usuario']; ?>">

                                    <button type="button" name="btn-cancelar" class="modal-action modal-close waves-red btn #b71c1c red darken-4 darken-1">
                                        Cancelar </button>

                                    <button type="submit" name="btn-deletar" class="modal-action modal-close  btn waves-light #01579b light-blue darken-4">
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
    if (urlParams.has('deletado') && urlParams.get('deletado') === 'true') {
        M.toast({
            html: 'Usuário deletado com sucesso!',
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



    // Verifica se o parâmetro 'cadastrado' está na URL
    var urlParams = new URLSearchParams(window.location.search);
    if (urlParams.has('cadastrado') && urlParams.get('cadastrado') === 'true') {
        M.toast({
            html: 'Usuário cadastrado com sucesso!',
            displayLength: 4000
        });
    // Retira o parâmetro 'cadastrado' da URL para que o toast não seja mostrado novamente em um novo carregamento
    urlParams.delete('cadastrado');
    window.history.replaceState({}, document.title, window.location.origin + window.location.pathname);
}



    // Verifica se o parâmetro 'atualizado' está na URL
    var urlParams = new URLSearchParams(window.location.search);
    if (urlParams.has('atualizado') && urlParams.get('atualizado') === 'true') {
        M.toast({
            html: 'Usuário alterado com sucesso!',
            displayLength: 4000
        });
        // Retira o parâmetro 'atualizado' da URL para que o toast não seja mostrado novamente em um novo carregamento
        urlParams.delete('atualizado');
        window.history.replaceState({}, document.title, window.location.origin + window.location.pathname);
    }

</script>


</body>

</html>