<?php
    require_once 'global.php';

    class ServicoDao
    {
        function cadastrar($servico)
        {
            $conexao = Conexao :: conectar();

            $prepareStatement = $conexao -> prepare ( "INSERT INTO tbservico(nomeservico, tipoServico, descServico, cepLocalServico, bairroLocalServico, estadoLocalServico, logradouroLocalServico, complementoLocalServico, paisLocalServico, numeroLocalServico, cidadeLocalServico, dataTerminoServico, dataInicioServico, qntdVagaServico, statusServico, avaliacaoInstituicao, avaliacaoVoluntario, periodoServico, horarioServico) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");

            $prepareStatement -> bindValue (1, $servico -> getNomeServico());
            $prepareStatement -> bindValue (2, $servico -> getTipoServico());
            $prepareStatement -> bindValue (3, $servico -> getDescServico());
            $prepareStatement -> bindValue (4, $servico -> getCepLocalServico());      
            $prepareStatement -> bindValue (5, $servico -> getBairroLocalServico());
            $prepareStatement -> bindValue (6, $servico -> getEstadoLocalServico());
            $prepareStatement -> bindValue (7, $servico -> getLogradouroLocalServico());
            $prepareStatement -> bindValue (8, $servico -> getComplementoLocalServico());      
            $prepareStatement -> bindValue (9, $servico -> getPaisLocalServico());
            $prepareStatement -> bindValue (10, $servico -> getNumeroLocalServico());
            $prepareStatement -> bindValue (11, $servico -> getCidadeLocalServico());
            $prepareStatement -> bindValue (12, $servico -> getDataTerminoServico());
            $prepareStatement -> bindValue (13, $servico -> getDataInicioServico());
            $prepareStatement -> bindValue (14, $servico -> getQntdVagaServico());
            $prepareStatement -> bindValue (15, $servico -> getStatusServico());
            $prepareStatement -> bindValue (16, $servico -> getAvaliacaoInstituicao());      
            $prepareStatement -> bindValue (17, $servico -> getAvaliacaoVoluntario());
            $prepareStatement -> bindValue (18, $servico -> getPeriodoServico());
            $prepareStatement -> bindValue (19, $servico -> getHorarioServico());
           
            $prepareStatement -> execute();
        }
    }


?>