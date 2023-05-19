<?php
    require_once '../auth/verifica-logado.php'; 
    require_once 'global.php'; 
    

    try
    {
        header('Location: form-cadastrar-causas-instituicao.php');
        
        $solicitacao = new Solicitacao();
    
          

        //Inserindo os dados vindos do formulário nos atributos da classe
        $solicitacao -> setCodInstituicao($_SESSION['codUsuario']);
        $solicitacao -> setNomeCategoriaHabilidade($_POST ['nome']);
        $solicitacao -> setStatusSolicitacao('pendente');

        $cadastrar = SolicitacaoDao::cadastrar($solicitacao);

    }
    catch(Exception $e)
    {
        echo "Erro cadastra-causas";
        echo '<pre>';
            echo($e);
        echo '</pre>';
         
    }
?>