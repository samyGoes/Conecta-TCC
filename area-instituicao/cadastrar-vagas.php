<?php
     require_once '../auth/verifica-logado.php';
    require_once 'global.php';  

    try
    {
        header('Location: form-cadastrar-vagas-instituicao.php');
        //criando um objeto da classe Serviço
        $servico= new Servico();
    
        //Inserindo os dados vindos do formulário nos atributos da classe
        $servico -> setNomeServico($_POST ['nome']);
        $servico-> setTipoServico($_POST['tipoVaga']);
        $servico-> setDataInicioServico($_POST['dataInicio']);
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



        $cadastrar = ServicoDao::cadastrar($servico);

    }
    catch(Exception $e)
    {
        echo "Erro cadastra-voluntario";
        echo '<pre>';
            echo($e);
        echo '</pre>';
         
    }
?>