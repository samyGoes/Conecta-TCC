<?php

    class SenhaSegura
    {
        function segura($senha)
        {

            $tamanhoSenha = 8 ;

            $senha = $_POST['senha'];

            //verificando se a senha tem menos de 8 caracteres, se tiver retorna falso//

            if(strlen($senha) < $tamanhoSenha)
            {
                return false ;
            }

            //verificando se ha letra maiuscula //

            if (!preg_match('/[A-Z]/', $senha)) 
            {
                return false;
            }

            //verificando se ha caracter especial//

            if (!preg_match('/[!@#$%&*]/', $senha))
            {
                return false;
            }

             // Verifica se a senha contém pelo menos 1 número
             
            if (!preg_match('/[0-9]/', $senha)) // é verdadeira se nao conter um caracter especial//
            {
                return false;
            }

            return true;


        }
    }