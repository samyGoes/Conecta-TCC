<?php
    //função que faz parte da SPL que significa Standard PHP Library
    spl_autoload_register('carregarClasseAuth');
    
    function carregarClasseAuth($nomeClasse)
    {
        if (file_exists('../dao/' . $nomeClasse . '.php')) 
        {
            require_once '../dao/' . $nomeClasse . '.php';
        }
        if(file_exists('../' . $nomeClasse . '.php')) 
        {
            require_once '../' . $nomeClasse . '.php';
        }
        if(file_exists('../model/' . $nomeClasse . '.php')) 
        {
            require_once '../model/' . $nomeClasse . '.php';
        }
    }

?>