<?php

    function diretorios($arquivo)
    {
        if(file_exists('../' . $arquivo)) 
        {
            return '../';
        }
        if(file_exists('' . $arquivo)) 
        {
            return '';
        }
    }

?>