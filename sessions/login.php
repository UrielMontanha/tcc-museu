<?php

require("conecta.php");

$usuario = $_POST['usuario'];
$senha = $_POST['senha'];

$sql = "SELECT * FROM acesso WHERE usuario='".$usuario."' and senha='".$senha."'";
$resultado = mysqli_query($conexao,$sql);

if(mysqli_affected_rows($conexao) != 0){

    $dados = mysqli_fetch_assoc($resultado);
    
    session_start();
    $_SESSION["usuario"] = $dados['usuario'];
    $_SESSION["permissao"] = $dados['permissao'];

    if($dados['permissao'] == 2){
        header('location:admin.php');
    }else {
        header('location:principal.php');
    }
} else {
    header('location:index.php');
}



