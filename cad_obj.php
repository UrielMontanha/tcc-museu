<?php
session_start();

require_once "conecta.php";
$conexao = conectar();

$nome = $_POST['nome'];
$data = $_POST['data'];
$condicao = $_POST['condicao'];
$pais_origem = $_POST['pais'];
$historia = $_POST['historia'];
$foto = $_POST['foto'];


$sql = "INSERT INTO objeto (nome, data_chegada, condicao, pais_origem, historia, foto) VALUES ('$nome', $data, '$condicao', '$pais_origem', '$historia' ,'$foto')";

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
    echo "<h3>Objeto cadastrado com sucesso! <br> <br> <a href='adm_form_cad_obj.php'>Voltar</a><h3>";
}