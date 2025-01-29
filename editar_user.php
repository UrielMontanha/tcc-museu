<?php
session_start();

include_once "conecta.php";
$conexao = conectar();  // Corrigido para usar a variável $conexao

// Recebe os dados do formulário
$id_usuario = $_POST['id_usuario'];  // Este campo não está sendo usado, você pode removê-lo se não for necessário

$nome = $_POST['nome'];
$email = $_POST['email'];
$data_nasc = $_POST['data_nasc'];
$cpf = $_POST['cpf'];
$status = $_POST['status'];

$sql = "UPDATE usuario SET nome = '$nome', email = '$email', data_nasc = '$data_nasc', cpf = '$cpf', status = '$status' WHERE id_usuario = '$id_usuario'"; 

$resultado = mysqli_query($conexao, $sql);  // Corrigido para usar $conexao

if ($resultado) {
    // Redireciona para a página crud_users.php com o parâmetro 'atualizado' na URL
    header("Location: crud_users.php?atualizado=true");
    exit();
} else {
    // Se houver um erro, você pode exibir uma mensagem de erro
    echo "Erro ao atualizar o registro: " . mysqli_error($conexao);
}