<?php
    require_once 'global.php';  

    try
    {
        header('Location: form-cadastrar-causas-instituicao.php');
        
        $categoriaServico = new CategoriaServ();

    
        //Inserindo os dados vindos do formulário nos atributos da classe
        $categoriaServico -> setNomeCategoria($_POST ['nome']);
       

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