<?php

include_once "conecta.php";

$sql_coment = "SELECT * FROM comentarios";

$resultado_coment = mysqli_query($conexao, $sql_coment);

$linha = mysqli_fetch_assoc($resultado_coment);

$id_com = $linha['id_com'];
$id_usuario = $_SESSION['id_usuario'];

$sql = "DELETE FROM comentarios WHERE id_com=" . $id_com;
$conexao->query($sql);

$linhasAfetadas = $conexao->affected_rows;

header('location:form_obj.php?id_usuario=' . $id_usuario);