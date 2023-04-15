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

        $instituicao->setFtPerfilInstituicao($nomecompleto);
        $_SESSION['ftPerfil'] = $nomecompleto;

        $atualizar=InstituicaoDao::atualizarFotoPerfil($instituicao);
        
    }
    catch(Exception $e)
    {
        echo "Erro update-instituição";
        echo '<pre>';
            echo($e);
        echo '</pre>';
         
    }

?>