<?php

    function diretorios($arquivo)
    {
        if(file_exists('gerenciar-vagas/' . $arquivo)) 
        {
            return '../';
        }
        if(file_exists('' . $arquivo)) 
        {
            return '';
        }
    }

?>