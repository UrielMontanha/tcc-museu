<?php

require_once "conecta.php";
$conexao = conectar();

$nome = $_POST['nome'];
$email = $_POST['email'];
$data_nasc = $_POST['data_nasc'];
$cpf = $_POST['cpf'];
$senha = $_POST['senha'];

$sql = "INSERT INTO usuario (nome, email, data_nasc, cpf, senha) VALUES ('$nome', '$email', '$data_nasc', '$cpf', '$senha')";

$resultado = mysqli_query($conexao, $sql);

if ($resultado === false) {
    if (mysqli_errno($conexao) == 1062) {
        echo "<h3> Você já tem cadastrado no sistema!
        Tente fazer o login, ou a recuperação de senha. <br> <br> <a href='index.php'>Voltar para o início</a> </h3>";
    }
    echo " <br> <br> Erro ao inserir novo usuário!" . mysqli_errno($conexao) . ": " . mysqli_error($conexao);
    die();
}
header("location: index.php");