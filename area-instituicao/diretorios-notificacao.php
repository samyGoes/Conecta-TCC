<?php

    function diretorios($arquivo)
    {
        if(file_exists('gerenciar-vagas/' . $arquivo)) 
        {
            return 'gerenciar-vagas/';
        }
        if(file_exists('' . $arquivo)) 
        {
            return '';
        }
    }

?>