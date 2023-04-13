<?php
    require_once 'global.php';  

    try{

    //criando um objeto da classe Voluntario
    $servico= new Servico();
    
    //Inserindo os dados vindos do formulário nos atributos da classe
    $servico -> setNomeServico($_POST ['nome']);
    $servico-> setTipoServico($_POST['tipoVaga']);
    //$servico-> setDescServico($_POST['telefone1']);
    //$servico-> setDataTerminoServico($_POST['email']);
    $servico-> setDataInicioServico($_POST['dataInicio']);
    $servico-> setQntdVagaServico($_POST['quantidadeVaga']);
    //$servico-> setStatusServico($_POST['logradouro']);
    //$servico-> setAvaliacaoInstituicao($_POST['numLog']);
    //$servico-> setAvaliacaoVoluntario($_POST['complemento']);
    $servico-> setPeriodoServico($_POST['periodo']);
    $servico-> setHorarioServico($_POST['horario']);
    $servico-> setCepLocalServico($_POST['cep']);
    $servico-> setBairroLocalServico($_POST['bairro']);
    $servico-> setEstadoLocalServico($_POST['estado']);
    $servico-> setLogradouroLocalServico($_POST['logradouro']);
    $servico-> setComplementoLocalServico($_POST['complemento']);
    $servico-> setPaisLocalServico($_POST['pais']);
    $servico-> setNumeroLocalServico($_POST['numero']);
    $servico-> setCidadeLocalServico($_POST['cidade']);
    
   

    }
    catch(Exception $e)
    {
        echo "Erro cadastra-voluntario";
        echo '<pre>';
            echo($e);
        echo '</pre>';
         
    }
?>