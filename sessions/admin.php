<?php
    session_start();
    if(isset($_SESSION["usuario"]) and $_SESSION["permissao"] == 2){
            $usuario = $_SESSION["usuario"];
    } else {
            header('location:index.php');
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h1> Administrativo </h1> Bem vindo(a) <?php echo $usuario; ?>!
        
        <ul>
            <li> <a href="pgadmin1.php"> Página 1 </a> </li>
            <li> <a href="pgadmin2.php"> Página 2 </a> </li>
        </ul>
        
        
        
    </body>
</html>