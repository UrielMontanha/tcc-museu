<?php


require_once "conecta.php";
$conexao = conectar();

$id = $_POST['id_obj'];

// Usando Prepared Statements para evitar SQL Injection
$sql_comentario = "DELETE FROM comentarios WHERE id_obj = $id";
$sql = "DELETE FROM objeto WHERE id_obj = $id";



$resultado_comentario = executarSQL($conexao, $sql_comentario);
$resultado = executarSQL($conexao, $sql);
header('Location: adm_form_museu.php?deletado=true');