<?php

    function diretorios($arquivo)
    {
        if(file_exists('../area-instituicao/' . $arquivo)) 
        {
            return '../area-instituicao/';
        }
        if(file_exists('../area-instituicao/gerenciar-vagas/' . $arquivo)) 
        {
            return '../area-instituicao/gerenciar-vagas/';
        }
        if(file_exists('../area-voluntario/' . $arquivo)) 
        {
            return '../area-voluntario/';
        }
    }

?>