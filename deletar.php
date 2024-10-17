<?php

require_once "conecta.php";
$conexao = conectar();

$id = $_GET['objeto_id'];

$sql = "DELETE  FROM objeto WHERE id_obj = $id";
// $sql = "SELECT * FROM objeto WHERE id_obj='$id_obj', nome='$nome', data_criacao='$data', condicao='$condicao', pais='$pais_origem', historia='$historia', foto='$foto'";

$resultado = executarSQL($conexao, $sql);

header('location:adm_form_museu.php');
if ($resultado == false) {
    echo "<h3>Erro ao buscar no banco<h3>";
}