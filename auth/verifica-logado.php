<?php
    session_start();
    $loginSession = $_SESSION['login'];
    $senhaSession = $_SESSION['senha'];

    if(empty($_SESSION['codUsuario']))
    {
        header("Location: ../form-login.php");
        exit;
    }
?>