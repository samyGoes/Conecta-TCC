<?php
    //classe com métodos úteis e/ou ultilizados frequentemente em nosso sistema
    class Utils
    {
        //função que verifica se um valor é cpf ou cnpj
        public static function cpfOuCnpj($value)
        {
            // Verifica se o valor tem 11 dígitos para ser um CPF ou 14 dígitos para ser um CNPJ
            if (strlen($value) === 11 || strlen($value) === 14) 
            {
                return true;
            }else  
            {
            return false;
            }
        }

    }
?>