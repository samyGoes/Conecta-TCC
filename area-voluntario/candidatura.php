<?php
    require_once 'global.php';
    include '../auth/verifica-logado.php';

    //Cadastrando as candidaturas
    try
    {
        header("Location: ../vagas/vagas.php");

        if( $_SESSION['tipoPerfil'] == 'Voluntario')
        {
            $candidato = $_SESSION['codUsuario'];
            $vaga =  $_SESSION['codVaga'];
            $status = "pendente";

            $cadastrar = CandidaturaDao::cadastrar($candidato,$vaga,$status);
        }
        else
        {
            header("Location: ../vagas/vaga-completa.php");
        }
    
    }
    catch(Exception $e)
    {
        echo "Erro cadastra-candidatura";
        echo '<pre>';
            echo($e);
        echo '</pre>';
        
    }
?>