<?php

class Cnpj
{
    function validar($cnpj)
    {
        $cnpj = $_POST['cnpj'];

            // tirar traços e pontos//
            $cnpj = str_replace(".", "", $cnpj);
            $cnpj = str_replace("/", "", $cnpj);
            $cnpj = str_replace("-", "", $cnpj);
            //echo($cnpj)//
            //digito verificador ///

            $cnpjValidacao = substr($cnpj,0,12);
            //echo($cnpjValidacao);

            $cnpjValidacao .= self::calcularDigitoVerificador($cnpjValidacao);
            $cnpjValidacao .= self::calcularDigitoVerificador($cnpjValidacao);
             
            return $cnpjValidacao == $cnpj;
    }
        // metodo responsavel em calcular 1 digito verificador com a 
        // sequencia de 12 numeros que no caso ficaram 13 numeros //
    function calcularDigitoVerificador($num)
    {
        // variaveis//
        $tamanho = strlen($num);
        $m = 9 ;
        $soma = 0;

        // soma da direita para esquerda//

        for($i = ($tamanho -1); $i>=0; $i--)
        {
            $soma += $num[$i] * $m;
            
            // ajustar o verificador//
            $m--;
            $m = $m < 2 ? 9 : $m ;
        }
        // resto da divisao = digito verificador//
            return $soma % 11;
        //echo( $soma % 11);
        //echo($num[$i]);
        //echo($soma);
    }
}