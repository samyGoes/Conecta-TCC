<?php
    require_once 'global.php';
    include "../../auth/verifica-logado.php";
    require_once 'tabela-voluntarios-instituicao.php';


    
    //var_dump($_POST);
    if (isset($_POST['btnRecusar']))
    {
        $email = $_POST['btnRecusar'];
        echo $email;
    }
    // Verifica se o campo de email foi preenchido
    if (empty($email)) 
    {
        echo json_encode(['status' => false, 'nome' => '']);
        exit; // interrompe a execução do script
    }
   
    $resultado = CandidaturaDao::buscaEmail($email);
    if ($resultado['email']) 
    {
        echo json_encode(['status' => true, 'nome' => $resultado['nome'], $resultado['email']]);
    }
    else 
    {
        echo json_encode(['status' => true, 'nome' => '', 'email' => ''  ]);
    }

?>
