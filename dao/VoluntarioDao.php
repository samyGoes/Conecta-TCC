<?php
    require_once 'global.php';

    class VoluntarioDao{

        public static function cadastrar($voluntario){
            $conexao = Conexao :: conectar();

            /* $queryInsert = */ 
            
            echo($voluntario->getDataNascVoluntario());

            $prepareStatement = $conexao -> prepare ( "INSERT INTO tbvoluntario(nomeVoluntario, cpfVoluntario, logVoluntario, numLogVoluntario, cepVoluntario, compVoluntario, bairroVoluntario, cidadeVoluntario, emailVoluntario, senhaVoluntario,paisVoluntario,estadoVoluntario,dataNascVoluntario,fotoVoluntario) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?)");

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

        public static function listar(){
            $conexao = Conexao :: conectar();
            $querySelect = "SELECT codVoluntario, nomeVoluntario, descVoluntario, emailVoluntario, cidadeVoluntario, estadoVoluntario, paisVoluntario, fotoVoluntario FROM tbVoluntario";
            $resultado = $conexao -> query($querySelect);
            $lista = $resultado -> fetchAll();
            return $lista;
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
                $stmt = $conexao->prepare("UPDATE tbvoluntario SET senhaVoluntario WHERE emailVoluntario = ?");

                $stmt->bindValue(1, $voluntario->getSenhaVoluntario());
                $stmt->execute();
            }             
        }
    }
?>
