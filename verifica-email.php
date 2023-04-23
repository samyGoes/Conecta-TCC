<?php
require 'busca-email.php';

    $email = $_POST['email'];
    
    if (isset($_POST['email']))
    {   
        $resultado = buscaEmail($email);
        echo json_encode($resultado);
    }

?>