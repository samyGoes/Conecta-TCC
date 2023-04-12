<?php include "loginUsuario.php";?>
<?php

    if(empty($_SESSION['codUsuario']))
    {
        header("Location: ../form-login.php");
        exit;
    }
?>