<?php

    //require 'global.php';
    require 'busca-email.php';

    session_start();

    try
    {
        //var_dump($_POST);
        //echo("<br>");
        $email = $_SESSION['email'];
        //print_r($_SESSION);
        

        echo ("Email: " . $email . "<br>");
        $id = pegaId($email);

        // SE FOR O EMAIL DO VOLUNTÁRIO FAZ UM UPDATE NA SENHA DO VOLUNTÁRIO
        if (isset($id['codVoluntario']))
        {
            $voluntario = new Voluntario();
            $voluntario -> setIdVoluntario($id);
            $voluntario -> setSenhaVoluntario($_POST['senha']);
            $voluntario -> setConfSenhaVoluntario($_POST['confSenha']);
            
            $update = VoluntarioDao::trocarSenha($voluntario);
        }
        else if (isset($id['codInstituicao']))  // SENÃO FAZ UM UPDATE NA SENHA DA INSTITUIÇÃO
        {
            $instituicao = new Instituicao();

            $instituicao -> setIdInstituicao($id);
            $instituicao -> setSenhaInstituicao($_POST['senha']);
            $instituicao -> setConfSenhaInstituicao($_POST['confSenha']);
            
            $update2 = InstituicaoDao::trocarSenha($instituicao);
        }
        else
        {
            echo ("Código não encontrado");
        }
       
    }
    catch(Exception $e)
    {
        echo "Erro update-instituição";
        echo '<pre>';
            echo($e);
        echo '</pre>';
    }


?>