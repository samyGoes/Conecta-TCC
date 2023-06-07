<?php

    require_once '../auth/verifica-logado.php';
    require_once 'global.php';

    try 
    {
        header('Location: form-adicionar-fotos-instituicao.php?cadastro=sucesso');

        $galeria = new GaleriaInstituicao();
        $instituicao = new Instituicao();

        $galeria->setIdInstituicao($_SESSION['codUsuario']);

        if (isset($_FILES['foto']) && !empty($_FILES['foto']['tmp_name'][0])) {
            $arquivos = $_FILES['foto'];

            for ($i = 0; $i < count($arquivos['name']); $i++) 
            {
                $nome = $arquivos['name'][$i];
                $arquivo = $arquivos['tmp_name'][$i];
                $diretorio = "galeria-instituicao/";

                $extensao = substr($nome, -4);
                $nomealeatorio = uniqid() . $extensao; // Gera um nome aleatório

                $nomecompleto = $diretorio . $nomealeatorio;

                move_uploaded_file($arquivo, $nomecompleto);

                $galeria->setFotoGaleria($nomecompleto);

                $atualizar = GaleriaInstituicaoDao::cadastrar($galeria);
            }
        }
    } 
    catch (Exception $e)
    {
        echo "Erro";
        echo '<pre>';
        echo($e);
        echo '</pre>';
    }
?>