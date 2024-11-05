<?php
    session_start();
    if(isset($_SESSION["usuario"]) and $_SESSION["permissao"] == 1){
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
        <h1> Principal </h1> Bem vindo(a) <?php echo $usuario; ?>!
        
        <ul>
            <li> <a href="pgcomum1.php"> Página 1 </a> </li>
            <li> <a href="pgcomum2.php"> Página 2 </a> </li>
        </ul>
        
        
        
    </body>
</html>