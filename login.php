<?php
session_start();

require_once "conecta.php";
$conexao = conectar();

$email = $_POST['email'];
$senha = $_POST['senha'];

$_SESSION['usuario'] = $email;

$sql = "SELECT * FROM usuario WHERE email='$email'";

$resultado = executarSQL($conexao, $sql);

$usuario = mysqli_fetch_assoc($resultado);

if ($usuario == null) {
    echo "<h3> Usuário não existe no sistema!
    Por favor, primeiro realize o cadastro no sistema.
    <br> <br> <a href='form_cad.php'>Voltar para o início</a> </h3>";
    die();
}

if ($senha == $usuario['senha']) {
    header("Location: index.php");
} else {
    echo "<h3> Senha inválida! Tente novamente. 
    <br> <br> <a href='index.php'>Voltar para o início</a> </h3>";
}
