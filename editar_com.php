<?php
session_start();

include_once "conecta.php";
$conecta = conectar();

// Recebe os dados do formulário
$id_com = $_POST['id_com'];
$comentario = $_POST['texto'];
$id_obj = $_POST['id_obj'];

// Escapar os dados para evitar SQL Injection
$comentario = mysqli_real_escape_string($conecta, $comentario);

// Atualizar o comentário no banco
$sql = "UPDATE comentarios SET comentario = '$comentario' WHERE id_com = $id_com";

if (mysqli_query($conecta, $sql)) {
    // Comentário editado com sucesso, redireciona com a mensagem
    header('Location: form_obj.php?id_obj=' . $id_obj . '&editado=1');
} else {
    // Em caso de erro na edição, redireciona com a mensagem de erro
    header('Location: form_obj.php?id_obj=' . $id_obj . '&editado=0');
}
exit;