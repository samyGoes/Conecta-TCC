<?php

    require_once '../auth/verifica-logado.php';
    require_once 'global.php';
    
    try
    {
      
        // Mostrar o conteúdo da sessão
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

        $idInstituicao = InstituicaoDao::consultarId($instituicao);
        //inserindo o id da instituição na classe Instituicao
        $instituicao ->setFtPerfilInstituicao($idInstituicao);

        //nome original do arquivo no computador do usuário
        $nome = $_FILES['foto']['name'];

         //nome temporário do arquivo como foi armazenado no servidor, é o ARQUIVO!!!
        $arquivo = $_FILES['foto'] ['tmp_name'];

        $diretorio = "img-instituicao/";
    
        $extensao = substr($nome, -4);//pega o ponto e os 3 caracteres da extensão do arquivo

        $nomenovo = $instituicao->getIdInstituicao().$extensao;

        $nomecompleto =  $diretorio.$nomenovo;
        
        // $nomecompleto =  $diretorio.$nome;

        move_uploaded_file($arquivo, $nomecompleto);

        //inserindo a foto na classe Instituicao
        $instituicao->setFtPerfilInstituicao($nomecompleto);

        //Chamando a função da classe Dao para atualizar a foto de perfil
        $atualizar=InstituicaoDao::atualizarFotoPerfil($instituicao);

        //atualizando os dados da sessâo
        $_SESSION['ftPerfil'] = $nomecompleto;
        $_SESSION['nomeUsuario'] = $instituicao->getNomeInstituicao();
        $_SESSION['emailUsuario'] = $instituicao->getEmailInstituicao();
        //$_SESSION['numFoneUsuario1'] =;
        //$_SESSION['numFoneUsuario2'] = ;
        $_SESSION['logUsuario'] = $instituicao->getLogradouroInstituicao();
        $_SESSION['numLogUsuario'] = $instituicao->getNumeroInstituicao();
        $_SESSION['cepUsuario'] = $instituicao->getCepInstituicao();
        $_SESSION['bairroUsuario'] = $instituicao->getBairroInstituicao();
        $_SESSION['cidadeUsuario'] = $instituicao->getCidadeInstituicao();
        $_SESSION['estadoUsuario'] = $instituicao->getEstadoInstituicao();
        $_SESSION['compUsuario'] = $instituicao->getCompInstituicao();
        $_SESSION['paisUsuario'] = $instituicao->getPaisInstituicao();
        $_SESSION['descUsuario'] = $instituicao->getDescInstituicao();
        
    }
    catch(Exception $e)
    {
        echo "Erro update-instituição";
        echo '<pre>';
            echo($e);
        echo '</pre>';
         
    }

?>