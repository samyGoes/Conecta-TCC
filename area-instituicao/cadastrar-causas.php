<?php
    require_once '../auth/verifica-logado.php'; 
    require_once 'global.php'; 
    

    try
    {
        header('Location: form-cadastrar-causas-instituicao.php?solicitacao=sucesso');
        
        $solicitacao = new SolicitacaoCategoria();
    
          

        //Inserindo os dados vindos do formulário nos atributos da classe
        $solicitacao -> setCodInstituicao($_SESSION['codUsuario']);
        $solicitacao -> setNomeCategoria($_POST ['nome']);
        $solicitacao -> setStatusSolicitacao('pendente');

        $cadastrar = SolicitacaoCategoriaDao::cadastrar($solicitacao);

    }
    catch(Exception $e)
    {
        echo "Erro cadastra-causas";
        echo '<pre>';
            echo($e);
        echo '</pre>';
         
    }
?>