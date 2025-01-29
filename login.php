 <?php
    //inicia a sessão
    session_start();

    //conecta com o banco de dados
    require_once "conecta.php";
    $conexao = conectar();

    //recebe os valores do formulario
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    //seleciona o banco de dados
    $sql = "SELECT * FROM usuario WHERE email='$email' AND senha='$senha'";

    //pega informações do banco de dados 
    $resultado = executarSQL($conexao, $sql);

    if(mysqli_num_rows($resultado) > 0){
        $usuario = mysqli_fetch_assoc($resultado);

        //pega o nome
        $nome = $usuario["nome"];

        //seleciona o status do banco de dados
        $_SESSION['usuario'] = $nome;
        $_SESSION['email'] = $email;
        $_SESSION['status'] = $usuario['status'];;
        $_SESSION['id_usuario'] = $usuario['id_usuario'];

        if ($_SESSION['status'] == 1) {
            header("location: adm_form_museu.php");
        } else {
            header("Location: index.php");
        }

    } else {
        header("Location: form_login.php");
    }
