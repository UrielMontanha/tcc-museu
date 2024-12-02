<?php
session_start();

include_once "conecta.php";
$conecta = conectar();

$sql = "SELECT * FROM objeto";

$resultado = executarSQL($conexao, $sql);
$resultado = mysqli_query($conexao, $sql);

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
    <main class="container">
        <!-- colocar o objeto -->
    </main>

</body>

</html>