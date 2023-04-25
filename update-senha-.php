<?php

    //require 'global.php';
    require 'verifica-email.php';
    //require 'busca-email.php';

    try
    {
        $id = pegaId($email);
        // SE FOR O EMAIL DO VOLUNTÁRIO FAZ UM UPDATE NA SENHA DO VOLUNTÁRIO
        if ($id['codVoluntario'])
        {
            $voluntario = new Voluntario();

            $voluntario -> setSenhaVoluntario($_POST['senha']);
            $instituicao -> setConfSenhaVoluntario($_POST['confSenha']);
            
            $update = VoluntarioDao::trocarSenha($voluntario);
        }
        else  // SENÃO FAZ UM UPDATE NA SENHA DA INSTITUIÇÃO
        {
            $instituicao = new Instituicao();

            $instituicao -> setSenhaInstituicao($_POST['senha']);
            $instituicao -> setConfSenhaInstituicao($_POST['confSenha']);
            
            $update2 = InstituicaoDao::trocarSenha($instituicao);
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