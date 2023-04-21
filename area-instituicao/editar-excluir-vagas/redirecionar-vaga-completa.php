<?php
    //Inserindo a função global e a função verifica-logado para acessar as sessões já iniciadas
     require_once 'global.php';  
     require_once '../../auth/verifica-logado.php';
   
    try
    {
        //Redirecionando para a vaga completa
        header('Location: vaga-completa-instituicao.php');

        //Guardando o id enviado pelo formulário em uma váriavel
        $id = $_POST['id'];
        //Guardando o resultado da função que trará todos os dados da vaga em uma váriavel
        $vaga = ServicoDao::consultarVaga($id);
        //Guardando os dados da vaga na sessão
        $_SESSION['vaga'] = $vaga;
        //Guardando o id da vaga na sessão
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
