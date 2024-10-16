<?php

require_once "conecta.php";
$conexao = conectar();


$sql = "SELECT * FROM objeto WHERE id_obj='$id_obj', nome='$nome', data_criacao='$data', condicao='$condicao', pais='$pais_origem', historia='$historia', foto='$foto'";

$resultado = executarSQL($conexao, $sql);
if ($resultado == false) {
    echo "<h3>Erro ao buscar no banco<h3>";
}


$objeto = mysqli_fetch_assoc($resultado);

$foto = $objeto['foto'];
$sql = "DELETE FROM objeto WHERE id_obj='$id_obj', nome='$nome', data_criacao='$data', condicao='$condicao', pais='$pais_origem', historia='$historia', foto='$foto'";

