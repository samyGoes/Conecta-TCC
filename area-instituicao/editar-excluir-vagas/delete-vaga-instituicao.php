<?php
     require_once 'global.php';  
     require_once '../../auth/verifica-logado.php';
   
    try
    {
        header('Location: editar-vagas-instituicao.php');
    
        $excluir = ServicoDao::excluir($_SESSION['codVaga']);
      

    }
    catch(Exception $e)
    {
        echo "Erro no redirecionamento das vagas";
        echo '<pre>';
            echo($e);
        echo '</pre>';
         
    }
?>