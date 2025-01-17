<?php
session_start();


if (!(isset($_SESSION["usuario"]))) {
    header('location:form_login.php');
} else {
    require_once "conecta.php";
    $conexao = conectar();

    $id_obj = $_POST['id_obj'];
    $id_usuario = $_SESSION['id_usuario'];
    $nome = $_SESSION['usuario'];
    $comentario = $_POST['comentario'];

    $sql = "INSERT INTO comentarios (id_usuario, id_obj, comentario, nome) VALUES ($id_usuario, $id_obj,'$comentario', '$nome')";

    $resultado = mysqli_query($conexao, $sql);

    header('location:form_obj.php?id_obj=' . $id_obj);
}
