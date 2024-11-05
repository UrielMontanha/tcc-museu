<?php

if(!(isset($_SESSION["usuario"]) and $_SESSION["status"] == 1)){
   header('location:form_login.php');
}

?>