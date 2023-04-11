<?php
    require_once 'global.php';
    require_once '../auth/loginUsuario.php';
    try
    {
        $instituicao = new Instituicao();
        $instituicao -> setIdInstituicao($_SESSION['codUsuario']);
        $instituicao -> setNomeInstituicao($_POST['nome']);
        $instituicao -> setTel1Instituicao($_POST['telefone1']);
        $instituicao -> setTel2Instituicao($_POST['telefone2']);
        $instituicao -> setEmailInstituicao($_POST['email']);
        //$instituicao -> setCnpjInstituicao($_POST['cnpj']);
        //$instituicao -> setSenhaInstituicao($_POST['senha']);
        //$instituicao -> setConfSenhaInstituicao($_POST['confSenha']);
        $instituicao -> setLogradouroInstituicao($_POST['log']);
        $instituicao -> setnumeroInstituicao($_POST['numeroCasa']);
        $instituicao -> setCepInstituicao($_POST['cep']);
        $instituicao -> setBairroInstituicao($_POST['bairro']);
        $instituicao -> setCidadeInstituicao($_POST['cidade']);
        $instituicao -> setCompInstituicao($_POST['complemento']);
        $instituicao -> setPaisInstituicao($_POST['pais']);
        $instituicao -> setEstadoInstituicao($_POST['uf']);
        $instituicao -> setDescInstituicao($_POST['desc']);

    

        $update = InstituicaoDao::editar($instituicao);
        
    }
    catch(Exception $e)
    {
        echo "Erro update-instituição";
        echo '<pre>';
            echo($e);
        echo '</pre>';
         
    }

?>