<?php

    require_once '../auth/verifica-logado.php';
    require_once 'global.php';

    try {

        header('Location: form-adicionar-fotos-instituicao.php');

        $galeria = new GaleriaInstituicao();
        $instituicao = new Instituicao();

        $galeria->setIdInstituicao($_SESSION['codUsuario']);

        if (isset($_FILES['foto']) && !empty($_FILES['foto']['tmp_name'])) {
            $nome = $_FILES['foto']['name'];
            $arquivo = $_FILES['foto']['tmp_name'];
            $diretorio = "galeria-instituicao/";
            
            $extensao = substr($nome, -4);
            $nomealeatorio = uniqid() . $extensao; // Gera um nome aleatório

            $nomecompleto = $diretorio . $nomealeatorio;
            
            move_uploaded_file($arquivo, $nomecompleto);

            $galeria->setFotoGaleria($nomecompleto);

            $atualizar = GaleriaInstituicaoDao::cadastrar($galeria);

            //$_SESSION['dadoPerfil']['fotoInstituicao'] = $nomecompleto;
        }
    } catch (Exception $e) {
        echo "Erro";
        echo '<pre>';
        echo($e);
        echo '</pre>';        
    }

?>
