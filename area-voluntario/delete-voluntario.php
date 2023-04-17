<?php
    require_once '../auth/verifica-logado.php';
    require_once 'global.php';

    try
    {
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $voluntario = new Voluntario();
        $voluntario -> setIdVoluntario($_SESSION['codUsuario']);

        $excluir = VoluntarioDao::excluir($email,$senha,$voluntario);

        if($excluir == true)
        {
            header('Location: ../opcao-cadastro.php');
            session_destroy();
        }


    }
    catch(Exception $e)
    {
        echo "Erro delete-instituição";
        echo '<pre>';
            echo($e);
        echo '</pre>';
         
    }

?>