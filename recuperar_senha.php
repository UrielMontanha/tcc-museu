<<?php

    session_start();

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require_once "conecta.php";
    $conexao = conectar();

    $email = $_POST['email'];
    $sql = "SELECT INTO usuario WHERE email = '$email'";
    $resultado = executarSQL($conexao, $sql);

    $usuario = mysqli_fetch_assoc($resultado);


    //Como fazer essas mensagens estilizadas
    if ($usuario == null) {
        echo "<h2>Você não foi cadastrado no sistema.
    Faça seu cadastro e realize o login. </h2>";
        echo 'aqui';
        die();
    }
    //Como fazer essas mensagens estilizadas

    $token = bin2hex(random_bytes(50));

    require_once 'PHPMailer/src/PHPMailer.php';
    require_once 'PHPMailer/src/SMTP.php';
    require_once 'PHPMailer/src/Exception.php';
    include 'config.php';

    $mail = new PHPMailer(true);

    try {
        $mail->CharSet = 'UTF-8';
        $mail->Encoding = 'base64';
        $mail->setLanguage('br');
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = TRUE;
        $mail->Username = $config['email'];
        $mail->Password = $config['senha_email'];
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );

        $mail->setFrom($config['email'], 'Museu Municipal');
        $mail->addAddress($usuario['email'], $usuario['nome']);
        $mail->addReplyTo($config['email'], 'Museu Municipal');

        $mail->isHTML(true);
        $mail->Subject = 'Recuperação de Senha do Sistema';
        $mail->Body = 'Olá! <br>
    Você solicitou a recuperação de senha no nosso sistema. <br>
    Clique no link para realizar a troca de senha:<br>
<a href="' . $_SERVER['SERVER_NAME'] . '/tcc-museu/nova_senha.php?email=' . $usuario['email'] .
            '&token=' . $token . '">Clique aqui para recuperar senha!</a>';

        $mail->send();
        echo '<h2>Email enviado com sucesso!<br> Confira o seu email.</h2>';

        date_default_timezone_set('America/Sao_Paulo');
        $data = new DateTime('now');
        $agora = $data->format('Y-m-d-H:i:s');

        $sql2 = "INSERT INTO recuperar_senha 
            (email, token, data_criacao, usado)
            VALUES ('" . $usuario['email'] . "', '$token', 
            '$agora', 0)";

        executarSQL($conexao, $sql2);
    } catch (Exception $e) {
        echo "<h3> Não foi possível enviar o email.
            Mailer Error: {$mail->ErrorInfo} </h3>";
    }
