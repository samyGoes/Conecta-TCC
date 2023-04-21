<?php
     require_once 'global.php';  
     require_once '../../auth/verifica-logado.php';
   
    try
    {
        header('Location: vaga-completa-instituicao.php');
    
        $id = $_POST['id'];
        $vaga = ServicoDao::consultarVaga($id);
        $_SESSION['vaga'] = $vaga;
        $_SESSION['codVaga']=$id;

    }
    catch(Exception $e)
    {
        echo "Erro no redirecionamento das vagas";
        echo '<pre>';
            echo($e);
        echo '</pre>';
         
    }
?>
