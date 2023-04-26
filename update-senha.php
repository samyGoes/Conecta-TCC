<?php

    //require 'global.php';
    require 'verifica-email.php';
    
    try
    {
        var_dump($_POST);
        echo ("Email: " . $email . "<br>");
        $id = pegaId($email);

        // SE FOR O EMAIL DO VOLUNTÁRIO FAZ UM UPDATE NA SENHA DO VOLUNTÁRIO
        if (isset($id['codVoluntario']))
        {
            $voluntario = new Voluntario();

            $voluntario -> setSenhaVoluntario($_POST['senha']);
            $voluntario -> setConfSenhaVoluntario($_POST['confSenha']);
            
            $update = VoluntarioDao::trocarSenha($voluntario, $email);
        }
        else if (isset($id['codInstituicao']))  // SENÃO FAZ UM UPDATE NA SENHA DA INSTITUIÇÃO
        {
            $instituicao = new Instituicao();

            $instituicao -> setSenhaInstituicao($_POST['senha']);
            $instituicao -> setConfSenhaInstituicao($_POST['confSenha']);
            
            $update2 = InstituicaoDao::trocarSenha($instituicao, $email);
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