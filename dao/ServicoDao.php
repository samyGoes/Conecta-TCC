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

        public static function editar($servico)
        {
            $conectar=Conexao::conectar();

            $prepareStatement = $conectar->prepare("UPDATE tbservico SET horarioServico = ?,periodoServico = ?,codInstituicao = ?,
            descServico = ?,cepLocalServico = ?,bairroLocalServico = ?,estadoLocalServico = ?,
            logradouroLocalServico = ?,complementoLocalServico = ?,paisLocalServico = ?,numeroLocalServico = ?,cidadeLocalServico = ?,
             nomeservico = ?, tipoServico = ?,dataInicioServico = ?, qntdVagaServico = ? WHERE 	codServico = ?");

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
            $prepareStatement -> bindValue (17, $servico -> getId());

            $prepareStatement -> execute();

            $idVaga = $servico->getId();

           
            // Atualiza as habilidades vinculadas à vaga na tabela tbhabivaga
            foreach ($servico->getHabilidadeServico() as $habilidade) 
            {
                $prepareStatement = $conectar->prepare("SELECT * FROM tbhabivaga WHERE codServico = ? AND codHabilidadeServico = ?");
                $prepareStatement->bindValue(1, $idVaga);
                $prepareStatement->bindValue(2, $habilidade);
                $prepareStatement->execute();
                
                $result = $prepareStatement->fetch(PDO::FETCH_ASSOC);
                
                if ($result) {
                    // Habilidade já existe na tabela, atualiza o registro existente
                    $prepareStatement = $conectar->prepare("UPDATE tbhabivaga SET codServico = ?, codHabilidadeServico = ? WHERE id = ?");
                    $prepareStatement->bindValue(1, $idVaga);
                    $prepareStatement->bindValue(2, $habilidade);
                    $prepareStatement->bindValue(3, $result['id']);
                    $prepareStatement->execute();
                } else {
                    // Habilidade não existe na tabela, insere um novo registro
                    $prepareStatement = $conectar->prepare("INSERT INTO tbhabivaga (codServico, codHabilidadeServico) VALUES (?, ?)");
                    $prepareStatement->bindValue(1, $idVaga);
                    $prepareStatement->bindValue(2, $habilidade);
                    $prepareStatement->execute();
                }
            }

            // Atualiza as causas vinculadas à vaga na tabela tbCausaVaga
            foreach ($servico->getCategoriaServico() as $causa) {
                $prepareStatement = $conectar->prepare("SELECT * FROM tbcausavaga WHERE codServico = ? AND codCategoriaServico = ?");
                $prepareStatement->bindValue(1, $idVaga);
                $prepareStatement->bindValue(2, $causa);
                $prepareStatement->execute();
                
                $result = $prepareStatement->fetch(PDO::FETCH_ASSOC);
                
                if (isset($_POST['causa_' . $causa])) {
                    // Checkbox marcado, atualiza ou insere na tabela
                    if ($result) {
                        // Causa já existe na tabela, atualiza o registro existente
                        $prepareStatement = $conectar->prepare("UPDATE tbcausavaga SET codServico = ?, codCategoriaServico = ? WHERE id = ?");
                        $prepareStatement->bindValue(1, $idVaga);
                        $prepareStatement->bindValue(2, $causa);
                        $prepareStatement->bindValue(3, $result['id']);
                        $prepareStatement->execute();
                    } else {
                        // Causa não existe na tabela, insere um novo registro
                        $prepareStatement = $conectar->prepare("INSERT INTO tbcausavaga (codServico, codCategoriaServico) VALUES (?, ?)");
                        $prepareStatement->bindValue(1, $idVaga);
                        $prepareStatement->bindValue(2, $causa);
                        $prepareStatement->execute();
                    }
                } else {
                    // Checkbox desmarcado, exclui o registro da tabela (se existir)
                    if ($result) {
                        $prepareStatement = $conectar->prepare("DELETE FROM tbcausavaga WHERE id = ?");
                        $prepareStatement->bindValue(1, $result['id']);
                        $prepareStatement->execute();
                    }
                }
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

        public static function excluir($cod)
        {
            $conectar=Conexao::conectar();

            $deleteHabiVaga = $conectar->prepare("DELETE FROM tbHabiVaga WHERE codServico = ?");
            $deleteHabiVaga->bindValue(1,$cod);
            $deleteHabiVaga->execute();
            
            $deleteCausa = $conectar->prepare("DELETE FROM tbCausaVaga WHERE codServico = ?");
            $deleteCausa->bindValue(1,$cod);
            $deleteCausa->execute();

            $deleteServico = $conectar->prepare("DELETE FROM tbServico WHERE codServico = ?");
            $deleteServico->bindValue(1,$cod);
            $deleteServico->execute();

        }

        public static function listarVaga($cod)
        {
            $conectar= Conexao::conectar();

            $querySelect = $conectar->prepare("SELECT tbServico.codServico, horarioServico, periodoServico, descServico, 
            cepLocalServico, bairroLocalServico, estadoLocalServico, logradouroLocalServico, 
            complementoLocalServico, paisLocalServico, numeroLocalServico, cidadeLocalServico, 
            nomeservico, tipoServico, dataInicioServico, qntdVagaServico, tbInstituicao.codInstituicao, 
            nomeInstituicao, fotoInstituicao 
            FROM tbServico
            INNER JOIN tbInstituicao ON tbInstituicao.codInstituicao = tbServico.codInstituicao 
            WHERE tbInstituicao.codInstituicao = ?");

            $querySelect->bindValue(1,$cod);

            $querySelect->execute();

            $lista = $querySelect->fetchAll();

            return $lista;   
        }

        public static function consultarVaga($cod)
        {
            $conectar= Conexao::conectar();

            $querySelect = $conectar->prepare("SELECT tbServico.codServico, horarioServico, periodoServico, descServico, 
            cepLocalServico, bairroLocalServico, estadoLocalServico, logradouroLocalServico, 
            complementoLocalServico, paisLocalServico, numeroLocalServico, cidadeLocalServico, 
            nomeservico, tipoServico, dataInicioServico, qntdVagaServico, tbInstituicao.codInstituicao, 
            nomeInstituicao, fotoInstituicao, 
            GROUP_CONCAT(tbCategoriaServico.codCategoriaServico) as categoria_id, 
            GROUP_CONCAT(tbCategoriaServico.nomeCategoria) as causas, 
            GROUP_CONCAT(tbHabilidadeServico.codHabilidadeServico) as habilidade_id, 
            GROUP_CONCAT(tbHabilidadeServico.nomeHabilidadeServico) as habilidades
            FROM tbServico
            INNER JOIN tbInstituicao ON tbInstituicao.codInstituicao = tbServico.codInstituicao 
            INNER JOIN tbcausavaga ON tbcausavaga.codServico = tbServico.codServico
            INNER JOIN tbCategoriaServico ON tbCategoriaServico.codCategoriaServico = tbcausavaga.codCategoriaServico
            INNER JOIN tbHabivaga ON tbhabivaga.codServico = tbServico.codServico
            INNER JOIN tbHabilidadeServico ON tbHabilidadeServico.codHabilidadeServico = tbhabivaga.codHabilidadeServico
            WHERE tbServico.codServico = ?
            GROUP BY tbServico.codServico");

            $querySelect->bindParam(1, $cod);
            $querySelect->execute();
            $resultado = $querySelect->fetch(PDO::FETCH_ASSOC);

            if ($resultado) 
            {
                $causas = explode(",", $resultado["causas"]);
                $habilidades = explode(",", $resultado["habilidades"]);
            }
                    
            return $resultado;
        }
    }

?>
 
