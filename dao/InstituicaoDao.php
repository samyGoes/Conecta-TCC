<?php
    require_once 'global.php';
    //Executando comandos no banco
    class InstituicaoDao
    {   
        public static function cadastrar($instituicao)
        {
            $conectar=Conexao::conectar();

            $verificaEmail=$conectar->prepare("SELECT codInstituicao FROM tbinstituicao WHERE emailInstituicao = ?");
            $verificaEmail->bindValue(1, $instituicao->getEmailInstituicao());
            $verificaEmail->execute();

            $verificaCnpj=$conectar->prepare("SELECT codInstituicao FROM tbinstituicao WHERE cnpjInstituicao = ?");
            $verificaCnpj->bindValue(1, $instituicao->getCnpjInstituicao());
            $verificaCnpj->execute();

            $validaCpnj= new Cnpj();
            $validaSenha= new Senha();
            $senhaSegura = new SenhaSegura();

            if($verificaEmail->rowCount() > 0 && $verificaCnpj->rowCount() > 0 )
            {
                echo "<script>alert('Esse endereço de email e CNPJ já estão em uso por outro usuário!');</script>";
                return false;
            }
            else if ($verificaEmail->rowCount() > 0)
            {
                echo "<script>alert('Esse endereço de email já está em uso por outro usuário!');</script>";
                return false;
            }
            else if($validaCpnj->validar($instituicao->getCnpjInstituicao()) != true)
            {
                echo"<script>alert('Cnpj inválido!');</script>";
            }
            else if($verificaCnpj->rowCount() > 0)
            {
                echo "<script>alert('Esse CNPJ já está em uso por outro usuário!');</script>";
                return false;
            }
            else if($validaSenha->validar($instituicao->getSenhaInstituicao(),$instituicao->getConfSenhaInstituicao()) == false)
            {
                echo "<script>alert('Confirmação de senha não confere!');</script>";
            }
            else if ($senhaSegura->segura($instituicao->getSenhaInstituicao()) == false)
            {
                echo "<script>alert('Senha esta faltando algum requisito!');</script>";
            }
            else
            {
                $stmt=$conectar->prepare("INSERT INTO tbinstituicao(nomeInstituicao,emailInstituicao,cnpjInstituicao,senhaInstituicao,logInstituicao,
                                                                numLogInstituicao,cepInstituicao,bairroInstituicao,cidadeInstituicao,compInstituicao,estadoInstituicao,paisInstituicao,fotoInstituicao)
                                                                VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?)");
           
                $stmt->bindValue(1, $instituicao->getNomeInstituicao());
                $stmt->bindValue(2, $instituicao->getEmailInstituicao());
                $stmt->bindValue(3, $instituicao->getCnpjInstituicao());
                $stmt->bindValue(4, $instituicao->getSenhaInstituicao());
                $stmt->bindValue(5, $instituicao->getLogradouroInstituicao());
                $stmt->bindValue(6, $instituicao->getNumeroInstituicao());
                $stmt->bindValue(7, $instituicao->getCepInstituicao());
                $stmt->bindValue(8, $instituicao->getBairroInstituicao());
                $stmt->bindValue(9, $instituicao->getCidadeInstituicao());
                $stmt->bindValue(10, $instituicao->getCompInstituicao());
                $stmt->bindValue(11, $instituicao->getEstadoInstituicao());
                $stmt->bindValue(12, $instituicao->getPaisInstituicao());
                $stmt->bindValue(13, $instituicao->getFtPerfilInstituicao());
                $stmt->execute();

                $id = $conectar->lastInsertId();

                $stmt2=$conectar->prepare("INSERT INTO tbfoneinstituicao(numFoneInstituicao,codInstituicao,numSeqFone)
                                                                VALUES(?,$id,1)");
                $stmt2->bindValue(1, $instituicao->getTel1Instituicao());
                $stmt2->execute();

                $stmt3=$conectar->prepare("INSERT INTO tbfoneinstituicao(numFoneInstituicao,codInstituicao,numSeqFone)
                                                                VALUES(?,$id,2)");
                $stmt3->bindValue(1, $instituicao->getTel2Instituicao());
                $stmt3->execute();

                echo "<script>alert('Cadastro feito com sucesso!');</script>";
                return true;
            } 
            
        }

        public static function editar($instituicao)
        {
            $conectar=Conexao::conectar();

            $stmt = $conectar->prepare("UPDATE tbinstituicao SET nomeInstituicao = ?,logInstituicao = ?,numLogInstituicao = ?,
            cepInstituicao = ?,compInstituicao = ?,bairroInstituicao = ?,cidadeInstituicao = ?,
            estadoInstituicao = ?,paisInstituicao = ?,emailInstituicao = ?,descInstituicao = ? WHERE codInstituicao = ?");

            $stmt->bindValue(1, $instituicao->getNomeInstituicao());
            $stmt->bindValue(2, $instituicao->getLogradouroInstituicao());
            $stmt->bindValue(3, $instituicao->getNumeroInstituicao());
            $stmt->bindValue(4, $instituicao->getCepInstituicao());
            $stmt->bindValue(5, $instituicao->getCompInstituicao());
            $stmt->bindValue(6, $instituicao->getBairroInstituicao());
            $stmt->bindValue(7, $instituicao->getCidadeInstituicao());
            $stmt->bindValue(8, $instituicao->getEstadoInstituicao());
            $stmt->bindValue(9, $instituicao->getPaisInstituicao());
            $stmt->bindValue(10, $instituicao->getEmailInstituicao());
            $stmt->bindValue(11, $instituicao->getDescInstituicao());
            $stmt->bindValue(12, $instituicao->getIdInstituicao());
            $stmt->execute();

        }

        public static function atualizarFotoPerfil($instituicao){
            $conexao = Conexao::conectar();

            $queryInsert = "UPDATE tbInstituicao
                            SET fotoInstituicao = ?
                            WHERE codInstituicao = ?";
            
            $prepareStatement = $conexao->prepare($queryInsert);
            
            $prepareStatement->bindValue(1, $instituicao->getFtPerfilInstituicao());
            $prepareStatement->bindValue(2, $instituicao->getIdInstituicao());

            $prepareStatement->execute();
        }

        public static function editarTel($instituicao)
        {
            $conectar=Conexao::conectar();

            $stmtTelefone1 = $conectar->prepare("UPDATE tbFoneInstituicao SET numFoneInstituicao = ?
            WHERE codInstituicao = ? AND numSeqFone = 1");
            $stmtTelefone1->bindValue(1, $instituicao->getTel1Instituicao());
            $stmtTelefone1->bindValue(2, $instituicao->getIdInstituicao());
            $stmtTelefone1->execute();

            $stmtTelefone2 = $conectar->prepare("UPDATE tbFoneInstituicao SET numFoneInstituicao = ?
            WHERE codInstituicao = ? AND numSeqFone = 2");
            $stmtTelefone2->bindValue(1,$instituicao->getTel2Instituicao());
            $stmtTelefone2->bindValue(2,$instituicao->getIdInstituicao());
            $stmtTelefone2->execute();
        }

        public static function excluir($email,$senha,$instituicao)
        {
            $conectar=Conexao::conectar();

            $querySelect = $conectar->prepare("SELECT codInstituicao FROM tbInstituicao WHERE emailInstituicao = ? AND senhaInstituicao = ? ");
            $querySelect->bindValue(1,$email);
            $querySelect->bindValue(2,$senha);
            $querySelect->execute();

            if ($querySelect->rowCount() > 0) 
            {
                $deleteFone = $conectar->prepare("DELETE FROM tbfoneInstituicao WHERE codInstituicao = ?");
                $deleteFone->bindValue(1,$instituicao->getIdInstituicao());
                $deleteFone->execute();

                $deleteInstituicao = $conectar->prepare("DELETE FROM tbInstituicao WHERE codInstituicao = ?");
                $deleteInstituicao->bindValue(1,$instituicao->getIdInstituicao());
                $deleteInstituicao->execute();

                return true;
            }
        }

        public static function listar()
        {
            $conexao = Conexao::conectar();
            if (isset($_POST['pesquisar'])) {
                $pesquisar = $_POST['pesquisar'];
                $querySelect = "SELECT codInstituicao, nomeInstituicao, descInstituicao, emailInstituicao, cidadeInstituicao, estadoInstituicao, paisInstituicao, fotoInstituicao FROM tbinstituicao WHERE nomeInstituicao LIKE '%$pesquisar%'";
            } else {
                $querySelect = "SELECT codInstituicao, nomeInstituicao, descInstituicao, emailInstituicao, cidadeInstituicao, estadoInstituicao, paisInstituicao, fotoInstituicao FROM tbinstituicao";
            }
        
            $resultado = $conexao->query($querySelect);
            $lista = $resultado->fetchAll();
            return $lista;
        }
        

        public static function consultarId($instituicao)
        {
            $conexao = Conexao::conectar();

            $querySelect = "SELECT codInstituicao FROM tbinstituicao WHERE nomeInstituicao LIKE '".$instituicao->getNomeInstituicao()."'";

            $resultado = $conexao->query($querySelect);

            $lista = $resultado->fetchAll();

            foreach ($lista as $instituicao)
                $id = $instituicao['codInstituicao'];
            return $id;   
        }

        public static function consultarInstituicao($cod)
        {
            $conexao = Conexao::conectar();

            $querySelect = $conexao->prepare("SELECT tbInstituicao.codInstituicao, nomeInstituicao, emailInstituicao, 
            COALESCE(tbFoneInstituicao1.numFoneInstituicao, '') AS telefone1,
            COALESCE(tbFoneInstituicao2.numFoneInstituicao, '') AS telefone2,
            logInstituicao, numLogInstituicao, cepInstituicao, bairroInstituicao, 
            cidadeInstituicao, estadoInstituicao, paisInstituicao, compInstituicao, 
            descInstituicao,fotoInstituicao
            FROM tbInstituicao 
            INNER JOIN tbFoneInstituicao tbFoneInstituicao1 
                ON tbInstituicao.codInstituicao = tbFoneInstituicao1.codInstituicao 
                    INNER JOIN tbFoneInstituicao tbFoneInstituicao2 
                        ON tbInstituicao.codInstituicao = tbFoneInstituicao2.codInstituicao 
                        AND tbFoneInstituicao1.codFoneInstituicao <> tbFoneInstituicao2.codFoneInstituicao 
                        WHERE tbInstituicao.codInstituicao = ?");

            $querySelect->bindValue(1, $cod);
            $querySelect->execute();
            $resultado = $querySelect->fetch(PDO::FETCH_ASSOC);

            if ($querySelect->rowCount() > 0) {
                return $resultado;
            } else {
                return false;
            }
        }


        public static function trocarSenha($instituicao)
        {
            $conexao = Conexao::conectar();

            $validaSenha = new Senha();
            $senhaSegura = new SenhaSegura();

            if($validaSenha->validar($instituicao->getSenhaInstituicao(),$instituicao->getConfSenhaInstituicao()) == false)
            {
                echo "<script>alert('Confirmação de senha não confere!');</script>";
            }
            else if ($senhaSegura->segura($instituicao->getSenhaInstituicao()) == false)
            {
                echo "<script>alert('Senha esta faltando algum requisito!');</script>";
            }
            else
            {
                $stmt = $conexao->prepare("UPDATE tbinstituicao SET senhaInstituicao = ? WHERE codInstituicao = ?");

                $stmt->bindValue(1, $instituicao->getSenhaInstituicao());
                $stmt->bindValue(2, $instituicao->getIdInstituicao());
                $stmt->execute();
            }             
        }

       

        public static function notificacoes($idInstituicaoLogada)
        {
            $conexao = Conexao::conectar();

            // NOTIFICAÇÃO DE NOVA CANDIDATURA
            $mensagemCandidatura = array
            (
                'Nova Candidatura' . '<span class="box-icone-notificacao"><i id="icone-notificacao-nova" class="fa-solid fa-plus"></i></span>' => 'Um voluntário se candidatou a uma de suas vagas.',
                'arquivo' => 'tabela-voluntarios-instituicao.php'
            );

            // 'Nova Mensagem' => 'Você tem uma nova mensagem do(a) voluntário(a) Sâmily.',
            // 'Nova Avaliação' => 'Um voluntário fez uma avaliação sua.'
    
            $querySelect = $conexao->prepare("SELECT tbCandidatura.statusCandidatura, tbInstituicao.codInstituicao FROM tbCandidatura 
                                              INNER JOIN tbServico ON tbCandidatura.codServico = tbServico.codServico
                                              INNER JOIN tbInstituicao ON tbServico.codInstituicao = tbInstituicao.codInstituicao   
                                              WHERE tbCandidatura.statusCandidatura = 'pendente' 
                                              AND tbInstituicao.codInstituicao = ?");

            $querySelect->execute(array($idInstituicaoLogada));
            $listaCandidatura = $querySelect->fetchAll(PDO::FETCH_ASSOC);  



            // NOTIFICAÇÃO DE CAUSAS SOLICITADAS
            $querySelect2 = $conexao->prepare("SELECT statusSolicitacao, codInstituicao FROM tbSolicitacaoCategoria WHERE codInstituicao = ?");
            
            $querySelect2->execute(array($idInstituicaoLogada));
            $listaSolicitacaoCausa = $querySelect2 -> fetchAll(PDO::FETCH_ASSOC);



            // NOTIFICAÇÃO DE HABILIDADES SOLICITADAS
            $querySelect3 = $conexao->prepare("SELECT statusSolicitacao, codInstituicao FROM tbSolicitacaoHabilidade WHERE codInstituicao = ?");
        
            $querySelect3->execute(array($idInstituicaoLogada));
            $listaSolicitacaoHabilidade = $querySelect3 -> fetchAll(PDO::FETCH_ASSOC);


            // ARRAYS E VARIÁVEIS
            $mensagemStatusSolicitacaoA = array
            (
                'Solicitação Aceita' . '<i id="icone-notificacao-aceita" class="fa-sharp fa-solid fa-circle-check"></i>'=> 'O Adm aceitou a sua solicitação de causa.',
                'arquivo' => 'form-cadastrar-causas-instituicao.php'
            );
            $mensagemStatusSolicitacaoR = array
            (
                'Solicitação Recusada' . '<i id="icone-notificacao-recusada" class="fa-solid fa-circle-xmark"></i>'=> 'O Adm recusou a sua solicitação de causa.',
                'arquivo' => 'form-cadastrar-causas-instituicao.php'
            );

            $mensagemStatusSolicitacaoHA = array
            (
                'Solicitação Aceita' . '<i id="icone-notificacao-aceita" class="fa-sharp fa-solid fa-circle-check"></i>' => 'O Adm aceitou a sua solicitação de habilidade.',
                'arquivo' => 'form-cadastrar-habilidades-instituicao.php'
            );
            $mensagemStatusSolicitacaoHR = array
            (
                'Solicitação Recusada' . '<i id="icone-notificacao-recusada" class="fa-solid fa-circle-xmark"></i>' => 'O Adm recusou a sua solicitação de habilidade.',
                'arquivo' => 'form-cadastrar-habilidades-instituicao.php'
            );

            $mensagens = [];
            $statusAceitoCausa = 0;
            $statusRecusadoCausa = 0;
            $statusAceitoHabilidade = 0;
            $statusRecusadoHabilidade = 0;
            $novaCandidatura = 0;
         
            // echo ("Status da solicitação: ");
            // foreach ($lista as $linha) 
            // {
            //     var_dump($linha['statusSolicitacao']);
            // }

            // VERIFICANDO STATUS
            foreach ($listaSolicitacaoCausa as $linha) 
            {
                if ($linha['statusSolicitacao'] === 'aceito') 
                {
                    $statusAceitoCausa++;
                }
                if ($linha['statusSolicitacao'] === 'recusado') 
                {
                    $statusRecusadoCausa++;
                }
            }
            foreach($listaSolicitacaoHabilidade as $linha)
            {
                if ($linha['statusSolicitacao'] === 'aceito') 
                {
                    $statusAceitoHabilidade++;
                }
                if ($linha['statusSolicitacao'] === 'recusado') 
                {
                    $statusRecusadoHabilidade++;
                }
            }
            foreach($listaCandidatura as $linha)
            {
                if($linha['statusCandidatura'] === 'pendente')
                {
                    $novaCandidatura++;
                }
            }
          
      

            // VERIFICANDO QUAIS NOTIFICAÇÕES TEM E RETORNANDO ELAS
            // CAUSAS
            if($statusAceitoCausa >= 1)
            {
                for($i = 0; $i < $statusAceitoCausa; $i++)
                {
                    $mensagens[] = $mensagemStatusSolicitacaoA;
                }
            }
            if($statusRecusadoCausa >= 1)
            {
                for($i = 0; $i < $statusRecusadoCausa; $i++)
                {
                    $mensagens[] = $mensagemStatusSolicitacaoR;
                }           
            }
            // HABILIDADES
            if($statusAceitoHabilidade >= 1)
            {
                for($i = 0; $i < $statusAceitoHabilidade; $i++)
                {
                    $mensagens[] = $mensagemStatusSolicitacaoHA;
                }
            }
            if($statusRecusadoHabilidade >= 1)
            {
                for($i = 0; $i < $statusRecusadoHabilidade; $i++)
                {
                    $mensagens[] = $mensagemStatusSolicitacaoHR;
                }           
            }
            // CANDIDATURA
            if($novaCandidatura >= 1)
            {
                for($i = 0; $i < $novaCandidatura; $i++)
                {
                    $mensagens[] = $mensagemCandidatura;
                }           
            }

            //print_r($mensagens);
            if(!empty($mensagens))
            {
                return $mensagens;
            }       
            else
            {
                return array();
            }
        }

       

        public static function novaNotificacao($idInstituicaoLogada)
        {       
            $conexao = Conexao::conectar();

            $notificacao = $conexao->prepare("SELECT COUNT(codCandidatura) FROM tbCandidatura");
            $notificacao -> execute();
            $qtdMensagemAtual = $notificacao -> fetchAll();

            $qtdMensagemAntiga = $_SESSION['qtdMensagemAntiga'];
            
            //echo("Mensagem antiga: " . $qtdMensagemAntiga[0][0] . "<br>");
            //echo("Mensagem atual: " . $qtdMensagemAtual[0][0]) . "<br>";

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

        

    }
?>