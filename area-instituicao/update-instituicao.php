<?php

    require_once '../auth/verifica-logado.php';
    require_once 'global.php';
    
    try
    {
        header('Location: form-editar-perfil-instituicao.php?edicao=sucesso');
      
        $instituicao = new Instituicao();
        $instituicao -> setIdInstituicao($_SESSION['codUsuario']);
        $instituicao -> setNomeInstituicao($_POST['nome']);
        $instituicao -> setTel1Instituicao($_POST['telefone1']);
        $instituicao -> setTel2Instituicao($_POST['telefone2']);
        $instituicao -> setEmailInstituicao($_POST['email']);
        $instituicao -> setLogradouroInstituicao($_POST['log']);
        $instituicao -> setnumeroInstituicao($_POST['numeroCasa']);
        $instituicao -> setCepInstituicao($_POST['cep']);
        $instituicao -> setBairroInstituicao($_POST['bairro']);
        $instituicao -> setCidadeInstituicao($_POST['cidade']);
        $instituicao -> setCompInstituicao($_POST['complemento']);
        $instituicao -> setPaisInstituicao($_POST['pais']);
        $instituicao -> setEstadoInstituicao($_POST['uf']);
        $instituicao -> setDescInstituicao($_POST['desc']);

        //Atualizando sem a foto
        $update = InstituicaoDao::editar($instituicao);

        //Atualizar telefones
        $updateTel = InstituicaoDao::editarTel($instituicao);

        $idInstituicao = InstituicaoDao::consultarId($instituicao);

        //Atualizando os dados na sessão
        $consulta = InstituicaoDao::consultarInstituicao($_SESSION['codUsuario']);
        $_SESSION['dadoPerfil'] = $consulta;


        if(isset($_FILES['foto']) && !empty($_FILES['foto']['tmp_name'])) 
        {
            //nome original do arquivo no computador do usuário
            $nome = $_FILES['foto']['name'];

            //nome temporário do arquivo como foi armazenado no servidor, é o ARQUIVO!!!
            $arquivo = $_FILES['foto'] ['tmp_name'];

            $diretorio = "img-instituicao/";
        
            $extensao = substr($nome, -4);//pega o ponto e os 3 caracteres da extensão do arquivo

            $nomenovo = $idInstituicao.$extensao;

            $nomecompleto =  $diretorio.$nomenovo;
            
            // $nomecompleto =  $diretorio.$nome;

            move_uploaded_file($arquivo, $nomecompleto);

            //inserindo a foto na classe Instituicao
            $instituicao->setFtPerfilInstituicao($nomecompleto);

            //Chamando a função da classe Dao para atualizar a foto de perfil
            $atualizar=InstituicaoDao::atualizarFotoPerfil($instituicao);

            //Guardando a foto na sessão
            $_SESSION['dadoPerfil']['fotoInstituicao'] = $nomecompleto;
        }

        
        
    }
    catch(Exception $e)
    {
        echo "Erro update-instituição";
        echo '<pre>';
            echo($e);
        echo '</pre>';
         
    }

?>