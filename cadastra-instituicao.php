<?php
    require_once 'global.php';

    //Cadastrando os dados informados no formulário pela instituição na classe Instituicao.
    try
    {
        header('Location: form-login.php?cadastro=sucesso');
        
        $instituicao = new Instituicao();
        $instituicao -> setNomeInstituicao($_POST['name']);
        $instituicao -> setTel1Instituicao($_POST['telefone1']);
        $instituicao -> setTel2Instituicao($_POST['telefone2']);
        $instituicao -> setEmailInstituicao($_POST['email']);
        $instituicao -> setCnpjInstituicao($_POST['cnpj']);
        $instituicao -> setSenhaInstituicao($_POST['senha']);
        $instituicao -> setConfSenhaInstituicao($_POST['confSenha']);
        $instituicao -> setLogradouroInstituicao($_POST['logradouro']);
        $instituicao -> setnumeroInstituicao($_POST['numeroCasa']);
        $instituicao -> setCepInstituicao($_POST['cep']);
        $instituicao -> setBairroInstituicao($_POST['bairro']);
        $instituicao -> setCidadeInstituicao($_POST['cidade']);
        $instituicao -> setCompInstituicao($_POST['complemento']);
        $instituicao -> setPaisInstituicao($_POST['pais']);
        $instituicao -> setEstadoInstituicao($_POST['uf']);

        //Guardando caminho da foto de perfil padrão
        $user = "img/user.png";

        //inserindo a foto na classe Instituição
        $instituicao -> setFtPerfilInstituicao($user);

        $cadastrar = InstituicaoDao::cadastrar($instituicao);
    }
    catch(Exception $e)
    {
        echo "Erro cadastra-instituição";
        echo '<pre>';
            echo($e);
        echo '</pre>';
         
    }

?>