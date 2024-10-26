<?php
session_start();

include_once "conecta.php";
$conexao = conectar();

$id_obj = filter_input(INPUT_GET, 'id_obj', FILTER_SANITIZE_NUMBER_INT);

$sql = "SELECT * FROM objeto WHERE id_obj = '$id_obj'";

$resultado = mysqli_query($conexao, $sql);


$objeto = mysqli_fetch_assoc($resultado);



?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar objetos</title> 
</head>

<body>

    <form action="edit_obj.php" enctype="multipart/form-data" method="post">

        <fieldset>
            <legend>
                <h1>Editar objetos</h1>
            </legend>

            <input type="hidden" name="id_obj" value="<?php echo $objeto['id_obj']?>">

            Nome do objeto: <?php $nome ?><input type="text" name="nome" value="<?php echo $objeto['nome']; ?>" placeholder="Nome do objeto">
            <br> <br>
            Data de criação: <input type="text" name="data_criacao" value="<?php echo $objeto['data_criacao']?>" placeholder="Data de criação">
            <br> <br>
            Data de chegada: <input type="text" name="data_chegada" value="<?php echo $objeto['data_chegada']?>" placeholder="Data de chegada">
            <br> <br>
            Condição: <input type="text" name="condicao" value="<?php echo $objeto['condicao']?>" placeholder="Condição do objeto">
            <br> <br>
            País: <input type="text" name="pais_origem" value="<?php echo $objeto['pais_origem']?>" placeholder="País de origem">
            <br> <br>
            História: <br>
            <textarea name="historia" value="<?php echo $objeto['historia']?>" id="10" cols="30" rows="10" placeholder="História do objeto"></textarea>
            <br> <br> <br>
            <input type="file" name="arquivo">
            <br> <br> <br>

            <input type="submit" value='Editar'>

        </fieldset>


    </form>

</body>

</html>