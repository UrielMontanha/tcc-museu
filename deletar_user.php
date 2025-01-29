<?php
require_once "conecta.php";
$conexao = conectar();

$id = $_GET['id_usuario'];

$sql = "DELETE FROM usuario WHERE id_usuario = $id";
$resultado = executarSQL($conexao, $sql);

// Redirecionar de volta para a página de usuários com o parâmetro 'deletado'
header('Location: crud_users.php?deletado=true');
?>