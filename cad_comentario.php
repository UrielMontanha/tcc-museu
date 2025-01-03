<?php
session_start();

require_once "conecta.php";
$conexao = conectar();

$comentario = $_POST['comentario'];

$sql = "INSERT INTO comentarios (id_com, id_usuario, id_obj, comentario) VALUES ('$comentario')";