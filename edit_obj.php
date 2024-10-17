<?php

session_start();

require_once "conecta.php";
$conexao = conectar();



if ($_POST['nome'] != null) 
{

    $novonome = $_POST['nome'];

    $sql = "UPDATE objeto SET nome='$novonome' WHERE nome='$nome'";
    
    $resultado = mysqli_query($conexao, $sql);
    
    if (mysqli_errno($conexao) == 1062) {
        echo "O nome deste objeto já existe. Tente outro nome";
        die();
    }
}



if ($_POST['data'] != null) 
{

    $novadata = $_POST['data'];

    $sql = "UPDATE objeto SET data_criacao='$novadata' WHERE data_criacao='$data'";
    
    $resultado = mysqli_query($conexao, $sql);
    
    if (mysqli_errno($conexao) == 1062) {
        echo "G ";
        die();
    }
}



if ($_POST['condicao'] != null) 
{

    $novacondicao = $_POST['condicao'];

    $sql = "UPDATE objeto SET condicao='$novcondicao' WHERE condicao='$condicao'";
    
    $resultado = mysqli_query($conexao, $sql);
    
    if (mysqli_errno($conexao) == 1062) {
        echo "G";
        die();
    }
}



if ($_POST['pais_origem'] != null) 
{

    $novopais_origem = $_POST['pais_origem'];

    $sql = "UPDATE objeto SET pais_origem='$novopaisorigem' WHERE pais_origem='$paisorigem'";
    
    $resultado = mysqli_query($conexao, $sql);
    
    if (mysqli_errno($conexao) == 1062) {
        echo "G";
        die();
    }
}

