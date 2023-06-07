<?php
    require_once 'global.php';

    class VoluntarioDao{

        public static function cadastrar($voluntario){
            $conexao = Conexao :: conectar();

            /* $queryInsert = */ 
            
            echo($voluntario->getDataNascVoluntario());

            $prepareStatement = $conexao -> prepare ("INSERT INTO tbvoluntario(nomeVoluntario, cpfVoluntario, logVoluntario, numLogVoluntario, cepVoluntario, compVoluntario, bairroVoluntario, cidadeVoluntario, emailVoluntario, senhaVoluntario,paisVoluntario,estadoVoluntario,dataNascVoluntario,fotoVoluntario, visibilidadeVoluntario) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");

            $prepareStatement -> bindValue (1, $voluntario -> getNomeVoluntario());
            $prepareStatement -> bindValue (2, $voluntario -> getCpfVoluntario());
            $prepareStatement -> bindValue (3, $voluntario -> getLogVoluntario());
            $prepareStatement -> bindValue (4, $voluntario -> getNumLogVoluntario());
            $prepareStatement -> bindValue (5, $voluntario -> getCepVoluntario());
            $prepareStatement -> bindValue (6, $voluntario -> getCompVoluntario());
            $prepareStatement -> bindValue (7, $voluntario -> getBairroVoluntario());
            $prepareStatement -> bindValue (8, $voluntario -> getCidadeVoluntario());
            $prepareStatement -> bindValue (9, $voluntario -> getEmailVoluntario());
            $prepareStatement -> bindValue (10, $voluntario -> getSenhaVoluntario());
            $prepareStatement -> bindValue (11, $voluntario -> getPaisVoluntario());
            $prepareStatement -> bindValue (12, $voluntario -> getEstadoVoluntario());
            $prepareStatement -> bindValue (13, $voluntario -> getDataNascVoluntario());
            $prepareStatement -> bindValue (14, $voluntario -> getFotoPerfilVoluntario());
            $prepareStatement -> bindValue (15, $voluntario -> getVisibilidadeVoluntario());
            $prepareStatement -> execute();

            $id = $conexao->lastInsertId();

            $stmt2=$conexao->prepare("INSERT INTO tbfonevoluntario(numFoneVoluntario,codVoluntario,numSeqFone)
                                                                VALUES(?,$id,1)");
            $stmt2->bindValue(1, $voluntario->getTelefone1Voluntario());
            $stmt2->execute();

            $stmt3=$conexao->prepare("INSERT INTO tbfonevoluntario(numFoneVoluntario,codVoluntario,numSeqFone)
                                                                VALUES(?,$id,2)");
            $stmt3->bindValue(1, $voluntario->getTelefone2Voluntario());
            $stmt3->execute();
            return 'Cadastrou';

        }


        public static function editar($voluntario)
        {
            $conectar=Conexao::conectar();

            $stmt = $conectar->prepare("UPDATE tbvoluntario SET nomeVoluntario = ?,logVoluntario = ?,numLogVoluntario = ?,
            cepVoluntario = ?,compVoluntario = ?,bairroVoluntario = ?,cidadeVoluntario = ?,
            estadoVoluntario = ?,paisVoluntario = ?,emailVoluntario = ?,descVoluntario = ? WHERE codVoluntario = ?");

            $stmt->bindValue(1, $voluntario->getNomeVoluntario());
            $stmt->bindValue(2, $voluntario->getLogVoluntario());
            $stmt->bindValue(3, $voluntario->getNumLogVoluntario());
            $stmt->bindValue(4, $voluntario->getCepVoluntario());
            $stmt->bindValue(5, $voluntario->getCompVoluntario());
            $stmt->bindValue(6, $voluntario->getBairroVoluntario());
            $stmt->bindValue(7, $voluntario->getCidadeVoluntario());
            $stmt->bindValue(8, $voluntario->getEstadoVoluntario());
            $stmt->bindValue(9, $voluntario->getPaisVoluntario());
            $stmt->bindValue(10, $voluntario->getEmailVoluntario());
            $stmt->bindValue(11, $voluntario->getDescVoluntario());
            $stmt->bindValue(12, $voluntario->getIdVoluntario());
            $stmt->execute();

        }

        public static function atualizarFotoPerfil($voluntario){
            $conexao = Conexao::conectar();

            $queryInsert = "UPDATE tbVoluntario
                            SET fotoVoluntario = ?
                            WHERE codVoluntario = ?";
            
            $prepareStatement = $conexao->prepare($queryInsert);
            
            $prepareStatement->bindValue(1, $voluntario->getFotoPerfilVoluntario());
            $prepareStatement->bindValue(2, $voluntario->getIdVoluntario());

            $prepareStatement->execute();
        }

        public static function editarTel($voluntario)
        {
            $conectar=Conexao::conectar();

            $stmtTelefone1 = $conectar->prepare("UPDATE tbFoneVoluntario SET numFoneVoluntario = ?
            WHERE codVoluntario = ? AND numSeqFone = 1");
            $stmtTelefone1->bindValue(1, $voluntario->getTelefone1Voluntario());
            $stmtTelefone1->bindValue(2, $voluntario->getIdVoluntario());
            $stmtTelefone1->execute();

            $stmtTelefone2 = $conectar->prepare("UPDATE tbFoneVoluntario SET numFoneVoluntario = ?
            WHERE codVoluntario = ? AND numSeqFone = 2");
            $stmtTelefone2->bindValue(1,$voluntario->getTelefone2Voluntario());
            $stmtTelefone2->bindValue(2,$voluntario->getIdVoluntario());
            $stmtTelefone2->execute();
        }

        public static function excluir($email,$senha,$voluntario)
        {
            $conectar=Conexao::conectar();

            $querySelect = $conectar->prepare("SELECT codVoluntario FROM tbVoluntario WHERE emailVoluntario = ? AND senhaVoluntario = ? ");
            $querySelect->bindValue(1,$email);
            $querySelect->bindValue(2,$senha);
            $querySelect->execute();

            if ($querySelect->rowCount() > 0) 
            {
                $deleteFone = $conectar->prepare("DELETE FROM tbfonevoluntario WHERE codVoluntario = ?");
                $deleteFone->bindValue(1,$voluntario->getIdVoluntario());
                $deleteFone->execute();

                $deleteInstituicao = $conectar->prepare("DELETE FROM tbVoluntario WHERE codVoluntario = ?");
                $deleteInstituicao->bindValue(1,$voluntario->getIdVoluntario());
                $deleteInstituicao->execute();

                return true;
            }
        }

          
        public static function listarFiltro($causas, $estado, $cidade)
        {
            $conexao = Conexao::conectar();
            
            // Consulta padrão para trazer todos os valores
            $querySelect = "SELECT codVoluntario, nomeVoluntario, descVoluntario, emailVoluntario, cidadeVoluntario, estadoVoluntario, paisVoluntario, fotoVoluntario FROM tbVoluntario WHERE 1 = 1";
            
            // Adicione cláusulas WHERE conforme os filtros informados
            if (!empty($causas)) 
            {
                $causasString = implode(',', $causas);
                $querySelect .= " AND causa IN ($causasString)";
            }
            if (!empty($estado)) {
                $querySelect .= " AND estadoVoluntario = '$estado'";
            }
            if (!empty($cidade)) 
            {
                $querySelect .= " AND cidadeVoluntario = '$cidade'";
            }
            
            $resultado = $conexao->query($querySelect);
            $lista = $resultado->fetchAll(PDO::FETCH_ASSOC);
            return $lista;
        }
        

        public static function listarPadrao()
        {
            $conexao = Conexao::conectar();
            if(isset($_POST['pesquisar'])){
                $pesquisar= $_POST['pesquisar'];
            // Consulta padrão para trazer todos os valores
            $querySelect = "SELECT codVoluntario, nomeVoluntario, descVoluntario, emailVoluntario, cidadeVoluntario, estadoVoluntario, paisVoluntario, fotoVoluntario FROM tbVoluntario WHERE nomeVoluntario LIKE '%$pesquisar%'";
            }else{
                $querySelect = "SELECT codVoluntario, nomeVoluntario, descVoluntario, emailVoluntario, cidadeVoluntario, estadoVoluntario, paisVoluntario, fotoVoluntario,visibilidadeVoluntario FROM tbVoluntario WHERE visibilidadeVoluntario = 'on' ";
            }
                $resultado = $conexao->query($querySelect);
            $lista = $resultado->fetchAll(PDO::FETCH_ASSOC);
            return $lista;
        }

        public static function listarPrivados()
        {
            $conexao = Conexao::conectar();
            if(isset($_POST['pesquisar'])){
                $pesquisar= $_POST['pesquisar'];
            // Consulta padrão para trazer todos os valores
            $querySelect = "SELECT codVoluntario, nomeVoluntario, descVoluntario, emailVoluntario, cidadeVoluntario, estadoVoluntario, paisVoluntario, fotoVoluntario FROM tbVoluntario WHERE nomeVoluntario LIKE '%$pesquisar%'";
            }else{
                $querySelect = "SELECT codVoluntario, nomeVoluntario, descVoluntario, emailVoluntario, cidadeVoluntario, estadoVoluntario, paisVoluntario, fotoVoluntario,visibilidadeVoluntario FROM tbVoluntario ";
            }
                $resultado = $conexao->query($querySelect);
            $lista = $resultado->fetchAll(PDO::FETCH_ASSOC);
            return $lista;
        }
              
        public static function listarChat($codVoluntario) {
            $conexao = Conexao::conectar();
            $querySelect = "SELECT codVoluntario, nomeVoluntario, fotoVoluntario FROM tbVoluntario WHERE codVoluntario = ?";
            $resultado = $conexao->prepare($querySelect);
            $resultado->execute(array($codVoluntario));
            $voluntario = $resultado->fetchAll();
        
            return $voluntario;
        }
        
        public static function listarPorId($codVoluntario) {
            $conexao = Conexao::conectar();
        
            $querySelect = "SELECT * FROM tbVoluntario WHERE codVoluntario = ?";
        
            $resultado = $conexao->prepare($querySelect);
            $resultado->execute(array($codVoluntario));
            $voluntario = $resultado->fetchAll();
        
            return $voluntario;
        }
        

        public static function consultar(){
            $conexao = Conexao :: conectar();
            $stmt = $conexao->prepare("select nomeVoluntario from tbVoluntario");
            $stmt->execute();

            $query = "SELECT COUNT(codVoluntario) AS qtdVoluntario FROM tbVoluntario";
            $resultadoVoluntario = $conexao->query($query);
            $qtdVoluntario = $resultadoVoluntario -> fetchAll(PDO::FETCH_COLUMN);
            return $qtdVoluntario;
        }

        public static function consultarId($voluntario)
        {
            $conexao = Conexao::conectar();

            $querySelect = "SELECT codVoluntario FROM tbvoluntario WHERE nomeVoluntario LIKE '".$voluntario->getNomeVoluntario()."'";

            $resultado = $conexao->query($querySelect);

            $lista = $resultado->fetchAll();

            foreach ($lista as $voluntario)
                $id = $voluntario['codVoluntario'];
            return $id;   
        }

        public static function consultarVoluntario($cod)
        {
            $conexao = Conexao::conectar();

            $querySelect = $conexao->prepare("SELECT tbVoluntario.codVoluntario,nomeVoluntario,DATE_FORMAT(dataNascVoluntario, '%d/%m/%Y') as dataNascVoluntario, 
            emailVoluntario,descVoluntario,fotoVoluntario,
            COALESCE(tbFoneVoluntario1.numFoneVoluntario, '') AS telefone1,
            COALESCE(tbFoneVoluntario2.numFoneVoluntario, '') AS telefone2,
            logVoluntario, numLogVoluntario, cepVoluntario, bairroVoluntario, 
            cidadeVoluntario, estadoVoluntario, paisVoluntario, compVoluntario, 
            descVoluntario,TIMESTAMPDIFF(YEAR, dataNascVoluntario, NOW()) AS idade FROM tbVoluntario 
            INNER JOIN tbFoneVoluntario tbFoneVoluntario1 ON tbFoneVoluntario1.codVoluntario = tbVoluntario.codVoluntario 
                INNER JOIN tbFoneVoluntario tbFoneVoluntario2 
                    ON tbFoneVoluntario1.codVoluntario = tbFoneVoluntario2.codVoluntario 
                        AND tbFoneVoluntario1.codFoneVoluntario <> tbFoneVoluntario2.codFoneVoluntario 
                        WHERE tbVoluntario.codVoluntario = ?");

            $querySelect->bindValue(1, $cod);
            $querySelect->execute();
            $resultado = $querySelect->fetch(PDO::FETCH_ASSOC);

            if ($querySelect->rowCount() > 0) 
            {
                return $resultado;
            } else {
                return false;
            }
        }


        public static function trocarSenha($voluntario)
        {
            $conexao = Conexao::conectar();

            $validaSenha = new Senha();
            $senhaSegura = new SenhaSegura();

            if($validaSenha->validar($voluntario->getSenhaVoluntario(),$voluntario->getConfSenhaVoluntario()) == false)
            {
                echo "<script>alert('Confirmação de senha não confere!');</script>";
            }
            else if ($senhaSegura->segura($voluntario->getSenhaVoluntario()) == false)
            {
                echo "<script>alert('Senha esta faltando algum requisito!');</script>";
            }
            else
            {
                $stmt = $conexao->prepare("UPDATE tbvoluntario SET senhaVoluntario = ? WHERE codVoluntario = ?");

                $stmt->bindValue(1, $voluntario->getSenhaVoluntario());
                $stmt->bindValue(2, $voluntario->getIdVoluntario());
                $stmt->execute();
            }             
        }
  


        public static function notificacoes($idVoluntarioLogado)
        {
            $conexao = Conexao::conectar();

            $querySelect = "SELECT statusCandidatura, codVoluntario FROM tbCandidatura WHERE codVoluntario = ?";
            $resultado = $conexao->prepare($querySelect);
            
            $resultado->execute(array($idVoluntarioLogado));
            $lista = $resultado -> fetchAll(PDO::FETCH_ASSOC);


            // echo ("Status da candidatura: ");
            // foreach ($lista as $linha) 
            // {
            //     var_dump($linha['statusCandidatura']);
            // }

            // ARRAYS E VARIÁVEIS
            $mensagemStatusCandidaturaA = array
            (
                'Candidatura aceita' . '<i id="icone-notificacao-aceita" class="fa-sharp fa-solid fa-circle-check"></i>' => 'A instituição aceitou a sua candidatura.',
                'arquivo' => 'tabela-vagas-voluntario.php'
            );
            $mensagemStatusCandidaturaR = array
            (
                'Candidatura recusada' . '<i id="icone-notificacao-recusada" class="fa-solid fa-circle-xmark"></i>' => 'A instituição recusou a sua candidatura.',
                'arquivo' => 'tabela-vagas-voluntario.php'
            );
            $qtdMensagem = [];
            global $statusAceito;
            global $statusRecusado;
            $statusAceito = 0;
            $statusRecusado = 0;

            // VERIFICANDO STATUS DA CANDIDATURA
            foreach ($lista as $linha) 
            {
                if ($linha['statusCandidatura'] === 'aceito') 
                {
                    $statusAceito++;
                }
                if ($linha['statusCandidatura'] === 'recusado') 
                {
                    $statusRecusado++;
                }
            }

            // VERIFICANDO QUAIS E QUANTOS STATUS TEM PARA AJUSTAR O RETORNO
            if($statusAceito >= 1 && $statusRecusado >= 1)
            {
                for($i = 0; $i < $statusAceito; $i++)
                {
                    $qtdMensagem[] = $mensagemStatusCandidaturaA;
                }
                for($i = 0; $i < $statusRecusado; $i++)
                {
                    $qtdMensagem[] = $mensagemStatusCandidaturaR;
                }
                return $qtdMensagem;
            }
            else if($statusAceito >= 1)
            {
                for($i = 0; $i < $statusAceito; $i++)
                {
                    $qtdMensagem[] = $mensagemStatusCandidaturaA;
                }
                return $qtdMensagem;
            }
            else if($statusRecusado >= 1)
            {
                for($i = 0; $i < $statusRecusado; $i++)
                {
                    $qtdMensagem[] = $mensagemStatusCandidaturaR;
                }
                return $qtdMensagem;
            }
            else
            {
                return array();
            }
        }

        public static function novaNotificacao($idVoluntarioLogado)
        {       
            $conexao = Conexao::conectar();

            $notificacao = $conexao->prepare("SELECT COUNT(codCandidatura) FROM tbCandidatura WHERE statusCandidatura = 'aceito' OR statusCandidatura = 'recusado'");
            $notificacao -> execute();
            $qtdMensagemAtual = $notificacao -> fetchAll();

            $qtdMensagemAntiga = $_SESSION['qtdMensagemAntiga'];
            
            echo("Mensagem antiga: " . $qtdMensagemAntiga . "<br>");      
            echo("Mensagem atual: " . $qtdMensagemAtual[0][0]) . "<br>";

            if(empty($qtdMensagemAtual) || $qtdMensagemAtual[0][0] == 0) 
            {
                return false;         
            }
            else
            {
                if($qtdMensagemAntiga != $qtdMensagemAtual[0][0])
                {
                    return true;
                }
                else
                {
                    return false;
                }
            }             
        }

        public static function filtragem($codVoluntario)
        {
            $causasVoluntario = [];

            $conexao = Conexao::conectar();
            $querySelect = "SELECT DISTINCT tbCausaVoluntario.codCausaVoluntario, tbCategoriaServico.codCategoriaServico, tbCategoriaServico.nomeCategoria  
                FROM tbCausaVoluntario
                INNER JOIN tbCategoriaServico ON tbCategoriaServico.codCategoriaServico = tbCausaVoluntario.codCategoriaServico
                WHERE tbCausaVoluntario.codVoluntario = $codVoluntario";

            $resultado = $conexao->query($querySelect);
            $lista = $resultado->fetchAll();

            foreach ($lista as $row) {
                $causasVoluntario[] = $row['nomeCategoria'];
            }

            $causasVoluntario = array_map('trim', $causasVoluntario); // Remover espaços em branco dos valores

            if (empty($causasVoluntario)) {
                return ServicoDao::listarVagaAdm(); // Retorna todas as vagas se o voluntário não tiver causas definidas
            }

            $placeholders = implode(',', array_fill(0, count($causasVoluntario), '?'));

            $querySelect = $conexao->prepare("SELECT DISTINCT tbServico.codServico, horarioServico, periodoServico, descServico, 
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
                            INNER JOIN tbCausaVaga ON tbCausaVaga.codServico = tbServico.codServico
                            INNER JOIN tbCategoriaServico ON tbCategoriaServico.codCategoriaServico = tbCausaVaga.codCategoriaServico
                            WHERE tbCategoriaServico.nomeCategoria IN ($placeholders)");

            foreach ($causasVoluntario as $key => $causa) {
                $querySelect->bindValue($key + 1, $causa);
            }

            $querySelect->execute();
            $lista = $querySelect->fetchAll();

            return $lista;
        }



      
    }
?>
