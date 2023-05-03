<?php
    //Inserindo a função global e a função verifica-logado para acessar as sessões já iniciadas
     require_once 'global.php';  
     include "../auth/loginUsuario.php";
    try
    {
        //Redirecionando para a vaga completa
        header('Location: vaga-completa.php');

        //Guardando o id enviado pelo formulário em uma váriavel
        $id = $_POST['id'];
        //Guardando o resultado da função que trará todos os dados gerais da vaga em uma váriavel
        $vaga = ServicoDao::consultarVaga($id);
        //Guardando os dados gerais da vaga na sessão
        $_SESSION['vaga'] = $vaga;
        //Guardando o resultado da função que trará as causas da vaga em uma váriavel
        $causa = ServicoDao::consultarCausa($id);
        //Guardando as causas da vaga na sessão
        $_SESSION['causa'] = $causa;
        //Guardando o resultado da função que trará as habilidades da vaga em uma váriavel
        $habilidade = ServicoDao::consultarHabilidade($id);
        //Guardando as habilidades da vaga na sessão
        $_SESSION['habilidade'] = $habilidade;
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
