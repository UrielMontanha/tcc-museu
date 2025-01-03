<?php
session_start();

require_once "conecta.php";
$conexao = conectar();

$nome = $_POST['nome'];
$email= $_POST['email'];
$data_nasc = $_POST['data_nasc'];
$cpf = $_POST['cpf'];
$status = $_POST['status'];

$extensao = strtolower(pathinfo($_FILES['foto_perfil']['name'], PATHINFO_EXTENSION));

if (
    $extensao != "png" && $extensao != "jpg" &&
    $extensao != "jpeg" && $extensao != "gif" &&
    $extensao != "jfif" && $extensao != "svg"
) {
    echo "O arquivo não é uma imagem! Apenas selecione arquivos 
        com extensão png, jpg, jpeg, gif, jfif ou svg.";
    die();
}

if (getimagesize($_FILES['foto_perfil']['tmp_name']) === false) {
    echo "Problemas ao enviar a imagem. Tente novamente.";
    die();
}



$nomeArquivo = uniqid();
$pastaDestino = "/css/imagens_user/";

$ne = $nomeArquivo . "." . $extensao;

$fezUpload = move_uploaded_file(
    $_FILES['foto_perfil']['tmp_name'],
    __DIR__ . $pastaDestino . $ne
);

$sql = "INSERT INTO usuario (nome, email, data_nasc, cpf, 'status', foto_perfil) VALUES ('$nome', '$email' , '$data_nasc', '$cpf',
'$status', '$ne')";
$resultado = mysqli_query($conexao, $sql);

if ($resultado === false) {
    if (mysqli_errno($conexao) == 1062) {
        echo "<h3> Este usuário já é dacastrado no sistema!
        <br> <br> Voltar <a href='crud_users.php'>Voltar</a> </h3>";
    }
    echo " <br> <br> Erro ao inserir novo usuário!" . mysqli_errno($conexao) . ": " . mysqli_error($conexao);
    die();
}

if ($resultado === true) {
    echo "<h3>Usuário cadastrado com sucesso! <br> <br> 
    <a href='crud_users.php'>Voltar</a>";
}