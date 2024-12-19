<?php
session_start();

include_once "conecta.php";
$conexao = conectar();

$id_obj = $_GET['id_obj'];

$sql = "SELECT * FROM objeto WHERE id_obj = $id_obj";

$resultado = executarSQL($conexao, $sql);
$resultado = mysqli_query($conexao, $sql);

$objeto = mysqli_fetch_assoc($resultado);

$id_obj = $_GET['id_obj'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
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
            </div>



            <div class="col s12">
                <div class="comment-box">

                    <h3>Área de comentários</h3>

                    <form action="#">
                        <textarea name="coment" placeholder="Comente aqui..."></textarea>
                        <button type="submit">Enviar comentário</button>
                    </form>

                </div>
            </div>
        </div>
    </main>

</body>

</html>