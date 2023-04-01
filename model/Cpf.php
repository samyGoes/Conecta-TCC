<?php

    class Cpf
    {
        function validar($cpf)
        {
            $cpf = $_POST['cpf'];

            // tirar traços e pontos//
            $cpf = str_replace(".", "", $cpf);
            $cpf = str_replace("-", "", $cpf);

            $cpf = preg_replace('/^0-9/','',$cpf);
            $d1 = 0;
            $d2 = 0;

            for($i=0, $f=10 ;$i <=8; $i++, $f--)
            {
                $d1 += $cpf[$i] * $f;
            }

            for($i=0, $f=11 ;$i <=9; $i++, $f--)
            {
                $d2 += $cpf[$i] * $f;
            }

            $r1 = (($d1 % 11) < 2) ? 0 : 11-($d1 % 11);
            $r2 = (($d2 % 11) < 2) ? 0 : 11-($d2 % 11);

            if($r1 != $cpf[9] || $r2 != $cpf[10])
            {
                return false;
            }
            else
            {
                return true;
            }
        }
    }
?>