<?php
    //função que faz parte da SPL que significa Standard PHP Library
    spl_autoload_register('carregarClasseModel');
    
    function carregarClasseModel($nomeClasse)
    {
        if (file_exists('../dao/' . $nomeClasse . '.php')) 
        {
            require_once '../dao/' . $nomeClasse . '.php';
        }
        if(file_exists('../' . $nomeClasse . '.php')) 
        {
            require_once '../' . $nomeClasse . '.php';
        }
    }

?>