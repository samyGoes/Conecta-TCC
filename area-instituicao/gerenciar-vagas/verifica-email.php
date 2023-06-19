<?php
    require 'busca-email.php';

    session_start();
    global $_SESSION;
    
    //var_dump($_POST);
    $email = $_POST['email'];
    $_SESSION['email'] = $email;

    // Verifica se o campo de email foi preenchido
    if (empty($email)) 
    {
        echo json_encode(['status' => false, 'nome' => '']);
        exit; // interrompe a execução do script
    }
   
    $resultado = buscaEmail($email);
    if ($resultado['email']) 
    {
        echo json_encode(['status' => true, 'nome' => $resultado['nome']]);
    }
    else 
    {
        echo json_encode(['status' => false, 'nome' => '']);
    }

?>
