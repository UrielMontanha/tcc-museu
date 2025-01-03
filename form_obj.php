<?php
session_start();

include_once "conecta.php";
$conexao = conectar();

// $sql_coment = "SELECT * FROM comentario WHERE id_com = $id_com";

// $resultado_coment = executarSQL($conexao, $sql_coment);
// $resultado_coment = mysqli_query($conexao, $sql_coment);
//arrumar toda esta parte
// $comentario = mysqli_fetch_assoc($resultado_coment);

//dividindo comentário de objeto...

$id_obj = $_GET['id_obj'];

$sql = "SELECT * FROM objeto WHERE id_obj = $id_obj";

$resultado = executarSQL($conexao, $sql);
$resultado = mysqli_query($conexao, $sql);

$objeto = mysqli_fetch_assoc($resultado);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Museu </title>
    <!-- <link rel="stylesheet" href="style_comments.css"> -->
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
            border: 1px solid grey;
            border-radius: 5px;
        }
    </style>

</head>

<body>

    <?php include_once "header.php"; ?>

    <main class="container">

        <input type="hidden" name="id_obj" value="<?php echo $objeto['id_obj'] ?>">
        <div class="row">

            <img class="" src="css/imagens_obj/<?php echo $objeto['arquivo']; ?>">

            <div class="col s12">
                <h1 name="nome"> <?php echo $objeto['nome'] ?> </h1>
            </div>


            <div class="col s12">
                <p class="grey-text text-darken-3 lighten-3" name="data_chegada"> Data de quando o objeto chegou no museu: <?php echo $objeto['data_chegada'] ?>. </p>

                <p class="grey-text text-darken-3 lighten-3" name="data_criacao"> Data de quando o objeto foi criado: <?php echo $objeto['data_criacao'] ?>. </p>

                <p class="grey-text text-darken-3 lighten-3" name="condicao"> Condição do objeto: <?php echo $objeto['condicao'] ?>. </p>

                <p class="grey-text text-darken-3 lighten-3" name="pais_origem"> País origem do objeto: <?php echo $objeto['pais_origem'] ?>. </p>

                <p class="grey-text text-darken-3 lighten-3" name="cidade_origem"> Cidade origem: <?php echo $objeto['cidade_origem'] ?>. </p>
                <br>
                <p class="grey-text text-darken-3 lighten-3"> História do objeto: </p>

                <h6 class="black-text text-darken-3 lighten-3" name="historia"> <?php echo $objeto['historia'] ?> </h6>

                <div class="divider"> </div>

            </div>



            <div class="col s12">
                <form action="cad_comentario.php" method="post">

                    <h3>Área de comentários</h3>

                    ff

                    <div class="row card-panel">
                        <div class="input-field col s12">
                            <p class="grey-text text-darken-3 lighten-3">Adicione um comentário:</p>
                            <textarea class="text-a" name="comentario" placeholder="Comente aqui..."></textarea>
                            <span class="helper-text" data-error="Campo com preenchimento obrigatório."></span>
                        </div>

                        <div class="col s12">
                            <p class="bott">
                                <button class="btn waves-effect waves-light #0d47a1 blue darken-4 right" type="submit" name="comentario">Comentar
                            </p>
                        </div>
                    </div>
                </form>
            </div>

            dd

        </div>
    </main>

</body>

</html>