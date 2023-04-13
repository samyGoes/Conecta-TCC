<?php
    //classe com métodos úteis e/ou ultilizados frequentemente em nosso sistema
    class Utils
    {
        //função que verifica se um valor é cpf ou cnpj
        public static function cpfOuCnpj($valor)
        {
            // Verifica se o valor tem 11 dígitos para ser um CPF ou 14 dígitos para ser um CNPJ
            if (strlen($valor) === 14) 
            {
                return "Cpf";
            }
            if (strlen($valor) === 18) 
            {
                return "Cnpj";
            }
        }
        



    }
?>