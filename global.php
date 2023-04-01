<?php
    //função que faz parte da SPL que significa Standard PHP Library
    spl_autoload_register('carregarClasse');
    
    function carregarClasse($nomeClasse)
    {
        if (file_exists('model/' . $nomeClasse . '.php')) 
        {
            require_once 'model/' . $nomeClasse . '.php';
        }
        if(file_exists('dao/' . $nomeClasse . '.php')) 
        {
            require_once 'dao/' . $nomeClasse . '.php';
        }
    }

?>