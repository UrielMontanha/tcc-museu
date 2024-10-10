<?php
session_start();

require_once "conecta.php";
$conexao = conectar();

$nome = $_POST['nome'];
$data = $_POST['data'];
$condicao = $_POST['condicao'];
$pais = $_POST['pais'];
$historia = $_POST['historia'];


$sql = "INSERT INTO objeto (nome, 'data', condicao, pais_origem, historia) VALUES ('$nome', $data, $condicao, $pais_origem, $historia)";

$resultado = mysqli_query($conexao, $sql);

if ($resultado === false) {
    if (mysqli_errno($conexao) == 1062) {
        echo "<h3> Você já tem cadastrado no sistema!
        Tente fazer o login, ou a recuperação de senha. <br> <br> <a href='index.php'>Voltar para o início</a> </h3>";
    }
    echo " <br> <br> Erro ao inserir novo usuário!" . mysqli_errno($conexao) . ": " . mysqli_error($conexao);
    die();
}