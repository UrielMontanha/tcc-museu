<?php
include_once "conecta.php";
$conexao = conectar();

$id_obj = $_GET['id_obj'];

$sql = "SELECT * FROM objeto WHERE id_obj = $id_obj";

$resultado = executarSQL($conexao, $sql);
$resultado = mysqli_query($conexao, $sql);

$objeto = mysqli_fetch_assoc($resultado);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Museu </title>
    <link rel="stylesheet" href="css/styles.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <style>
        .row {
            margin-top: 50px;
        }

        main.container img {
            width: 100%;
            height: auto;
            /* Mantém a proporção da imagem */
            display: block;
            /* Remove espaçamento indesejado */
        }

        .text-a {
            border: 1px solid white;
            border-radius: 5px;
        }
    </style>

</head>

<body>

    <?php include_once "header.php"; ?>

    <main class="container wrapper">

        <!-- Aqui é onde podemos visualizar o objeto do museu -->

        <input type="hidden" name="id_obj" value="<?php echo $objeto['id_obj'] ?>">
        <div class="row">

            <img class="" src="css/imagens_obj/<?php echo $objeto['arquivo']; ?>">

            <div class="col s12">
                <h1 name="nome"> <?php echo $objeto['nome'] ?> </h1>
            </div>


            <div class="col s12">
                <p class="white-text" name="data_chegada"> Data de quando o objeto chegou no museu: <?php echo $objeto['data_chegada'] ?>. </p>

                <p class="white-text" name="data_criacao"> Data de quando o objeto foi criado: <?php echo $objeto['data_criacao'] ?>. </p>

                <p class="white-text" name="condicao"> Condição do objeto: <?php echo $objeto['condicao'] ?>. </p>

                <p class="white-text" name="pais_origem"> País origem do objeto: <?php echo $objeto['pais_origem'] ?>. </p>

                <p class="white-text" name="cidade_origem"> Cidade origem: <?php echo $objeto['cidade_origem'] ?>. </p>
                <br>
                <p class="white-text"> História do objeto: </p>

                <h6 class="white-text" name="historia"> <?php echo $objeto['historia'] ?> </h6>

                <div class="divider"> </div> <!-- Dividindo o objeto da parte de comentários -->

            </div>




            <div class="col s12">
                <form action="cad_comentario.php" method="post">

                    <input type="hidden" name="id_obj" value="<?php echo $objeto['id_obj'] ?>">

                    <br><br><br>

                    <h3>Área de comentários</h3>

                    <?php //Verificando se a possoa está logada e pode comentar
                    if (!(isset($_SESSION['id_usuario']))) {
                        echo "<p>Você precisa estar logado para poder comentar.</p>";
                    } else {
                        echo "";
                    }
                    ?>

                    <!-- Se estiver logada ela comenta -->

                    <div class="input-field col s12">
                        <p class="white-text">Adicione um comentário:</p>
                        <textarea class="text-a" style="color: white;" name="comentario" placeholder="Comente aqui..."></textarea>
                        <span class="helper-text" data-error="Campo com preenchimento obrigatório."></span>
                    </div>



                    <div class="col s12">
                        <p class="bott">
                            <button class="btn waves-effect waves-light #fafafa grey lighten-5 right black-text" type="submit">Comentar</button>
                        </p>
                    </div>



                </form>
            </div>

            <!-- Aqui, se o usuário estiver logado ele pode editar e excluir o seu comentário -->

            <?php
            $sql_coment = "SELECT * FROM comentarios";

            $resultado_coment = mysqli_query($conexao, $sql_coment);
            while ($linha = mysqli_fetch_assoc($resultado_coment)) {

                if ($id_obj == $linha['id_obj']) {
                    echo "<h6><b>" . $linha['nome'] . "</b> comentou:</h6>" . $linha['comentario'] . "<br><br>";
                }

                if (isset($_SESSION['id_usuario'])) {

                    if ($_SESSION['id_usuario'] == $linha['id_usuario'])

                        if ($id_obj == $linha['id_obj']) {

                             ?> <a href="#!" onclick="abrirModal('<?php echo $linha['id_com']; ?>')" class="btn-floating btn-medium waves-effect waves-light #fafafa grey lighten-5 modal-trigger"><i class="material-icons" style="color: black;">edit</i></a> <?php
                            echo '<a href="excluir_com.php?id_usuario=' . $linha['id_usuario'] . '&id_com=' . $linha['id_com'] . '" class="btn-floating btn-medium waves-effect waves-light #fafafa grey lighten-5 modal-trigger"><i class="material-icons" style="color: black;">delete</i></a> <br><br>';
                        }
                }
            }
            ?>

        </div>
    </main>


    <!-- modal editar comentário -->
    <div id="textareaModal" class="modal">
        <form action="editar_com.php" method="post">
            <div class="modal-content">
                <h5>Editar Tópico</h5>
                <input type="hidden" id="editar-id" name="id_topico">
                <input type="hidden" value="<?php echo  $_SESSION['id_usuario']; ?>" name="id_usuarios">
                <input type="hidden" value="<?php echo  $linha['id_obj']; ?>" name="id_obj">
                <textarea id="editar-comentario" class="materialize-textarea" placeholder="Edite o comentário aqui" name="texto" required style="font-size: 40px;"></textarea>
            </div>
            <div class="modal-footer">
                <a href="#" class="modal-close btn-flat #b71c1c red darken-4 ">Fechar</a>
                <button type="submit" class="btn ">Salvar</button>
            </div>
        </form>
    </div>


<script>
    function abrirModal() {
            var modal = document.getElementById('textareaModal');
            var instance = M.Modal.init(modal);
            instance.open();
        }
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.modal');
            M.Modal.init(elems);
        }); // abre o modal

        
        function openEditModal(id) {
            // Preencher os campos do modal com os dados do tópico
            document.getElementById('comentario_com').value = id;
            //document.getElementById('editar-top').value = text;
            document.getElementById('editar-comentario').value = document.getElementById('texto-edit-' + id).value;

            // Abrir o modal
            var modal = document.getElementById('textareaEdit');
            var instance = M.Modal.init(modal);
            instance.open();
        }
</script>


</body>

</html>