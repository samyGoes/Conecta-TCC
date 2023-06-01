<?php

    require_once "global.php";
    require_once '../auth/verifica-logado.php';

    $idInstituicaoLogada = $_SESSION['codUsuario'];
    $resultado = InstituicaoDao::notificacoes($idInstituicaoLogada);

    //if($resultado)
    echo json_encode($resultado);

?>