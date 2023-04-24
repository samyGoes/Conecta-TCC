<?php

    $login = $_POST['login'];
    $password = $_POST['password'];

    if(($login == 'adm') && ($password == '123'))
    {
        header("Location: dashboard.php");
        session_start();
         $_SESSION['login'] = $login;
         $_SESSION['password'] = $password;
    }
    else
    {
        header("Location: ../form-login-adm.php");
    }
?>