<?php

session_start();

require_once "conecta.php";
$conexao = conectar();

/*$nome = $_POST['nome'];
$data = $_POST['data'];
$condicao = $_POST['condicao'];
$pais_origem = $_POST['pais'];
$historia = $_POST['historia'];
$foto = $_POST['foto'];*/

if ($_POST['nome'] != null) {

    $novonome = $_POST['nome'];

    $sql = "UPDATE objeto
        SET nome='$novonome'
        WHERE nome='$nome'";
    $resultado = mysqli_query($conexao, $sql);
    if (mysqli_errno($conexao) == 1062) {
        echo "O nome deste objeto já existe. Tente outro nome";
        die();
    }
}
