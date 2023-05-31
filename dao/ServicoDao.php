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
            //Conexão com o banco de dados
            $conectar=Conexao::conectar();

            //Editando os dados da vaga sem as causas e habilidades.
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

            //Guardando o id da vaga editada
            $idVaga = $servico->getId();

            //Excluindo todos as causas e habilidades ligadas a essa vaga do banco de dados
            $deleteHabiVaga = $conectar->prepare("DELETE FROM tbHabiVaga WHERE codServico = ?");
            $deleteHabiVaga->bindValue(1,$idVaga);
            $deleteHabiVaga->execute();
            
            $deleteCausa = $conectar->prepare("DELETE FROM tbCausaVaga WHERE codServico = ?");
            $deleteCausa->bindValue(1,$idVaga);
            $deleteCausa->execute();

             // Inserindo as habilidades e causas vinculadas à vaga nas tabelas novamente de acordo com a edição
             foreach ($servico->getHabilidadeServico() as $habilidade) {
                $prepareStatement = $conectar->prepare("INSERT INTO  tbhabivaga (codServico, codHabilidadeServico) 
                VALUES (?,?)");
                $prepareStatement->bindValue(1, $idVaga);
                $prepareStatement->bindValue(2, $habilidade);
                $prepareStatement->execute();
              }
              foreach ($servico->getCategoriaServico() as $causa) {
                $prepareStatement = $conectar->prepare("INSERT INTO tbCausaVaga (codServico,codCategoriaServico)
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
     /**/   $deleteServico->execute();

        }

        public static function listarServico($idInstituicaoLogada)
        {
            $conexao = Conexao::conectar();
            $querySelect = "SELECT codServico, nomeServico FROM tbServico WHERE codInstituicao = :codInstituicao";
            $resultado = $conexao->prepare($querySelect);
            $resultado->bindValue(':codInstituicao', $idInstituicaoLogada, PDO::PARAM_INT);
            $resultado->execute();
            $lista = $resultado->fetchAll();
            return $lista;  
        }
        
        public static function obterQuantidadeVagasPorServico($codServico, $codInstituicao) 
        {
            $conexao = Conexao::conectar();
        
            $querySelect = "SELECT qntdVagaServico FROM tbServico
                            WHERE codServico = :codServico AND codInstituicao = :codInstituicao";
            
            $resultado = $conexao->prepare($querySelect);
            $resultado->bindValue(':codServico', $codServico, PDO::PARAM_INT);
            $resultado->bindValue(':codInstituicao', $codInstituicao, PDO::PARAM_INT);
            $resultado->execute();
            $quantidadeVagas = $resultado->fetchColumn();
            return $quantidadeVagas;
        }






    public static function listarVagaAdm()
    {
        $conexao = Conexao::conectar();

        if (isset($_POST['pesquisar'])) {
            $pesquisar = $_POST['pesquisar'];

            $querySelect = ("SELECT tbServico.codServico, horarioServico, periodoServico, descServico, 
            cepLocalServico, bairroLocalServico, estadoLocalServico, logradouroLocalServico, 
            complementoLocalServico, paisLocalServico, numeroLocalServico, cidadeLocalServico, 
            nomeservico, tipoServico, dataInicioServico, qntdVagaServico, 
            tbInstituicao.codInstituicao, nomeInstituicao, fotoInstituicao, 
            (SELECT GROUP_CONCAT(nomeCategoria SEPARATOR ', ') FROM tbCausaVaga 
             INNER JOIN tbCategoriaServico ON tbCategoriaServico.codCategoriaServico = tbCausaVaga.codCategoriaServico 
             WHERE tbCausaVaga.codServico = tbServico.codServico) AS causas,
            (SELECT GROUP_CONCAT(nomeHabilidadeServico SEPARATOR ', ') FROM tbHabiVaga 
             INNER JOIN tbHabilidadeServico ON tbHabilidadeServico.codHabilidadeServico = tbHabiVaga.codHabilidadeServico 
             WHERE tbHabiVaga.codServico = tbServico.codServico) AS habilidades
            FROM tbServico
            INNER JOIN tbInstituicao ON tbInstituicao.codInstituicao = tbServico.codInstituicao WHERE nomeServico LIKE '%$pesquisar%' OR nomeInstituicao LIKE '%$pesquisar%'");
        } else {
            $querySelect = ("SELECT tbServico.codServico, horarioServico, periodoServico, descServico, 
            cepLocalServico, bairroLocalServico, estadoLocalServico, logradouroLocalServico, 
            complementoLocalServico, paisLocalServico, numeroLocalServico, cidadeLocalServico, 
            nomeservico, tipoServico, dataInicioServico, qntdVagaServico, 
            tbInstituicao.codInstituicao, nomeInstituicao, fotoInstituicao, 
            (SELECT GROUP_CONCAT(nomeCategoria SEPARATOR ', ') FROM tbCausaVaga 
             INNER JOIN tbCategoriaServico ON tbCategoriaServico.codCategoriaServico = tbCausaVaga.codCategoriaServico 
             WHERE tbCausaVaga.codServico = tbServico.codServico) AS causas,
            (SELECT GROUP_CONCAT(nomeHabilidadeServico SEPARATOR ', ') FROM tbHabiVaga 
             INNER JOIN tbHabilidadeServico ON tbHabilidadeServico.codHabilidadeServico = tbHabiVaga.codHabilidadeServico 
             WHERE tbHabiVaga.codServico = tbServico.codServico) AS habilidades
            FROM tbServico
            INNER JOIN tbInstituicao ON tbInstituicao.codInstituicao = tbServico.codInstituicao ");
        }
        $resultado = $conexao->query($querySelect);
        $lista = $resultado->fetchAll();
        return $lista;
    }

        public static function listarVaga($cod)
        {
            $conectar= Conexao::conectar();

            $querySelect = $conectar->prepare("SELECT tbServico.codServico, horarioServico, periodoServico, descServico, 
            cepLocalServico, bairroLocalServico, estadoLocalServico, logradouroLocalServico, 
            complementoLocalServico, paisLocalServico, numeroLocalServico, cidadeLocalServico, 
            nomeservico, tipoServico, dataInicioServico, qntdVagaServico, 
            tbInstituicao.codInstituicao, nomeInstituicao, fotoInstituicao, 
            (SELECT GROUP_CONCAT(nomeCategoria SEPARATOR ', ') FROM tbCausaVaga 
             INNER JOIN tbCategoriaServico ON tbCategoriaServico.codCategoriaServico = tbCausaVaga.codCategoriaServico 
             WHERE tbCausaVaga.codServico = tbServico.codServico) AS causas,
            (SELECT GROUP_CONCAT(nomeHabilidadeServico SEPARATOR ', ') FROM tbHabiVaga 
             INNER JOIN tbHabilidadeServico ON tbHabilidadeServico.codHabilidadeServico = tbHabiVaga.codHabilidadeServico 
             WHERE tbHabiVaga.codServico = tbServico.codServico) AS habilidades
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

            $querySelect = $conectar->prepare("SELECT tbServico.codServico,DATE_FORMAT(horarioServico, '%H:%i') as horarioServico, periodoServico, descServico, 
            cepLocalServico, bairroLocalServico, estadoLocalServico, logradouroLocalServico, 
            complementoLocalServico, paisLocalServico, numeroLocalServico, cidadeLocalServico, 
            nomeservico, tipoServico, DATE_FORMAT(dataInicioServico, '%d/%m/%Y') as dataInicioServico, qntdVagaServico, tbInstituicao.codInstituicao, 
            nomeInstituicao, fotoInstituicao 
            FROM tbServico
            INNER JOIN tbInstituicao ON tbInstituicao.codInstituicao = tbServico.codInstituicao 
            WHERE tbServico.codServico = ?");

            $querySelect->bindParam(1, $cod);
            $querySelect->execute();
            $resultado = $querySelect->fetch(PDO::FETCH_ASSOC);
                    
            return $resultado;
        }

        public static function consultarCausa($cod)
        {
            $conectar= Conexao::conectar();

            $querySelect = $conectar->prepare("SELECT tbcausavaga.codCausaVaga,
            GROUP_CONCAT(tbCategoriaServico.codCategoriaServico) as categoria_id, 
            GROUP_CONCAT(tbCategoriaServico.nomeCategoria) as nomeCausa
            FROM tbcausavaga
            INNER JOIN tbCategoriaServico ON tbCategoriaServico.codCategoriaServico = tbcausavaga.codCategoriaServico
            WHERE tbcausavaga.codServico = ?"); 

            $querySelect->bindParam(1, $cod);
            $querySelect->execute();
            $resultado = $querySelect->fetch(PDO::FETCH_ASSOC);
                    
            return $resultado;
       
        }

        public static function consultarHabilidade($cod)
        {
            $conectar= Conexao::conectar();

            $querySelect = $conectar->prepare("SELECT tbhabivaga.codHabivaga,
            GROUP_CONCAT(tbHabilidadeServico.codHabilidadeServico) as habilidade_id, 
            GROUP_CONCAT(tbHabilidadeServico.nomeHabilidadeServico) as nomeHabilidade
            FROM tbhabivaga
            INNER JOIN tbHabilidadeServico ON tbHabilidadeServico.codHabilidadeServico = tbhabivaga.codHabilidadeServico
            WHERE tbhabivaga.codServico = ?"); 

            $querySelect->bindParam(1, $cod);
            $querySelect->execute();
            $resultado = $querySelect->fetch(PDO::FETCH_ASSOC);
                    
            return $resultado;
        }

        public static function obterServicoPorCodigo($codServico) {
            $conexao = Conexao::conectar();
        
            $querySelect = "SELECT * FROM tbServico WHERE codServico = ?";
            $resultado = $conexao->prepare($querySelect);
            $resultado->execute(array($codServico));
        
            $servico = $resultado->fetch();
        
            return $servico;
        }
        
      
       
    }

?>
 
