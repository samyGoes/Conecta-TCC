<?php
     require_once 'global.php';  
     require_once '../../auth/verifica-logado.php';

     try
    {
        header('Location: vaga-completa-instituicao.php?edicao=sucesso');
        //criando um objeto da classe Serviço
        $servico= new Servico();
    
        //Inserindo os dados vindos do formulário nos atributos da classe
        $servico -> setId($_SESSION['vaga']['codServico']);
        $servico -> setNomeServico($_POST ['nome']);
        $servico-> setTipoServico($_POST['tipoVaga']);
        $servico-> setQntdVagaServico($_POST['quantidadeVaga']);
        $servico-> setPeriodoServico($_POST['periodo']);
        $servico-> setHorarioServico($_POST['horario']);
        $servico-> setCepLocalServico($_POST['cep']);
        $servico-> setBairroLocalServico($_POST['bairro']);
        $servico-> setEstadoLocalServico($_POST['uf']);
        $servico-> setLogradouroLocalServico($_POST['logradouro']);
        $servico-> setComplementoLocalServico($_POST['complemento']);
        $servico-> setPaisLocalServico($_POST['pais']);
        $servico-> setNumeroLocalServico($_POST['numeroCasa']);
        $servico-> setCidadeLocalServico($_POST['cidade']);
        $servico-> setDescservico($_POST['desc']);
        $servico-> setInstituicao($_SESSION['codUsuario']);
        $servico-> setCategoriaServico($_POST['causas']);
        $servico-> setHabilidadeServico($_POST['habilidade']);

        //Transformando a data brasileira digitada pelo usuário em uma data americana
        $data_brasil = $_POST['dataInicio'];
        $data_americana = date('Y-m-d', strtotime(str_replace('/', '-', $data_brasil)));
        $servico-> setDataInicioServico($data_americana);

        $update = ServicoDao::editar($servico);

         //Atualizando as sessões
         $vaga = ServicoDao::consultarVaga($_SESSION['codVaga']);
         $_SESSION['vaga'] = $vaga;
         $causa = ServicoDao::consultarCausa($_SESSION['codVaga']);
         $_SESSION['causa'] = $causa;
         $habilidade = ServicoDao::consultarHabilidade($_SESSION['codVaga']);
         $_SESSION['habilidade'] = $habilidade;

    }
    catch(Exception $e)
    {
        echo "Erro cadastra-voluntario";
        echo '<pre>';
            echo($e);
        echo '</pre>';
         
    }
?>



?>