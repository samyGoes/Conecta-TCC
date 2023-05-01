<?php 
    require_once '../auth/verifica-logado.php';

    if(empty($_SESSION['codUsuario']))
    {
        header("Location: ../form-login.php");
        exit;
    }
    else
    {
        $t=$_SESSION['tipoPerfil'];
        $c=$_SESSION['codUsuario']; 

        return 'redirecionamento-perfil.php?c=' . $c . '&t=' . $t;
    }
?>