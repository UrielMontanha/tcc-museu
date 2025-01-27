<?php

include_once "conecta.php";
$conexao = conectar();

$sql_coment = "SELECT * FROM comentarios";

$resultado_coment = mysqli_query($conexao, $sql_coment);

$linha = mysqli_fetch_assoc($resultado_coment);

$id_com = $_GET['id_com'];
$id_usuario = $_GET['id_usuario'];
$id_obj = $_GET['id_obj'];

$sql = "DELETE FROM comentarios WHERE id_com=" . $id_com;
$conexao->query($sql);

$linhasAfetadas = $conexao->affected_rows;


header('location:form_obj.php?id_obj=' . $id_obj);