<?php
    require_once 'global.php'; 
    

    try
    {
        header('Location: causas-cadastradas.php?cadastro=sucesso');

        $causa = new CategoriaServ();
        
        //Inserindo os dados vindos do formulário nos atributos da classe
        $causa-> setNomeCategoria($_POST ['nome']);

        $cadastrar = CategoriaServicoDao::cadastrar($causa);

    }
    catch(Exception $e)
    {
        echo "Erro cadastra-causas";
        echo '<pre>';
            echo($e);
        echo '</pre>';
         
    }
?>