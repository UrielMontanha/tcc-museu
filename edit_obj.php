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
$nomeArquivo = $_POST['nome_arquivo'];

if ($_FILES['arquivo']['size'] == 0){
    goto updateArq;
}
else{
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

$ne = $nomeArquivo . "." . $extensao;

$fezUpload = move_uploaded_file(
    $_FILES['arquivo']['tmp_name'],
    __DIR__ . $pastaDestino . $ne
);
$sql = "UPDATE objeto  
    SET nome = '$nome', 
    data_criacao = $data_cri, 
    data_chegada = $data_che, 
    condicao = '$condicao', 
    pais_origem = '$pais_origem', 
    historia = '$historia', 
    arquivo = '$ne' 
WHERE id_obj = $id_obj";

$resultado = mysqli_query($conecta, $sql);

header("location:adm_form_museu.php");
}

updateArq:

$sql = "UPDATE objeto  
    SET nome = '$nome', 
    data_criacao = $data_cri, 
    data_chegada = $data_che, 
    condicao = '$condicao', 
    pais_origem = '$pais_origem', 
    historia = '$historia', 
    arquivo = '$nomeArquivo' 
WHERE id_obj = $id_obj";

$resultado = mysqli_query($conecta, $sql);

header("location:adm_form_museu.php");