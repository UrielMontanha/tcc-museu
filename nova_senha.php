<?php

$email = $_GET['email'];
$token = $_GET['token'];

require_once "conecta.php";
$conexao = conectar();

$sql = "SELECT * FROM recuperar_senha WHERE email='$email' AND token='$token'";
$resultado = executarSQL($conexao, $sql);
$recuperar = mysqli_fetch_assoc($resultado);

if ($recuperar == null) {
    echo "<h2>Email ou token incorreto. Faça um novo pedido de recurperar senha.</h2>";
    die();
} else {
    date_default_timezone_set('America/Sao_Paulo');
    $agora = new DateTime('now');
    $data_criacao = DateTime::createFromFormat(
        'Y-m-d H:i:s',
        $recuperar['data_criacao']
    );

    $UmDia = DateInterval::createFromDateString('1 day');
    $dataExpiracao = date_add($data_criacao, $UmDia);

    if ($agora > $dataExpiracao) {
        echo "<h2> Essa solicitação de recuperação de senha expirou! </h2> <br>
        <h3> Faça um novo pedido de recuperação de senha. </h3>";
        die();
    }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Nova senha </title>
    <link rel="stylesheet" href="css/style_recuperar_senha.css?=nocache<? rand(); ?>">
</head>

<body>
    <form action="salvar_senha_nova.php" method="post">
        <div class="wrapper">
            <h1>Nova Senha </h1>

            <input type="hidden" name="email" value="<?= $email ?>">
            <input type="hidden" name="token" value="<?= $token ?>">

            <br><br>

            <p>Email:</p>
            <br>
            <b><?= $email ?></b>

            <br><br>

            <p>Você pode criar uma nova senha agora. Por favor, escolha uma senha segura para proteger sua conta.</p>

            <div class="input-box">
                <input type="text" name="senha" placeholder="Senha" required>
                <i class='bx bxs-user'></i>
            </div>

            <div class="input-box">
                <input type="text" name="repetirSenha" placeholder="Repita a senha" required>
                <i class='bx bxs-user'></i>

            </div>

            <button type="submit" class="btn">Enviar</button>

        </div>
    </form>
</body>

</html>