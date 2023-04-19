<?php
    //função que faz parte da SPL que significa Standard PHP Library
    spl_autoload_register('carregarClasseEditarVaga');
    
    function carregarClasseEditarVaga($nomeClasse)
    {
        if (file_exists('../../dao/' . $nomeClasse . '.php')) 
        {
            require_once '../../dao/' . $nomeClasse . '.php';
        }
        if(file_exists('../' . $nomeClasse . '.php')) 
        {
            require_once '../' . $nomeClasse . '.php';
        }
        if(file_exists('../../model/' . $nomeClasse . '.php')) 
        {
            require_once '../../model/' . $nomeClasse . '.php';
        }
        if(file_exists('../../auth/' . $nomeClasse . '.php')) 
        {
            require_once '../../auth/' . $nomeClasse . '.php';
        }
    }

?>