<?php


require_once "conecta.php";
$conexao = conectar();

$id = $_POST['id_obj'];

// Usando Prepared Statements para evitar SQL Injection
$sql_comentario = "DELETE FROM comentarios WHERE id_obj = $id";
$sql = "DELETE FROM objeto WHERE id_obj = $id";



$resultado_comentario = executarSQL($conexao, $sql_comentario);
$resultado = executarSQL($conexao, $sql);
    header('Location: adm_form_museu.php');
?>







<!-- // require_once "conecta.php";
// $conexao = conectar();

// $id = $_GET['id_obj'];

// $sql = "DELETE  FROM objeto WHERE id_obj = $id";
// // $sql = "SELECT * FROM objeto WHERE id_obj='$id_obj', nome='$nome', data_criacao='$data', condicao='$condicao', pais='$pais_origem', historia='$historia', foto='$foto'";

// $resultado = executarSQL($conexao, $sql);

// header('location:adm_form_museu.php');
// if ($resultado == false) {
//     echo "<h3>Erro ao buscar no banco</h3>";
// } -->