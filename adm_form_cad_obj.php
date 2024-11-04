<?php
session_start();

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Museu ADM</title>
    <link rel="stylesheet" href="css/styles.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>

<body>

    <form action="cad_obj.php" enctype="multipart/form-data" method="post">

        <legend>
            <h1>Museu</h1>
        </legend>

        Nome do objeto: <input type="text" name="nome" placeholder="Nome do objeto">
        <br> <br>
        Data de criação: <input type="text" name="data_criacao" placeholder="Data de criação">
        <br> <br>
        Data de chegada: <input type="text" name="data_chegada" placeholder="Data de chegada">
        <br> <br>
        Condição: <input type="text" name="condicao" placeholder="Condição do objeto">
        <br> <br>
        País: <input type="text" name="pais_origem" placeholder="País de origem">
        <br> <br>
        História: <br>
        <textarea name="historia" id="10" cols="30" rows="10" placeholder="História do objeto"></textarea>
        <br> <br> <br>
        <input type="file" name="arquivo">
        <br> <br> <br>

        <input type="submit" value='Cadastrar'>


        <br> <br>

        <h4><a href="adm_form_museu.php">Voltar</a></h4>

    </form>

</body>

</html>