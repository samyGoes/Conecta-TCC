<?php
require 'busca-email.php';
//require 'global.php';

    $email = $_POST['email'];
   
    if (isset($email))
    {   
        $resultado = buscaEmail($email);
        if ($resultado) 
        {
            $nome = nomeEmail($email);
            echo json_encode(['status' => true, 'nome' => $nome]);
        }
        else 
        {
            echo json_encode(['status' => false, 'nome' => '']);
        }
    }

?>