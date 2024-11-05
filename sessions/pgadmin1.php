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
        <h1> Página 1 - Administrativo </h1>
        
        <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur faucibus, tellus et pulvinar malesuada, nisi tortor molestie sem, ut volutpat urna orci non nisl. 
            Nunc eu nulla ut odio pellentesque pretium. Mauris quis turpis id enim luctus vestibulum. Cras ullamcorper vel libero vel volutpat. 
            Integer est urna, sagittis sit amet tortor nec, suscipit malesuada dolor. Sed ac felis laoreet magna eleifend lobortis. 
            Nam interdum non sapien convallis iaculis. Nunc vel accumsan augue. Vestibulum congue scelerisque suscipit. Phasellus neque diam, sodales ac hendrerit quis, commodo condimentum leo. 
            Cras at enim aliquet, bibendum nunc non, malesuada risus. Aenean ut turpis vel nisl vestibulum varius. 
            Sed sodales risus dapibus, gravida ante eget, consequat eros.</p>

        <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur faucibus, tellus et pulvinar malesuada, nisi tortor molestie sem, ut volutpat urna orci non nisl. 
            Nunc eu nulla ut odio pellentesque pretium. Mauris quis turpis id enim luctus vestibulum. Cras ullamcorper vel libero vel volutpat. 
            Integer est urna, sagittis sit amet tortor nec, suscipit malesuada dolor. Sed ac felis laoreet magna eleifend lobortis. 
            Nam interdum non sapien convallis iaculis. Nunc vel accumsan augue. Vestibulum congue scelerisque suscipit. Phasellus neque diam, sodales ac hendrerit quis, commodo condimentum leo. 
            Cras at enim aliquet, bibendum nunc non, malesuada risus. Aenean ut turpis vel nisl vestibulum varius. 
            Sed sodales risus dapibus, gravida ante eget, consequat eros.</p>
        
        <hr>
        
        <a href="admin.php"> Voltar </a>
        
    </body>
</html>