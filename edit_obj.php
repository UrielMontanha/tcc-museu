<?php
session_start();

include_once "conecta.php";
$conecta = conectar();

$id_obj = $_POST['id_obj'];

$nome = $_POST['nome'];
$data_cri = $_POST['data_criacao'];
$data_che = $_POST['data_chegada'];
$condicao = $_POST['condicao'];
$pais_origem = $_POST['pais_origem'];
$historia = $_POST['historia'];

$extensao = strtolower(pathinfo($_FILES['arquivo']['name'], PATHINFO_EXTENSION));

if (
    $extensao != "png" && $extensao != "jpg" &&
    $extensao != "jpeg" && $extensao != "gif" &&
    $extensao != "jfif" && $extensao != "svg"
) {
    echo "O arquivo não é uma imagem! Apenas selecione arquivos 
        com extensão png, jpg, jpeg, gif, jfif ou svg.";
    die();
}

if (getimagesize($_FILES['arquivo']['tmp_name']) === false) {
    echo "Problemas ao enviar a imagem. Tente novamente.";
    die();
}



$nomeArquivo = uniqid();
$pastaDestino = "/css/imagens_obj/";



$fezUpload = move_uploaded_file(
    $_FILES['arquivo']['tmp_name'],
    __DIR__ . $pastaDestino . $nomeArquivo . "." . $extensao
);

$sql = "UPDATE objeto (nome, data_criacao, data_chegada, condicao, pais_origem, historia, arquivo) VALUES ('$nome', $data_cri, $data_che, '$condicao', '$pais_origem', '$historia', '$nomeArquivo.$extensao') WHERE id_obj = '$id_obj'";

$resultado = mysqli_query($conecta, $sql);