<?php

    require_once '../auth/verifica-logado.php';
    require_once 'global.php';

    try
    {
        $galeria = new GaleriaInstituicao();
        $instituicao = new Instituicao();

        $galeria -> setIdInstituicao($_SESSION['codUsuario']);
       // $galeria -> setFotoGaleria($_POST['foto']);

        //$idInstituicao = InstituicaoDao::consultarId($galeria);

        if(isset($_FILES['foto']) && !empty($_FILES['foto']['tmp_name'])) 
        {
            //nome original do arquivo no computador do usuário
            $nome = $_FILES['foto']['name'];

            //nome temporário do arquivo como foi armazenado no servidor, é o ARQUIVO!!!
            $arquivo = $_FILES['foto'] ['tmp_name'];

            $diretorio = "galeria-instituicao/";
        
            $extensao = substr($nome, -4);//pega o ponto e os 3 caracteres da extensão do arquivo

            $nomenovo = $_SESSION['codUsuario'].$extensao;

            $nomecompleto =  $diretorio.$nomenovo;
            
            // $nomecompleto =  $diretorio.$nome;

            move_uploaded_file($arquivo, $nomecompleto);

            //inserindo a foto na classe Instituicao
            $galeria->setFotoGaleria($nomecompleto);
 
            //Chamando a função da classe Dao para atualizar a foto de perfil
            $atualizar = GaleriaInstituicaoDao::cadastrar($galeria);

            //Guardando a foto na sessão
            $_SESSION['dadoPerfil']['fotoInstituicao'] = $nomecompleto;
        }
    }
    catch(Exception $e)
    {
        echo "Erro";
        echo '<pre>';
            echo($e);
        echo '</pre>';        
    }

?>