<?php
    require_once 'global.php';

    class ServicoDao
    {
        public static function cadastrar($servico)
        {
            $conexao = Conexao :: conectar();

            $prepareStatement = $conexao -> prepare ( "INSERT INTO tbservico(nomeservico, tipoServico, descServico, cepLocalServico, bairroLocalServico, 
            estadoLocalServico, logradouroLocalServico, complementoLocalServico, paisLocalServico, 
            numeroLocalServico, cidadeLocalServico, dataTerminoServico, dataInicioServico, qntdVagaServico, 
            statusServico, avaliacaoInstituicao, avaliacaoVoluntario, periodoServico, horarioServico,codInstituicao) 
            VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");

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
            $prepareStatement -> bindValue (20, $servico -> getInstituicao() ->getIdInstituicao());
           
            $prepareStatement -> execute();
        }

        public static function consultarId($servico){
            $conexao = Conexao::conectar();
            $querySelect1 = "SELECT codInstituicao FROM tbinstituicao WHERE nomeInstituicao LIKE '".$servico->getInstituicao()."'";
            $resultado1 = $conexao->query($querySelect1);
            $lista1 = $resultado1->fetchAll();
            foreach ($lista1 as $instituicao)
                $id1 = $instituicao['codInstituicao'];
            return $id1; 
            
            $querySelect2 = "SELECT codHabilidadeServico FROM tbhabilidadeServico WHERE nomeHabilidade LIKE '".$servico->getHabilidadeServico()."'";
            $resultado2 = $conexao->query($querySelect2);
            $lista2 = $resultado2->fetchAll();
            foreach ($lista2 as $habilidadeServico)
                $id2 = $habilidadeServico['codHabilidadeServico'];
            return $id2;   

            $querySelect3 = "SELECT codCategoriaServico FROM tbcategoriaServico WHERE descCategoriaServico LIKE '".$servico->getCategoriaServico()."'";
            $resultado3 = $conexao->query($querySelect3);
            $lista3 = $resultado3->fetchAll();
            foreach ($lista3 as $categoriaServico)
                $id3 = $categoriaServico['codCategoriaServico'];
            return $id3;   
        }
    }


?>
 
