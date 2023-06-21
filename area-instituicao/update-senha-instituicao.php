<?php

    //require 'global.php';
    require_once '../auth/verifica-logado.php';
    require '../busca-email.php';

    //session_start();

    try
    {
        header('Location: ../form-login.php?trocar-senha=sucesso');

        $email = $_SESSION["emailUsuario"];
        
        echo ("Email: " . $email . "<br>");
        $cod = pegaId($email);

        //echo("Cod:");
        //print_r($cod);

        //$codVerificado = verificaIdPorEntidade($cod);
        $codConvertido = converteCod($cod);

       // echo("Código:" . $codVerificado) . "<br>";
        //echo "<pre>";
        //var_dump($cod);
        //echo "</pre>";
   
        if (isset($cod['codVoluntario']))  // SE FOR O CÓDIGO DO VOLUNTÁRIO FAZ UM UPDATE NA SENHA DO VOLUNTÁRIO
        {
            $voluntario = new Voluntario();
            $voluntario -> setIdVoluntario($codConvertido);
            $voluntario -> setSenhaVoluntario($_POST['senha']);
            $voluntario -> setConfSenhaVoluntario($_POST['confSenha']);
            
            $update = VoluntarioDao::trocarSenha($voluntario);

            echo("Senha do voluntário trocada com sucesso");
        }
        else if (isset($cod['codInstituicao']))   // SENÃO FAZ UM UPDATE NA SENHA DA INSTITUIÇÃO
        {
            $instituicao = new Instituicao();

            $instituicao -> setIdInstituicao($codConvertido);
            $instituicao -> setSenhaInstituicao($_POST['senha']);
            $instituicao -> setConfSenhaInstituicao($_POST['confSenha']);
            
            $update2 = InstituicaoDao::trocarSenha($instituicao);

            echo("Senha da instituição trocada com sucesso");
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

    //session_destroy();

?>