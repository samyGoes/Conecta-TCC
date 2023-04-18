<?php
    require_once 'global.php';

    class ServicoDao
    {
        public static function cadastrar($servico)
        {
            $conexao = Conexao :: conectar();

            $prepareStatement = $conexao -> prepare ( "INSERT INTO tbservico(horarioServico, periodoServico, codInstituicao,descServico, cepLocalServico, bairroLocalServico, 
            estadoLocalServico, logradouroLocalServico, complementoLocalServico, paisLocalServico, numeroLocalServico, cidadeLocalServico, nomeservico, tipoServico
            ,dataInicioServico, qntdVagaServico) 
            VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");

            $prepareStatement -> bindValue (1, $servico -> getHorarioServico());
            $prepareStatement -> bindValue (2, $servico -> getPeriodoServico());
            $prepareStatement -> bindValue (3, $servico -> getInstituicao());
            $prepareStatement -> bindValue (4, $servico -> getDescServico());
            $prepareStatement -> bindValue (5, $servico -> getCepLocalServico());      
            $prepareStatement -> bindValue (6, $servico -> getBairroLocalServico());
            $prepareStatement -> bindValue (7, $servico -> getEstadoLocalServico());
            $prepareStatement -> bindValue (8, $servico -> getLogradouroLocalServico());
            $prepareStatement -> bindValue (9, $servico -> getComplementoLocalServico());      
            $prepareStatement -> bindValue (10, $servico -> getPaisLocalServico());
            $prepareStatement -> bindValue (11, $servico -> getNumeroLocalServico());
            $prepareStatement -> bindValue (12, $servico -> getCidadeLocalServico());
            $prepareStatement -> bindValue (13, $servico -> getNomeServico());
            $prepareStatement -> bindValue (14, $servico -> getTipoServico());
            $prepareStatement -> bindValue (15, $servico -> getDataInicioServico());
            $prepareStatement -> bindValue (16, $servico -> getQntdVagaServico());
            
            $prepareStatement -> execute();

            $idVaga = $conexao->lastInsertId();

            // Insere as habilidades e causas vinculadas à vaga na tabela tbvagahabilidadecausa
            foreach ($servico->getHabilidadeServico() as $habilidade) {
                $prepareStatement = $conexao->prepare("INSERT INTO  tbhabivaga (codServico, codHabilidadeServico) 
                VALUES (?,?)");
                $prepareStatement->bindValue(1, $idVaga);
                $prepareStatement->bindValue(2, $habilidade);
                $prepareStatement->execute();
              }
              foreach ($servico->getCategoriaServico() as $causa) {
                $prepareStatement = $conexao->prepare("INSERT INTO tbCausaVaga (codServico,codCategoriaServico)
                VALUES (?,?)");
                $prepareStatement->bindValue(1, $idVaga);
                $prepareStatement->bindValue(2, $causa);
                $prepareStatement->execute();
              }
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

        public static function excluir()
        {
            $conectar=Conexao::conectar();

                $deleteServico = $conectar->prepare("DELETE FROM tbServico WHERE codServico = ?");
                $deleteServico->bindValue(1,$servico->getId());
                $deleteServico->execute();

                $deleteHabiVaga = $conectar->prepare("DELETE FROM tbHabiVaga WHERE codServico = ?");
                $deleteHabiVaga->bindValue(1,$servico->getId());
                $deleteHabiVaga->execute();

                $deleteCausa = $conectar->prepare("DELETE FROM tbCausaVaga WHERE codServico = ?");
                $deleteCausa->bindValue(1,$servico->getId());
                $deleteCausa->execute();

            
        }
    }


?>
 
