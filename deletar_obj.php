<?php


require_once "conecta.php";
$conexao = conectar();

$id = $_GET['id_obj'];

// Usando Prepared Statements para evitar SQL Injection
$sql = "DELETE FROM objeto WHERE id_obj = ?";
$stmt = $conexao->prepare($sql);

// Bind do parâmetro para a consulta
$stmt->bind_param("i", $id);

// Executa a consulta
$resultado = $stmt->execute();

// Verifica se a exclusão foi bem-sucedida
if ($resultado) {
    // Redireciona para a página de administração se a operação for bem-sucedida
    header('Location: adm_form_museu.php');
    exit(); // Encerra a execução após o redirecionamento
} else {
    // Caso ocorra um erro na execução da query
    echo "<h3>Erro ao excluir o objeto no banco<h3>";
}

?>







// require_once "conecta.php";
// $conexao = conectar();

// $id = $_GET['id_obj'];

// $sql = "DELETE  FROM objeto WHERE id_obj = $id";
// // $sql = "SELECT * FROM objeto WHERE id_obj='$id_obj', nome='$nome', data_criacao='$data', condicao='$condicao', pais='$pais_origem', historia='$historia', foto='$foto'";

// $resultado = executarSQL($conexao, $sql);

// header('location:adm_form_museu.php');
// if ($resultado == false) {
//     echo "<h3>Erro ao buscar no banco</h3>";
// }