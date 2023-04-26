<?php
    require 'busca-email.php';

    session_start();
    global $_SESSION;
    
    //var_dump($_POST);
    $email = $_POST['email'];
    $_SESSION['email'] = $email;

    if (isset($email))
    {   
        $resultado = buscaEmail($email);
        if ($resultado['email']) 
        {
            echo json_encode(['status' => true, 'nome' => $resultado['nome']]);
        }
        else 
        {
            echo json_encode(['status' => false, 'nome' => '']);
        }
    }

    //print_r($_SESSION);


?>
