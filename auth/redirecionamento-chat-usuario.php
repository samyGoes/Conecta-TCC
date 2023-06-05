<?php
    require_once 'global.php';
    include "loginUsuario.php";

    $id = $_GET['c']; 
    $tipo = $_GET['t']; 
    
    if($id && $tipo) 
    {
        
        if($tipo == "Instituicao")
        {
            $consulta = InstituicaoDao::consultarInstituicao($id);
            if($consulta == false)
            {
                header('Location: ../index.php');
            }
            else
            {
                $_SESSION['dadoPerfil'] = $consulta;
                header('Location: ../area-instituicao/gerenciar-vagas/chat-instituicao.php');
            }
        }
        else if($tipo == "Voluntario")
        {
            $consulta = VoluntarioDao::consultarVoluntario($id);
            
            if($consulta == false)
            {
                // var_dump($consulta);
                header('Location: ../index.php');
            }
            else
            {
                $_SESSION['dadoPerfil'] = $consulta;
                header('Location: ../area-instituicao/gerenciar-vagas/chat-instituicao.php?c='.$id);
            }
        }
    }
    
?>
