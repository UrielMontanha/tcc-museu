<?php
session_start();

require_once "conecta.php";
$conexao = conectar();

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

$ne = $nomeArquivo . "." . $extensao;

$fezUpload = move_uploaded_file(
    $_FILES['arquivo']['tmp_name'],
    __DIR__ . $pastaDestino . $ne
);

$sql = "INSERT INTO objeto (nome, data_criacao, data_chegada, condicao, pais_origem, historia, arquivo) VALUES ('$nome', '$data_cri' , '$data_che', '$condicao',
'$pais_origem', '$historia', '$ne')";
$resultado = mysqli_query($conexao, $sql);

if ($resultado === false) {
    if (mysqli_errno($conexao) == 1062) {
        echo "<h3> Este objeto já foi dacastrado no sistema!
        <br> <br> Voltar para cadastrarum novo objeto <a href='adm_form_cad_obj.php'>Voltar</a> </h3>";
    }
    echo " <br> <br> Erro ao inserir novo objeto!" . mysqli_errno($conexao) . ": " . mysqli_error($conexao);
    die();
}

if ($resultado === true) {
    echo "<h3>Objeto cadastrado com sucesso! <br> <br> 
    <a href='adm_form_cad_obj.php'>Continuar cadastrando</a>
    <br> <br> <a href='adm_form_museu.php'>Voltar</a><h3>";
}
