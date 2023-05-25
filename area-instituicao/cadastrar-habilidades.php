<?php
    require_once '../auth/verifica-logado.php'; 
    require_once 'global.php';  

    try
    {
        header('Location: form-cadastrar-habilidades-instituicao.php?solicitacao=sucesso');
        
        $solicitacao = new SolicitacaoHabilidade();
    
          

        //Inserindo os dados vindos do formulário nos atributos da classe
        $solicitacao -> setCodInstituicao($_SESSION['codUsuario']);
        $solicitacao -> setNomeHabilidade($_POST ['nome']);
        $solicitacao -> setStatusSolicitacao('pendente');

        $cadastrar = SolicitacaoHabilidadeDao::cadastrar($solicitacao);

    }
    catch(Exception $e)
    {
        echo "Erro cadastra-voluntario";
        echo '<pre>';
            echo($e);
        echo '</pre>';
         
    }
?>