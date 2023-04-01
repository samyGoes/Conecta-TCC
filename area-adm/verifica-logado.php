<?php
    session_start();
    $loginSession = $_SESSION['login'];
    $passwordSession = $_SESSION['password'];

    if(($loginSession != 'adm') || ($passwordSession != '123'))
    {
        header("Location: ../form-login-adm.php");
        exit;
    }
?>