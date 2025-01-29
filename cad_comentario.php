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

    if ($resultado) {
        // Se o comentário foi inserido com sucesso, redireciona com o parâmetro de sucesso
        header('Location: form_obj.php?id_obj=' . $id_obj . '&comentario_cadastrado=1');
    } else {
        // Se ocorreu um erro na inserção, redireciona com o parâmetro de erro
        header('Location: form_obj.php?id_obj=' . $id_obj . '&comentario_cadastrado=0');
    }
}