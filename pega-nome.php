<?php
    require 'busca-email.php';

    $email = $_POST['email'];
    
    if (isset($_POST['email']))
    {   
        $resultado2 = nomeEmail($email);
        echo json_encode($resultado2);
    }

?>