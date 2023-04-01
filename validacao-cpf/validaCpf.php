<?php

    require_once "../model/Cpf.php";

    $validar = new Cpf();

    $cpf = $_POST['cpf'];

    if ($validar -> validar($cpf) == true)
    {
        echo("Valido");
    }
    else
    {
        echo("Cpf inválido");
    }
    

?>