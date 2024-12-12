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

    </style>

</head>

<body>

    <?php include_once "header.php"; ?>

    <main class="container">

        <input type="hidden" name="id_obj" value="<?php echo $objeto['id_obj'] ?>">

    </main>

</body>

</html>