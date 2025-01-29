<?php
session_start();

require_once "conecta.php";
$conexao = conectar();

$nome = $_POST['nome'];
$email= $_POST['email'];
$data_nasc = $_POST['data_nasc'];
$cpf = $_POST['cpf'];
$status = $_POST['status'];

$sql = "INSERT INTO usuario (nome, email, data_nasc, cpf, status) VALUES ('$nome', '$email', '$data_nasc', '$cpf', '$status')";

$resultado = mysqli_query($conexao, $sql);

if ($resultado === true) {
    // Redireciona para a página crud_users.php com o parâmetro 'cadastrado' na URL
    header("Location: crud_users.php?cadastrado=true");
    exit();
}