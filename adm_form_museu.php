<?php
session_start();

require_once "conecta.php";
$conexao = conectar();

$sql = "SELECT * FROM objeto";

$resultado = executarSQL($conexao, $sql);

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página museu adm</title>
</head>

<body>
    <form action="">
        <fieldset>
            <legend>
                <h1>Página do administrador crud do museu</h1>
            </legend>

            <?php
            while ($objeto = mysqli_fetch_assoc($resultado)) {
                echo "<img src='css/imagens_obj/" . $objeto['arquivo'] . "'height='200px' width='250px'>";
                echo $objeto['nome'];
                echo " <a href='form_edit_obj.php?objeto_id=" . $objeto['id_obj'] . "'>Editar objeto</a>";
                echo " <a href='deletar.php?objeto_id=" . $objeto['id_obj'] . "'>Deletar:</a>";
            }
            ?>

            <br> <br> <br>

            <h3><a href="adm_form_cad_obj.php">Cadastrar objeto</a></h3>

            <!-- <input type="text"> -->

        </fieldset>
    </form>
</body>

</html>