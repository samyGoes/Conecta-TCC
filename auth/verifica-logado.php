<?php 

include "loginUsuario.php";

    if(empty($_SESSION['codUsuario']))
    {
        header("Location: ../form-login.php");
        exit;
    }
?>