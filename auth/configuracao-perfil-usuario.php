<?php 
    require_once '../auth/verifica-logado.php';

    $id = $_SESSION['codUsuario'];
    $tipo = $_SESSION['tipoPerfil'];


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
                header('Location: ../area-instituicao/form-editar-perfil-instituicao.php');
            }
        }
        else if($tipo == "Voluntario")
        {
            $consulta = VoluntarioDao::consultarVoluntario($id);
            if($consulta == false)
            {
                header('Location: ../index.php');
            }
            else
            {
                $_SESSION['dadoPerfil'] = $consulta;
                header('Location: ../area-voluntario/form-editar-perfil-voluntario.php');
            }
        }
    }
?>