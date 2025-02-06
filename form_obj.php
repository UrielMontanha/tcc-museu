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

    <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js">
        
        document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('.modal');
        var instances = M.Modal.init(elems);
        });

    </script>


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

        .textarea-custom {
            font-size: 18px;
            color: black    ;
        }

        .btn-floating {
            margin-right: 10px;
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
                <p class="white-text" name="data_chegada"> Data de quando o objeto chegou no museu A/M/D: <?php echo $objeto['data_chegada'] ?>. </p>

                <p class="white-text" name="data_criacao"> Data de quando o objeto foi criado A/M/D: <?php echo $objeto['data_criacao'] ?>. </p>

                <p class="white-text" name="condicao"> Condição do objeto: <?php echo $objeto['condicao'] ?>. </p>

                <p class="white-text" name="pais_origem"> País origem do objeto: <?php echo $objeto['pais_origem'] ?>. </p>
                
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
                        <textarea class="text-a white-text" name="comentario" placeholder="Comente aqui..."></textarea>
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
                    echo "<h6><b>" . $linha['nome'] . "</b>  comentou: <br>" . date('d/m/Y', strtotime($linha['data_comentario'])) . "</h6><br>" . $linha['comentario'] . "<br><br>";
                

                    if (isset($_SESSION['id_usuario']) && ($_SESSION['id_usuario'] == $linha['id_usuario'] || $_SESSION['status'] == 1)) {
                        ?>
                        <a href="#!" 
                            onclick="openEditModal('<?php echo $linha['id_com']; ?>', '<?php echo addslashes($linha['comentario']); ?>', '<?php echo $linha['id_obj']; ?>')" 
                            class="btn-floating btn-medium waves-effect waves-light grey lighten-5 modal-trigger">
                            <i class="material-icons black-text">edit</i>
                        </a>


                        <a href="#!" class="btn-floating btn-medium waves-effect waves-light grey lighten-5 modal-trigger" data-target="modal<?php echo $linha['id_com']; ?>">
                            <i class="material-icons black-text">delete</i>
                        </a>

                        <div id="modal<?php echo $linha['id_com']; ?>" class="modal">
                            <div class="modal-content black-text">
                                <h4>Atenção</h4>
                                <p>Você tem certeza que deseja excluir seu comentário?
                                <h6> <?php echo $linha['comentario']; ?> </h6>
                                </p>
                            </div>

                            <div class="modal-footer">
                                <form action="excluir_com.php?id_usuario=<?php echo $linha['id_usuario']; ?>&id_com=<?php echo $linha['id_com']; ?>&id_obj=<?php echo $linha['id_obj']; ?>" method="POST">

                                    <input type="hidden" name="id_obj" value="<?php echo $linha['id_com']; ?>">

                                    <button type="button" name="btn-cancelar" class="modal-action modal-close waves-red btn #b71c1c red darken-4 darken-1">
                                        Cancelar </button>

                                    <button type="submit" name="btn-deletar" class="modal-action modal-close  btn waves-light #01579b light-blue darken-4">
                                        Confirmar </button>

                                </form>
                            </div>
                        </div>

    <script>
        // Verifica se o parâmetro 'deletado' está na URL
        var urlParams = new URLSearchParams(window.location.search);
        if (urlParams.has('deletado')) {
            M.toast({
                html: 'Comentário apagado!</p>',
                displayLength: 4000
            });
            // Retira o parâmetro 'deletado' da URL
            urlParams.delete('deletado');
            // Atualiza a URL sem recarregar a página
            window.history.replaceState({}, document.title, window.location.origin + window.location.pathname);
        }
    </script>

                        <br><br>
                       
                        <?php
                }
            }
        }
        ?>

        </div>

        <div class="col s12">
            <p class="bott">
                <button class="btn waves-effect waves-light #fafafa grey lighten-5 left" type="submit"><a class="black-text" href="form_museu.php">Ver mais objetos</a></button>
            </p>
        </div>

        <br><br>

    </main>

    <div id="textareaModal" class="modal">
        <form action="editar_com.php" method="post">
            <div class="modal-content">
                <h5>Editar Comentário</h5>
                <input type="hidden" id="editar-id" name="id_com">
                <input type="hidden" id="id_obj_editar" name="id_obj"> <!-- Novo campo para id_obj -->
                <textarea id="editar-comentario" class="materialize-textarea textarea-custom" name="texto" required></textarea>
            </div>
            <div class="modal-footer">
                <a href="#" class="modal-close btn-flat red darken-4 white-text">Fechar</a>
                <button type="submit" class="btn #01579b light-blue darken-4">Salvar</button>
            </div>
        </form>
    </div>

<script>

var urlParams = new URLSearchParams(window.location.search);
    if (urlParams.has('editado')) {
        var editado = urlParams.get('editado');
        if (editado == '1') {
            M.toast({
                html: 'Comentário editado com sucesso!',
                displayLength: 4000
            });
        } else if (editado == '0') {
            M.toast({
                html: 'Erro ao editar o comentário!',
                displayLength: 4000
            });
        }
        // Retira o parâmetro 'editado' da URL
        urlParams.delete('editado');
        // Atualiza a URL sem recarregar a página
        window.history.replaceState({}, document.title, window.location.origin + window.location.pathname);
    }



    // Verifica se o parâmetro 'comentario_cadastrado' está na URL
    var urlParams = new URLSearchParams(window.location.search);
    if (urlParams.has('comentario_cadastrado')) {
        var comentarioCadastrado = urlParams.get('comentario_cadastrado');
        if (comentarioCadastrado == '1') {
            M.toast({
                html: 'Comentário cadastrado com sucesso!',
                displayLength: 4000
            });
        } else if (comentarioCadastrado == '0') {
            M.toast({
                html: 'Erro ao cadastrar comentário!',
                displayLength: 4000
            });
        }
        // Retira o parâmetro 'comentario_cadastrado' da URL
        urlParams.delete('comentario_cadastrado');
        // Atualiza a URL sem recarregar a página
        window.history.replaceState({}, document.title, window.location.origin + window.location.pathname);
    }



    
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.modal');
            M.Modal.init(elems);
        }); // abre o modal
        
        function openEditModal(id, comentario, id_obj) {
            // Preencher os campos do modal
            document.getElementById('editar-id').value = id;
            document.getElementById('editar-comentario').value = comentario;
            document.getElementById('id_obj_editar').value = id_obj; // Adicionando id_obj ao modal

            // Abrir o modal
            var modal = document.getElementById('textareaModal');
            var instance = M.Modal.getInstance(modal);
            instance.open();
            }
</script>



<br><br><br>

<footer class="page-footer #212121 grey darken-4">
          <div class="container">
            <div class="row">
              <div class="col l6 s12">
                <h5 class="white-text">Casa da Cultura Dr. Pedro Marini</h5>
                <p class="grey-text text-lighten-4">Museu aprovado pela Lei Mun n° 1475/79. Tombado pelo patrimonio Histórico do Município, n°147/87.</p>
              </div>
              <div class="col l4 offset-l2 s12">
                <h5 class="white-text">Links e Informações</h5>
                <ul>
                  <li><a class="grey-text text-lighten-3" href="https://www.uruguaiana.rs.gov.br/portal/turismo/0/9/15/centro-cultural-dr-pedro-marini" style="text-decoration: underline;">Turismo em Uruguaiana</a></li>
                  <li><a class="grey-text text-lighten-3" href="https://www.tripadvisor.com.br/Attraction_Review-g681230-d4453220-Reviews-Centro_Cultural_Dr_Pedro_Marini-Uruguaiana_State_of_Rio_Grande_do_Sul.html" style="text-decoration: underline;">Tripadvisor</a></li>
                  <li>Local: 2720 RUA. Santana Uruguaiana, Rio Grande do Sul</li>
                  <li>Celular: (55) 55 95555-5555</li>
                </ul>
              </div>
            </div>
          </div>
          <div class="footer-copyright black">
            <div class="container">
            © 2014 Copyright Text
            <a class="grey-text text-lighten-4 right" href="#!"></a>
            </div>
          </div>
        </footer>




</body>

</html>