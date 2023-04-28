<?php
    require_once 'global.php'; 
    require_once '../auth/verifica-logado.php'; 

    try
    {
        header('Location: form-cadastrar-causas-instituicao.php');
        
        $categoriaServico = new CategoriaServ();

    
        //Inserindo os dados vindos do formulário nos atributos da classe
        $categoriaServico -> setNomeCategoria($_POST ['nome']);
        $categoriaServico-> setCodInstituicao($_SESSION['codUsuario']);
       

        $cadastrar = CategoriaServicoDao::cadastrar($categoriaServico);

    }
    catch(Exception $e)
    {
        echo "Erro cadastra-causas";
        echo '<pre>';
            echo($e);
        echo '</pre>';
         
    }
?>