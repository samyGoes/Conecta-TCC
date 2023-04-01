<?php
    require_once 'global.php';

    class VoluntarioDao{

        public static function cadastrar($voluntario){
            $conexao = Conexao :: conectar();

            /* $queryInsert = */ 
            
            echo($voluntario->getDataNascVoluntario());

            $prepareStatement = $conexao -> prepare ( "INSERT INTO tbvoluntario(nomeVoluntario, cpfVoluntario, logVoluntario, numLogVoluntario, cepVoluntario, compVoluntario, bairroVoluntario, cidadeVoluntario, emailVoluntario, senhaVoluntario,paisVoluntario,estadoVoluntario,dataNascVoluntario) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?)");

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
            $prepareStatement -> execute();

            $id = $conexao->lastInsertId();

            $stmt2=$conexao->prepare("INSERT INTO tbfonevoluntario(numFoneVoluntario,codVoluntario)
                                                                VALUES(?,$id)");
            $stmt2->bindValue(1, $voluntario->getTelefone1Voluntario());
            $stmt2->execute();

            $stmt3=$conexao->prepare("INSERT INTO tbfonevoluntario(numFoneVoluntario,codVoluntario)
                                                                VALUES(?,$id)");
            $stmt3->bindValue(1, $voluntario->getTelefone2Voluntario());
            $stmt3->execute();
            return 'Cadastrou';
        }

        public static function listar(){
            $conexao = Conexao :: conectar();
            $querySelect = "SELECT codVoluntario, nomeVoluntario, emailVoluntario FROM tbVoluntario";
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

        /*public static function deletar(){
            $conexao = Conexao :: conectar();
            $stmt = $conexao->prepare("select nomeVoluntario from tbVoluntario");
            $stmt->execute();

            $query = "DELETE FROM tbVoluntario WHERE codVoluntario";
            $resultadoVoluntario = $conexao->query($query);
            $qtdVoluntario = $resultadoVoluntario -> fetchAll(PDO::FETCH_COLUMN);
            return $qtdVoluntario;
        }*/
        public static function deletar(){
            if(!empty($_GET['id']))
            {
                include_once('conexao.php');
        
                $id = $_GET['id'];
        
                $sqlSelect = "SELECT *  FROM tbVoluntario WHERE idVoluntario=$id";
        
                $result = $conexao->query($sqlSelect);
        
                if($result->num_rows > 0)
                {
                    $sqlDelete = "DELETE FROM tbVoluntario WHERE idVoluntario=$id";
                    $resultDelete = $conexao->query($sqlDelete);
                }
            }
        }
    }


    
?>