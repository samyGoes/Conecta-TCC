<?php
    require_once 'global.php'; 
    
    try
    {
        
        header('Location: habilidades-cadastradas.php?cadastro=sucesso');
        $habilidade = new HabilidadeServ();
    
          

        //Inserindo os dados vindos do formulário nos atributos da classe
        $habilidade -> setNomeHabilidade($_POST ['nome']);

        $cadastrar = HabilidadeServicoDao::cadastrar($habilidade);

    }
    catch(Exception $e)
    {
        echo "Erro cadastra-causas";
        echo '<pre>';
            echo($e);
        echo '</pre>';
         
    }
?>