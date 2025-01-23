<?php

if($_SESSION["status"] == 0 OR empty($_SESSION['status'])){
   header('location:form_login.php');
}
